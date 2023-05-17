@extends('layouts.auth')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$employee}}</h3>

                            <p>Total Employees</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.employee.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Today Birthday</h3>
                    </div>
                    <div class="card-body">
                        @foreach($birthdays as $birthday)
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="d-flex flex-column text-right">
                                    <span class="text-muted">{{$birthday->name}}</span>
                                </p>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Upcoming Birthday</h3>
                    </div>
                    <div class="card-body">
                        @foreach($upcomings as $upcoming)
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="d-flex flex-column text-right">
                                    <span class="text-muted">{{$upcoming->name}}</span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
