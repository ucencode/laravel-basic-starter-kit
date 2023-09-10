@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    @include('partials.flash')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fa fa-users fa-3x"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl text-right">{{ User::count() }} Users</h1>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
