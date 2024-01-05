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
                        <li class="breadcrumb-item active">Penerbit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

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
                            <h3 class="card-title">Data Penerbit</h3>
                            <a href="{{ route('publisher.create') }}" class="btn btn-success ml-auto">Tambah Data
                                Penerbit</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Penerbit</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publishers as $publisher)
                                        <tr>
                                            <td class="text-center">{{ $publisher->id }}</td>
                                            <td>{{ $publisher->name }}</td>
                                            <td>{{ $publisher->address }}</td>
                                            <td style="text-align:center;">
                                                <div>
                                                    <div class="row justify-center">
                                                        <div class="col col-6">
                                                            <a
                                                                class="btn btn-warning"href="{{ route('publisher.edit', $publisher->id) }}"><i
                                                                    value="Edit">Ubah</a>
                                                        </div>
                                                        <div class="col col-6">
                                                            <a value='delete'>
                                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                    action="{{ route('publisher.destroy', $publisher->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"><i
                                                                            value="Delete">Hapus</button>
                                                                </form>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Penerbit</th>
                                        <th>Alamat </th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
