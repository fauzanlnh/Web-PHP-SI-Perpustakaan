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
                        <li class="breadcrumb-item active">Author</li>
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
                            <h3 class="card-title">{{ isset($author) ? 'Edit' : 'Tambah' }} Data Author</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form
                                action="{{ isset($author) ? route('author.update', $author->id) : route('author.store') }}"
                                method="POST">
                                {{ csrf_field() }}
                                @if (isset($author))
                                    {{ method_field('patch') }}
                                @endif

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Nama Author</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="nameHelp" name="name"
                                        value="{{ old('name', isset($author) ? $author->name : '') }}">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{--  --}}

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputDate" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="exampleInputDate"
                                        aria-describedby="dateHelp" name="birth_date"
                                        value="{{ old('birth_date', isset($author) ? $author->birth_date : '') }}"
                                        maxlength="15">
                                </div>
                                @error('birth_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{--  --}}

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputCountry" class="form-label">Negara</label>
                                    <select name="country" id="country" class="form-control" id="exampleInputCountry">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}"
                                                {{ old('country', isset($author) ? $author->country : '') == $country ? 'selected' : '' }}>
                                                {{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('country')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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
