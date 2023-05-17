@extends('layouts.auth')

@section('title')
    Employees
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row"><a href="{{route('admin.employee.create')}}" type="button" class="btn btn-primary btn-lg">Add Employee</a>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">Fixed Header Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Department</th>
                                    <th>Date hired</th>
                                    <th>Birthdate</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $key=>$employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>{{$employee->department}}</td>
                                    <td>{{$employee->date_hired}}</td>
                                    <td>{{$employee->birthdate}}</td>

                                    <td>
                                        <form action="{{ route('admin.employee.destroy',$employee->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('admin.employee.edit',$employee) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
