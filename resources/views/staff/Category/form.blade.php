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
                        <li class="breadcrumb-item active">Kategori</li>
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
                            <h3 class="card-title">{{ isset($category) ? 'Edit' : 'Tambah' }} Data Kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form
                                action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                                method="POST">
                                {{ csrf_field() }}
                                @if (isset($category))
                                    {{ method_field('patch') }}
                                @endif

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputId" class="form-label">Kategori Id</label>
                                    <input type="text" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}"
                                        id="exampleInputId" aria-describedby="idHelp" name="id"
                                        value="{{ old('id', isset($category) ? $category->id : '') }}">
                                    <div class="invalid-feedback">
                                        @error('id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label ">Nama Kategori</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="exampleInputName" aria-describedby="nameHelp" name="name"
                                        value="{{ old('name', isset($category) ? $category->name : '') }}">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>


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
