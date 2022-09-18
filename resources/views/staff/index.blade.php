@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">{{ __('Data Staff') }}</h1>
                </div>
                @can('staff-store')
                    <div class="col-sm-2 text-right">
                        <a class="btn btn-primary" href="{{ route('staff.create') }}" role="button">
                            <i class="fas fa-plus"></i>
                            {{ __('Tambah Data Staff') }}
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Staff ID
                                </th>
                                <th>
                                    Staff Name
                                </th>
                                <th>
                                    Department Name
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $staff->staff_id }}
                                    </td>
                                    <td>
                                        {{ $staff->name }}
                                    </td>
                                    <td>
                                        {{ $staff->department_name }}
                                    </td>
                                    <td class="text-center">

                                        <a class="btn btn-primary" href="" role="button" data-toggle="modal"
                                            data-target="#detail-{{ $staff->id }}">
                                            Detail
                                        </a>
                                        @can('staff-update')
                                            <a class="btn btn-primary" href="" role="button" data-toggle="modal"
                                                data-target="#update-{{ $staff->id }}">
                                                Edit
                                            </a>
                                        @endcan
                                        @can('staff-desroy')
                                            <a class="btn btn-danger" href="" role="button" data-toggle="modal"
                                                data-target="#hapus-{{ $staff->id }}">
                                                Hapus
                                            </a>
                                        @endcan
                                    </td>
                                </tr>

                                @can('staff-show')
                                    <div class="modal fade" id="detail-{{ $staff->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="hapuslabel">Data {{ $staff->name }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label>Staff ID</label>
                                                            <input type="text" name="staff_id" class="form-control" readonly
                                                                value="{{ $staff->staff_id }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Name</label>
                                                            <input type="text" name="name" class="form-control" readonly
                                                                value="{{ $staff->name }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Department Name</label>
                                                            <input type="text" name="department_name" class="form-control"
                                                                readonly value="{{ $staff->department_name }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Position</label>
                                                            <input type="text" name="position" class="form-control" readonly
                                                                value="{{ $staff->position }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Phone Number</label>
                                                            <input type="text" name="phone_number" class="form-control"
                                                                readonly value="{{ $staff->phone_number }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Currency</label>
                                                            <input type="text" name="currency" class="form-control" readonly
                                                                value="{{ $staff->currency }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Salary</label>
                                                            <input type="text" name="salary" class="form-control" readonly
                                                                value="{{ number_format($staff->salary) }}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label>Resume</label>
                                                            <a href="{{ Storage::url('public/staff/resume/' . $staff->resume) }}"
                                                                download>{{ $staff->resume }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-right">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                {{-- modal update --}}
                                @can('staff-update')
                                    <div class="modal fade" id="update-{{ $staff->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="hapuslabel">Data {{ $staff->name }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('staff.update', $staff) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label>Staff ID</label>
                                                                <input type="text" name="staff_id"
                                                                    class="form-control @if ($errors->has('staff_id')) is-invalid @endif"
                                                                    value="{{ $staff->staff_id }}">

                                                                @if ($errors->has('staff_id'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control @if ($errors->has('name')) is-invalid @endif"
                                                                    value="{{ $staff->name }}">

                                                                @if ($errors->has('name'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Department Name</label>
                                                                <input type="text" name="department_name"
                                                                    class="form-control @if ($errors->has('department_name')) is-invalid @endif"
                                                                    value="{{ $staff->department_name }}">

                                                                @if ($errors->has('department_name'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('department_name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Position</label>
                                                                <input type="text" name="position"
                                                                    class="form-control @if ($errors->has('position')) is-invalid @endif"
                                                                    value="{{ $staff->position }}">

                                                                @if ($errors->has('position'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('position') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Phone Number</label>
                                                                <input type="text" name="phone_number"
                                                                    class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                                                                    value="{{ $staff->phone_number }}">

                                                                @if ($errors->has('phone_number'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Currency</label>
                                                                <input type="text" name="currency"
                                                                    class="form-control @if ($errors->has('currency')) is-invalid @endif"
                                                                    value="{{ $staff->currency }}">

                                                                @if ($errors->has('currency'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('currency') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Salary</label>
                                                                <input type="text" name="salary"
                                                                    class="form-control @if ($errors->has('salary')) is-invalid @endif"
                                                                    value="{{ $staff->salary }}">

                                                                @if ($errors->has('salary'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('salary') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Resume</label><br>
                                                                <input type="file" name="resume"
                                                                    @error('resume') is-invalid @enderror>
                                                                @error('resume')
                                                                    <span class="error invalid-feedback">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-right">
                                                        <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fas fa-check">
                                                            </i>
                                                            Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                {{-- modal hapus --}}
                                <div class="modal fade" id="hapus-{{ $staff->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="hapuslabel">Hapus Data Staff</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3><i class="icon fas fa-info"></i> Peringatan !</h3>
                                                "Apakah anda yakin ingin menghapus data dari {{ $staff->name }} ?"
                                            </div>
                                            <div class="modal-footer justify-content-right">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancel</button>

                                                <form action="{{ route('staff.destroy', $staff) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
