<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('category_id')->where('status', '=', 'Tersedia')->orWhere('status', '=', 'Dipinjam')->get();
        return view('staff.book.index', ['books' => $books]);
    }

    public function indexLost()
    {
        $books = Book::orderBy('category_id')->where('status', '!=', 'Tersedia')->where('status', '!=', 'Dipinjam')->get();
        return view('staff.book.indexLost', ['books' => $books]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('staff.book.form', ['categories' => $categories, 'authors' => $authors, 'publishers' => $publishers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'author_id' => "required",
                'category_id' => "required",
                'publisher_id' => "required",
                'title' => "required",
                'description' => "required",
                'publication_date' => "required",
                'shelf_number' => "required",
                'qty' => "required",
            ]);

            $lastBookId = DB::table('books')
                ->where('category_id', $request->category_id)
                ->max('id');

            if ($lastBookId) {
                $lastBookId = explode('-', $lastBookId);
                $lastBookId = $lastBookId[1];
            }

            for ($i = 1; $i <= $request->qty; $i++) {
                // Increment the index for the new book
                $newIndex = str_pad((int) $lastBookId + $i, 3, '0', STR_PAD_LEFT);
                // Formulate the new book id
                $newBookId = $request->category_id . '-' . $newIndex;
                Book::create([
                    'id' => $newBookId,
                    'author_id' => $request->author_id,
                    'category_id' => $request->category_id,
                    'publisher_id' => $request->publisher_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'publication_date' => $request->publication_date,
                    'shelf_number' => $request->shelf_number,
                    'status' => 'Tersedia'
                ]);
            }
            return redirect('/staff/book')->with('success', 'Buku Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/staff/book/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/staff/book')->with('error', 'Buku Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('staff.book.form', ['categories' => $categories, 'authors' => $authors, 'publishers' => $publishers, 'book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $lastBookId = null;
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'author_id' => "required",
                'category_id' => "required",
                'publisher_id' => "required",
                'title' => "required",
                'description' => "required",
                'publication_date' => "required",
                'shelf_number' => "required",
                'note' => "required",
            ]);

            if ($request->category_id != $book->category_id) {
                $lastBookId = DB::table('books')
                    ->where('category_id', $request->category_id)
                    ->max('id');

                if ($lastBookId) {
                    $lastBookId = explode('-', $lastBookId);
                    $lastBookId = $lastBookId[1];
                } else {
                    $lastBookId = null;
                }
            }

            if ($request->note == 'one') {
                $bookId = $book->id;
                if ($lastBookId) {
                    // Increment the index for the new book
                    $newIndex = str_pad((int) $lastBookId + 1, 3, '0', STR_PAD_LEFT);
                    // Formulate the new book id
                    $bookId = $request->category_id . '-' . $newIndex;
                }
                $book->update([
                    'id' => $bookId,
                    'author_id' => $request->author_id,
                    'category_id' => $request->category_id,
                    'publisher_id' => $request->publisher_id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'publication_date' => $request->publication_date,
                    'shelf_number' => $request->shelf_number,
                ]);
            } else if ($request->note == 'all') {
                $books = Book::where('title', '=', $book->title)->get();
                $i = 1;
                foreach ($books as $bookData) {
                    $bookId = $bookData->id;
                    if ($lastBookId) {
                        // Increment the index for the new book
                        $newIndex = str_pad((int) $lastBookId + $i, 3, '0', STR_PAD_LEFT);
                        // Formulate the new book id
                        $bookId = $request->category_id . '-' . $newIndex;
                    }
                    $bookData->update([
                        'id' => $bookId,
                        'author_id' => $request->author_id,
                        'category_id' => $request->category_id,
                        'publisher_id' => $request->publisher_id,
                        'title' => $request->title,
                        'description' => $request->description,
                        'publication_date' => $request->publication_date,
                        'shelf_number' => $request->shelf_number,
                    ]);
                    $i++;
                }


            }
            DB::commit();
            return redirect('/staff/book')->with('success', 'Buku Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/staff/book/create')->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            ddd($e);
            return redirect('/staff/book')->with('error', 'Buku Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect('/staff/book')->with('success', 'Buku Berhasil Dihapus');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/staff/book')->with('error', 'Buku Gagal Dihapus');
        }
    }
}
