@extends('Staff/templates/template')
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('staff-index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('transaction.book-return.index') }}">Pengembalian
                                Buku</a></li>
                        <li class="breadcrumb-item active">
                            {{ request()->is('admin/transaction/book-return/create/*') ? 'Form ' : 'Form Ubah' }}
                            Pengembalian Buku
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">
                                {{ request()->is('admin/transaction/book-return/create/*') ? 'Form ' : 'Form Ubah' }}
                                Pengembalian Buku
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form
                                action="{{ isset($loanBook->id) ? route('transaction.book-return.store-id', $loanBook->id) : route('transaction.book-return.store') }}"
                                method="POST">
                                {{ csrf_field() }}
                                @if (request()->is('admin/transaction/book-return/update/*'))
                                    {{ method_field('patch') }}
                                @endif

                                {{--  --}}
                                @if (!isset($loanBook->id))
                                    <div class="mb-3">
                                        <label for="exampleInputLoanId" class="form-label ">ID Peminjaman</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('loan_id') ? 'is-invalid' : '' }}"
                                            id="exampleInputLoanId" aria-describedby="loanIddHelp" name="loan_id">
                                        <div class="invalid-feedback">
                                            @error('loan_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                @endif

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputMemberId" class="form-label ">ID Anggota</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('member_id') ? 'is-invalid' : '' }}"
                                        id="exampleInputMemberId" aria-describedby="memberIdHelp" name="member_id"
                                        value="{{ isset($loanBook->member_id) ? $loanBook->member_id : '' }}" readonly>
                                    <div class="invalid-feedback">
                                        @error('member_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label ">Nama Anggota</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="exampleInputName" aria-describedby="nameHelp" name="name"
                                        value="{{ isset($loanBook->member_id) ? $loanBook->member->name : '' }}" readonly>
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputBookId" class="form-label ">ID Buku</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('bookId') ? 'is-invalid' : '' }}"
                                        id="exampleInputBookId" aria-describedby="bookIdHelp" name="book_id"
                                        value="{{ isset($loanBook->book_id) ? $loanBook->book_id : '' }}" readonly>
                                    <div class="invalid-feedback">
                                        @error('book_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputBookName" class="form-label ">Nama Buku</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('book_name') ? 'is-invalid' : '' }}"
                                        id="exampleInputBookName" aria-describedby="bookNameHelp" name="book_name"
                                        value="{{ isset($loanBook->book_id) ? $loanBook->book->title : '' }}" readonly>
                                    <div class="invalid-feedback">
                                        @error('book_name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputLoanDate" class="form-label ">Tanggal Peminjaman</label>
                                    <input type="date"
                                        class="form-control {{ $errors->has('loan_date') ? 'is-invalid' : '' }}"
                                        id="exampleInputLoanDate" aria-describedby="loanDateHelp" name="loan_date"
                                        value="{{ isset($loanBook->loan_date) ? $loanBook->loan_date : '' }}" readonly>
                                    <div class="invalid-feedback">
                                        @error('loan_date')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputReturnDate" class="form-label ">Tanggal Pengembalian</label>
                                    <input type="date"
                                        class="form-control {{ $errors->has('return_date') ? 'is-invalid' : '' }}"
                                        id="exampleInputReturnDate" aria-describedby="loanDateHelp" name="return_date"
                                        value="{{ old('return_date', isset($loanBook->return_date) ? $loanBook->return_date : '') }}">
                                    <div class="invalid-feedback">
                                        @error('return_date')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputStatus" class="form-label ">Status</label>
                                    <select name="status" id="exampleInputStatus"
                                        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                        aria-describedby="statusHelp">
                                        <option value="">-- Pilih Status Pengembalian --</option>
                                        <option value="returned">Dikembalikan</option>
                                        <option value="lost-payment">Hilang - Bayar Denda</option>
                                        <option value="lost-replace">Hilang - Ganti Buku</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 lost-payment" style="display: none">
                                    <label for="exampleInputBookPrice" class="form-label ">Harga Buku</label>
                                    <input type="number"
                                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                        id="exampleInputBookPrice" aria-describedby="loanDateHelp" name="price"
                                        value="{{ isset($loanBook->book_id) ? $loanBook->book->price : '' }}">
                                    <div class="invalid-feedback">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

    </section>

    <!-- /.content -->
@endsection

@section('js')
    <script>
        document.getElementById('exampleInputReturnDate').valueAsDate = new Date();
        document.getElementById('exampleInputLoanDate').valueAsDate = new Date();

        $('#exampleInputStatus').on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue == 'lost-payment') {
                $(`.lost-payment`).css('display', 'block');
            } else {
                $(`.lost-payment`).css('display', 'none');
            }
        });

        @if (!isset($loanBook->id))
            var loanBook = {!! json_encode($loanBook) !!};

            $('#exampleInputLoanId').on('change', function() {
                const foundLoanData = loanBook.find((loanBookData) => loanBookData.id == $(this).val())
                if (!foundLoanData) {
                    $('#exampleInputMemberId').val('');
                    $('#exampleInputName').val('');
                    $('#exampleInputBookId').val('');
                    $('#exampleInputBookName').val('');
                    $('#exampleInputLoanDate').val('');
                    $('#exampleInputBookPrice').val('');
                    $('#exampleInputLoanId').addClass('is-invalid');
                    $('.invalid-feedback').html('Invalid Loan ID. Please select a valid ID.');
                } else {
                    // Reset the invalid feedback if a valid member is found
                    $('#exampleInputMemberId').val(foundLoanData.member_id);
                    $('#exampleInputName').val(foundLoanData.member.name);
                    $('#exampleInputBookId').val(foundLoanData.book_id);
                    $('#exampleInputBookName').val(foundLoanData.book.title);
                    $('#exampleInputLoanDate').val(foundLoanData.loan_date);
                    $('#exampleInputBookPrice').val(foundLoanData.book.price);
                    $('#exampleInputLoanId').removeClass('is-invalid');
                    $('.invalid-feedback').html('');
                }
            });
        @endif
    </script>
@endsection
