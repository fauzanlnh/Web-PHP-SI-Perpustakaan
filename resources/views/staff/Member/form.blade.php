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
                        <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Member</a></li>
                        <li class="breadcrumb-item active">{{ isset($member) ? 'Ubah' : 'Tambah' }} Member</li>
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
                            <h3 class="card-title">{{ isset($member) ? 'Edit' : 'Tambah' }} Data Member</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form
                                action="{{ isset($member) ? route('member.update', $member->id) : route('member.store') }}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (isset($member))
                                    {{ method_field('patch') }}
                                @endif

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label ">Nama</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="exampleInputName" aria-describedby="nameHelp" name="name"
                                        value="{{ old('name', isset($member) ? $member->name : '') }}">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label ">E-Mail</label>
                                    <input type="text"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                        value="{{ old('email', isset($member) ? $member->email : '') }}">
                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{--  --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label ">Foto</label>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                            id="customFile" aria-describedby="photoHelp" name="photo">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <div class="invalid-feedback">
                                            @error('photo')
                                                {{ $message }}
                                            @enderror
                                        </div>
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
        // $('#customFile').on('change', function() {
        //     //get the file name
        //     var fileName = $(this).val();
        //     console.log(fileName);
        //     //replace the "Choose a file" label
        //     $(this).next('.custom-file-label').html(fileName);
        // })

        $('#customFile').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@endsection
