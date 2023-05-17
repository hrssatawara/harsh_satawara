@extends('layouts.auth')

@section('title')
    Add Employees
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.employee.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form
            action="{{ isset($employee) ? route('admin.employee.update',$employee) : route('admin.employee.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($employee))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        <input type="text" name="first_name" class="form-control"
                               value="{{isset($employee)?$employee->first_name : ''}}" placeholder="Company Name">
                        @error('first_name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        <input type="text" name="last_name" class="form-control"
                               value="{{isset($employee)?$employee->last_name : ''}}" placeholder="Company Name">
                        @error('last_name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control"
                               value="{{isset($employee)?$employee->email : ''}}" placeholder="Company Email" {{isset($employee)?'disabled' : ''}}>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{--<div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control"
                               value="" placeholder="Company Email">
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>--}}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Address:</strong>
                        <input type="text" name="address" class="form-control"
                               value="{{isset($employee)?$employee->address : ''}}" placeholder="Company Address">
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Department:</strong>
                        <input type="text" name="department" class="form-control"
                               value="{{isset($employee)?$employee->department : ''}}" placeholder="Company Email">
                        @error('department')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Country:</strong>
                        <input type="text" name="country" class="form-control"
                               value="{{isset($employee)?$employee->country : ''}}" placeholder="Company Email">
                        @error('country')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>State:</strong>
                        <input type="text" name="state" class="form-control"
                               value="{{isset($employee)?$employee->state : ''}}" placeholder="Company Email">
                        @error('state')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>City:</strong>
                        <input type="text" name="city" class="form-control"
                               value="{{isset($employee)?$employee->city : ''}}" placeholder="Company Email">
                        @error('city')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Pincode:</strong>
                        <input type="text" name="zip_code" class="form-control"
                               value="{{isset($employee)?$employee->zip_code : ''}}" placeholder="Company Email">
                        @error('zip_code')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Birthdate:</strong>
                        <input type="date" name="birthdate" class="form-control datepicker-days"
                               value="{{isset($employee)?$employee->birthdate : ''}}" placeholder="Company Email">
                        @error('birthdate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Date hired:</strong>
                        <input type="date" name="date_hired" class="form-control datepicker-days"
                               value="{{isset($employee)?$employee->date_hired : ''}}" placeholder="Company Email">
                        @error('date_hired')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
