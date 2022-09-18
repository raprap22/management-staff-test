@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Data Staff') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ __('Staff Name') }}" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" name="department_name"
                                        class="form-control @error('department_name') is-invalid @enderror"
                                        placeholder="{{ __('Deparment Name') }}"
                                        value="{{ old('department_name', auth()->user()->department_name) }}" required>
                                    @error('department_name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" name="position"
                                        class="form-control @error('position') is-invalid @enderror"
                                        placeholder="{{ __('Position') }}"
                                        value="{{ old('position', auth()->user()->position) }}" required>
                                    @error('position')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" name="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        placeholder="{{ __('Phone Number') }}"
                                        value="{{ old('phone_number', auth()->user()->phone_number) }}" required>
                                    @error('phone_number')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" name="currency"
                                        class="form-control @error('currency') is-invalid @enderror"
                                        placeholder="{{ __('Currency') }}"
                                        value="{{ old('currency', auth()->user()->currency) }}" required>
                                    @error('currency')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" name="salary"
                                        class="form-control @error('salary') is-invalid @enderror"
                                        placeholder="{{ __('Salary') }}"
                                        value="{{ old('salary', auth()->user()->salary) }}" required>
                                    @error('salary')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <label>Resume</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="resume"
                                        class="filepond @error('resume') is-invalid @enderror"
                                        placeholder="{{ __('Resume') }}"
                                        value="{{ old('resume', auth()->user()->resume) }}" required>
                                    @error('resume')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary ">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
