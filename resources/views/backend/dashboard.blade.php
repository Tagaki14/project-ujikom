@extends('layouts.backend')

@section('content')
   <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card rounded-4 shadow h-150 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Students</div>
                        <div class="h5 mb-0 font-weight-bold text-blue-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-address-book fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card rounded-4 shadow h-150 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card rounded-4 shadow h-150 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Payment
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col">
                                <div class="text-xs font-weight text-info text-uppercase mb-0">
                                    Transaksi
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-cash-register text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card rounded-4 shadow h-150 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Totals</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-money-bill-wave fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
