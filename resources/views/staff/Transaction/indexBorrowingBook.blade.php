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
                        <li class="breadcrumb-item active">Peminjaman</li>
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
                            <h3 class="card-title">Data Peminjaman</h3>
                            <a href="{{ route('transaction.borrowing-book.create') }}"
                                class="btn btn-success ml-auto">Tambah
                                Data Peminjaman</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>ID Buku</th>
                                        <th>Nama Buku</th>
                                        <th>Peminjam</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Expired</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrows as $borrow)
                                        <tr>
                                            <td class="text-center">{{ $borrow->id }}</td>
                                            <td class="text-center">{{ $borrow->book->id }}</td>
                                            <td class="text-center">{{ $borrow->book->title }}</td>
                                            <td>{{ $borrow->member->name }}</td>
                                            <td>{{ $borrow->loan_date }}</td>
                                            <td>{{ $borrow->estimated_return_date }}</td>
                                            <td class="text-center">
                                                <a
                                                    class="btn btn-warning"href="{{ route('transaction.borrowing-book.edit', $borrow->id) }}"><i
                                                        value="Edit">Ubah</a>
                                                <a class="btn btn-primary"href="{{ route('transaction.book-return.create-id', $borrow->id) }}"><i
                                                        value="Edit">Pengembalian</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>ID Buku</th>
                                        <th>Nama Buku</th>
                                        <th>Peminjam</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Expired</th>
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
