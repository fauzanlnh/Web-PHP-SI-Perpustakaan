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
                        <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Buku</a></li>
                        <li class="breadcrumb-item active">Tambah Buku</li>
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
                            <h3 class="card-title">{{ isset($book) ? 'Edit' : 'Tambah' }} Data Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ isset($book) ? route('book.update', $book->id) : route('book.store') }}"
                                method="POST">
                                {{ csrf_field() }}
                                @if (isset($book))
                                    {{ method_field('patch') }}
                                @endif

                                @isset($book)
                                    <div class="mb-3">
                                        <label for="exampleInputId" class="form-label ">ID</label>
                                        <input type="text" class="form-control " id="exampleInputId"
                                            aria-describedby="titleId" name="title" value="{{ $book->id }}" readonly>
                                    </div>
                                @endisset

                                {{-- Book Title --}}
                                <div class="mb-3">
                                    <label for="exampleInputTitle" class="form-label ">Judul</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        id="exampleInputTitle" aria-describedby="titleHelp" name="title"
                                        value="{{ old('title', isset($book) ? $book->title : '') }}">
                                    <div class="invalid-feedback">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{-- Book Description --}}
                                <div class="mb-3">
                                    <label for="exampleInputDescription" class="form-label ">Description</label>
                                    <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                        id="exampleInputDescription" aria-describedby="descriptionHelp" name="description" rows="5">{{ old('description', isset($book) ? $book->description : '') }}</textarea>
                                    <div class="invalid-feedback">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{-- Book Category --}}
                                <div class="mb-3">
                                    <label for="exampleInputForCategory" class="form-label ">Kategori</label>
                                    <select name="category_id" id="exampleInputForCategory"
                                        class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                                        aria-describedby="nameHelp">
                                        <option value="">-- Pilih Nama Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', isset($book) ? $book->category_id : '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{-- Publication Date --}}
                                <div class="mb-3">
                                    <label for="exampleInputDate" class="form-label">Tanggal Publikasi</label>
                                    <input type="date"
                                        class="form-control {{ $errors->has('publication_date') ? 'is-invalid' : '' }}"
                                        id="exampleInputDate" aria-describedby="dateHelp" name="publication_date"
                                        value="{{ old('publication_date', isset($book) ? $book->publication_date : '') }}"
                                        maxlength="15">
                                    <div class="invalid-feedback">
                                        @error('publication_date')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Book Author --}}
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputForAuthor" class="form-label ">Author</label>
                                            <select name="author_id" id="exampleInputForAuthor"
                                                class="form-control {{ $errors->has('author_id') ? 'is-invalid' : '' }}"
                                                aria-describedby="authorHelp">
                                                <option value="">-- Pilih Nama Author --</option>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}"
                                                        {{ old('author_id', isset($book) ? $book->author_id : '') == $author->id ? 'selected' : '' }}>
                                                        {{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                @error('author_id')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Book Publisher --}}
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputForPublisher" class="form-label ">Penerbit</label>
                                            <select name="publisher_id" id="exampleInputForPublisher"
                                                class="form-control {{ $errors->has('publisher_id') ? 'is-invalid' : '' }}"
                                                aria-describedby="publisherHelp">
                                                <option value="">-- Pilih Nama Penerbit --</option>
                                                @foreach ($publishers as $publisher)
                                                    <option value="{{ $publisher->id }}"
                                                        {{ old('publisher_id', isset($book) ? $book->publisher_id : '') == $publisher->id ? 'selected' : '' }}>
                                                        {{ $publisher->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                @error('publisher_id')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        {{-- Shelf Number --}}
                                        <div class="mb-3">
                                            <label for="exampleInputShelfNumber" class="form-label ">No Rak</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('shelf_number') ? 'is-invalid' : '' }}"
                                                id="exampleInputShelfNumber" aria-describedby="shelfNumberHelp"
                                                name="shelf_number"
                                                value="{{ old('shelf_number', isset($book) ? $book->shelf_number : '') }}">
                                            <div class="invalid-feedback">
                                                @error('shelf_number')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        @isset($book)
                                            <div class="mb-3">
                                                <label for="exampleInputQty" class="form-label ">Keterangan Ubah Data</label>
                                                <select name="note" id="exampleInputForPublisher"
                                                    class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}"
                                                    aria-describedby="publisherHelp">
                                                    <option value="">-- Pilih Keterangan --</option>
                                                    <option value="one">-- Ubah ID ini Saja --</option>
                                                    <option value="all">-- Ubah Semua Buku yamg memiliki Judul Yang Sama --
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    @error('qty')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        @endisset

                                        @empty($book)
                                            {{-- Qty --}}
                                            <div class="mb-3">
                                                <label for="exampleInputQty" class="form-label ">Upload Semua Buku</label>
                                                <input type="number"
                                                    class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}"
                                                    id="exampleInputQty" aria-describedby="shelfNumberHelp" name="qty"
                                                    value="{{ old('qty') }}">
                                                <div class="invalid-feedback">
                                                    @error('qty')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        @endempty

                                    </div>
                                </div>




                                {{-- Button Submit --}}
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
