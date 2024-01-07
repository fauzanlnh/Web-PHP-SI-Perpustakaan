<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Member;
use App\Models\LoanBook;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ReturnPaymentBook;
use App\Models\ReturnReplaceBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoanBookController extends Controller
{
    private function generateId()
    {
        $currentDate = Carbon::now();
        $date = $currentDate->format('Y') . '' . $currentDate->format('m');

        $latestData = LoanBook::select('id')->where('id', 'like', '%' . $date . '%')->orderBy('id', 'desc')->first();

        if ($latestData) {
            $latestId = explode('-', $latestData->id);
            $newIndex = $latestId[1] + 1;
        } else {
            $newIndex = 1;
        }
        $newIndex = str_pad($newIndex, 3, '0', STR_PAD_LEFT);
        $newId = $date . '-' . $newIndex;
        return $newId;
    }
    public function indexBorrowingBook()
    {
        $borrows = LoanBook::where('status', '=', 'pending')->with('member', 'book')->orderBy('id')->get();
        return view('staff.transaction.indexBorrowingBook', ['borrows' => $borrows]);
    }

    public function createBorrowingBook()
    {
        $books = Book::select('id', 'title')->where('status', '=', 'Tersedia')->get();
        $members = Member::select('id', 'name')->get();
        return view('staff.transaction.formBorrowingBook', ['books' => $books, 'members' => $members]);
    }

    public function storeBorrowingBook(Request $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $this->validate($request, [
                'member_id' => [
                    "required",
                    Rule::exists('members', 'id')
                ],
                'book_id' => [
                    "required",
                    Rule::exists('books', 'id')
                ],
                'loan_date' => "required",
            ]);
            $validatedData['id'] = $this->generateId();
            $validatedData['staff_id'] = Auth::user()->username;
            $validatedData['return_date'] = null;
            $validatedData['estimated_return_date'] = Carbon::parse($validatedData['loan_date'])->addDays(7)->format('Y-m-d');
            $validatedData['fine'] = 0;
            $validatedData['status'] = 'Pending';
            LoanBook::create($validatedData);
            Book::find($validatedData['book_id'])->update(['status' => 'Dipinjam']);
            DB::commit();
            return redirect('/admin/transaction/borrowing-book')->with('success', 'Data Peminjaman Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            DB::rollBack();
            return redirect('/admin/transaction/borrowing-book/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
            return redirect('/admin/transaction/borrowing-book')->with('error', 'Data Peminjaman Gagal Ditambahkan');
        }
    }

    public function editBorrowingBook($loanId)
    {
        $loanBook = LoanBook::find($loanId);
        $books = Book::select('id', 'title')->where('status', '=', 'Tersedia')->orWhere('id', '=', $loanBook->book_id)->get();
        $members = Member::select('id', 'name')->get();
        return view('staff.transaction.formBorrowingBook', ['books' => $books, 'members' => $members, 'loanBook' => $loanBook]);
    }

    public function updateBorrowingBook(Request $request, $loanId)
    {
        DB::beginTransaction();
        try {
            $validatedData = $this->validate($request, [
                'member_id' => [
                    "required",
                    Rule::exists('members', 'id')
                ],
                'book_id' => [
                    "required",
                    Rule::exists('books', 'id')
                ],
                'loan_date' => "required",
            ]);
            $validatedData['staff_id'] = Auth::user()->username;
            $validatedData['estimated_return_date'] = Carbon::parse($validatedData['loan_date'])->addDays(7)->format('Y-m-d');
            $validatedData['fine'] = 0;

            $loanBook = LoanBook::find($loanId);
            if ($loanBook->book_id != $validatedData['book_id']) {
                Book::find($loanBook->book_id)->update(['status' => 'Tersedia']);
                Book::find($validatedData['book_id'])->update(['status' => 'Dipinjam']);
            }

            $loanBook->update($validatedData);

            DB::commit();
            return redirect('/admin/transaction/borrowing-book')->with('success', 'Data Peminjaman Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            DB::rollBack();
            return redirect('/admin/transaction/borrowing-book/edit')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
            return redirect('/admin/transaction/borrowing-book')->with('error', 'Data Peminjaman Gagal Diubah');
        }
    }

    public function indexBookReturn()
    {
        $returns = LoanBook::select('id', 'loan_date', 'return_date', 'fine', 'book_id', 'member_id')
            ->selectRaw('DATEDIFF(return_date, estimated_return_date) AS day_difference')
            ->where('status', '=', 'Dikembalikan')->with('member', 'book')->get();
        return view('staff.transaction.indexBookReturn', ['returns' => $returns]);
    }

    public function createBookReturn($loanId = null)
    {
        if ($loanId == null) {
            $loanBook = LoanBook::where('status', '=', 'Pending')->with('member', 'book')->get();
        } else {
            $loanBook = LoanBook::with('member', 'book')->find($loanId);
        }

        return view('staff.transaction.formBookReturn', ['loanBook' => $loanBook]);
    }

    public function storeBookReturn(Request $request, $loanId = null)
    {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'member_id' => [
                    "required",
                    Rule::exists('members', 'id')
                ],
                'book_id' => [
                    "required",
                    Rule::exists('books', 'id')
                ],
                'loan_date' => "required",
                'status' => 'required',

            ]);
            $loanId = $loanId ?? $request->loan_id;
            $loanBook = LoanBook::find($loanId);
            $status = 'Dikembalikan';
            $dateDiff = now()->parse($request->return_date)->diffInDays(now()->parse($loanBook->estimated_return_date));
            if ($request->return_date < $loanBook->estimated_return_date) {
                $fine = 0;
            } else {
                $fine = 5000 * $dateDiff;
            }

            if ($request->status == 'returned') {
                $book = Book::find($request->book_id);
                $book->update(['status' => 'Tersedia']);
            } else {
                $book = Book::find($request->book_id);
                $book->update(['status' => 'Hilang']);
                if ($request->status == 'lost-payment') {
                    $status = 'Hilang';
                    ReturnPaymentBook::create(['loan_id' => $loanId, 'replacement_date' => $request->return_date, 'replacement_fine' => $request->price]);
                } else if ($request->status == 'lost-replace') {
                    $status = 'Hilang';
                    // Get the last book id for the same category
                    $lastBookId = DB::table('books')
                        ->where('category_id', $book->category_id)
                        ->max('id');

                    if ($lastBookId) {
                        $lastBookId = explode('-', $lastBookId);
                        $lastBookId = $lastBookId[1];
                    }

                    // Increment the index for the new book
                    $newIndex = str_pad((int) $lastBookId + 1, 3, '0', STR_PAD_LEFT);

                    // Formulate the new book id
                    $newBookId = $book->category_id . '-' . $newIndex;

                    Book::create([
                        'id' => $newBookId,
                        'author_id' => $book->author_id,
                        'publisher_id' => $book->publisher_id,
                        'category_id' => $book->category_id,
                        'title' => $book->title,
                        'description' => $book->description,
                        'publication_date' => $book->publication_date,
                        'shelf_number' => $book->shelf_number,
                        'price' => $book->price,
                        'status' => 'Tersedia'
                    ]);

                    ReturnReplaceBook::create(['loan_id' => $loanId, 'replacement_date' => $request->return_date, 'replacement_book_id' => $newBookId]);
                }
            }

            $loanBook->update(['return_date' => $request->return_date, 'status' => $status, 'fine' => $fine]);
            DB::commit();
            if ($request->status == 'returned') {
                return redirect('/admin/transaction/book-return')->with('success', 'Data Pengembalian Berhasil Dimasukkan');
            } else if ($request->status == 'lost-payment') {
                return redirect('/admin/transaction/lost-book-return-fine')->with('success', 'Data Pengembalian Berhasil Dimasukkan');
            } else if ($request->status == 'lost-replace') {
                return redirect('/admin/transaction/lost-book-return-replacing')->with('success', 'Data Pengembalian Berhasil Dimasukkan');
            }
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            ddd($e);
            return redirect('/admin/transaction/book-return')->with('error', 'Data Pengembalian Gagal Dimasukkan');
        }
    }

    public function indexLostBookReturnFine()
    {
        $lost = LoanBook::where('status', '=', 'hilang')->has('returnPaymentBook')->with('book', 'member', 'returnPaymentBook')->get();
        return view('staff.transaction.indexLostBookReturnFine', ['lost' => $lost]);
    }

    public function indexLostBookReturnReplacing()
    {
        $lost = LoanBook::where('status', '=', 'hilang')->has('returnReplaceBook')->with('book', 'member', 'returnReplaceBook')->get();
            return view('staff.transaction.indexLostBookReturnReplacing', ['lost' => $lost]);
    }



}
