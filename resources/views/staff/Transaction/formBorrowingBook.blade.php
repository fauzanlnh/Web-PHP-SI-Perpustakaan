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
                        <li class="breadcrumb-item"><a href="{{ route('transaction.borrowing-book.index') }}">Peminjaman
                                Buku</a></li>
                        <li class="breadcrumb-item active">{{ isset($loanBook) ? 'Ubah' : 'Tambah' }} Peminjaman Buku
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
                            <h3 class="card-title">{{ isset($loanBook) ? 'Edit' : 'Tambah' }} Data Peminjaman Buku
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form
                                action="{{ isset($loanBook) ? route('transaction.borrowing-book.update', $loanBook->id) : route('transaction.borrowing-book.store') }}"
                                method="POST">
                                {{ csrf_field() }}
                                @if (isset($loanBook))
                                    {{ method_field('patch') }}
                                @endif

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputMemberId" class="form-label ">ID Anggota</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('memberId') ? 'is-invalid' : '' }}"
                                        id="exampleInputMemberId" aria-describedby="memberIdHelp" name="member_id"
                                        value="{{ old('member_id', isset($loanBook) ? $loanBook->member_id : '') }}">
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
                                        value="{{ old('name') }}" readonly>
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
                                        value="{{ old('book_id', isset($loanBook) ? $loanBook->book_id : '') }}">
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
                                        value="{{ old('book_name') }}" readonly>
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
                                        value="{{ old('loan_date', isset($loanBook) ? $loanBook->loan_date : '') }}"
                                        {{ isset($loanBook) ? '' : 'readonly' }}>
                                    <div class="invalid-feedback">
                                        @error('loan_date')
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
        document.getElementById('exampleInputLoanDate').valueAsDate = new Date();
        var members = {!! json_encode($members) !!};
        var books = {!! json_encode($books) !!};
        // Set Input Type Date As Now
        @if (isset($loanBook))
            const foundMember = members.find(function(member) {
                return member.id == $('#exampleInputMemberId').val();
            })

            if (foundMember) {
                $('#exampleInputName').val(foundMember.name);
            } else {
                // Handle the case where no member with the specified ID is found
                $('#exampleInputName').val('');
            }

            const foundBook = books.find(function(book) {
                return book.id == $('#exampleInputBookId').val();
            })

            if (foundBook) {
                $('#exampleInputBookName').val(foundBook.title);
            } else {
                // Handle the case where no member with the specified ID is found
                $('#exampleInputBookName').val('');
            }
        @endif

        // set input for member name for check if data is exist
        $('#exampleInputMemberId').on('change', function() {
            var memberId = $(this).val();

            var memberFound = false;

            for (var i = 0; i < members.length; i++) {
                var memberData = members[i];
                if (memberData.id == memberId) {
                    $('#exampleInputName').val(memberData.name);
                    memberFound = true;
                    break; // Exit the loop once a match is found
                }
            }

            // Display error if member is not found
            if (!memberFound) {
                $('#exampleInputName').val(''); // Clear the value
                $('#exampleInputMemberId').addClass('is-invalid');
                $('.invalid-feedback').html('Invalid member ID. Please select a valid ID.');
            } else {
                // Reset the invalid feedback if a valid member is found
                $('#exampleInputMemberId').removeClass('is-invalid');
                $('.invalid-feedback').html('');
            }
        });

        $('#exampleInputBookId').on('change', function() {
            var bookId = $(this).val();
            var memberFound = false;
            for (var i = 0; i < books.length; i++) {
                var bookData = books[i];
                if (bookData.id == bookId) {
                    $('#exampleInputBookName').val(bookData.title);
                    memberFound = true;
                    break; // Exit the loop once a match is found
                }
            }

            // Display error if member is not found
            if (!memberFound) {
                $('#exampleInputBookName').val(''); // Clear the value
                $('#exampleInputBookId').addClass('is-invalid');
                $('.invalid-feedback').html('Invalid book ID. Please select a valid ID.');
            } else {
                // Reset the invalid feedback if a valid member is found
                $('#exampleInputBookId').removeClass('is-invalid');
                $('.invalid-feedback').html('');
            }
        });


        // $('#exampleInputMemberId').change(function(e) {
        //     console.log(e.target.value);

        // });
    </script>
@endsection
