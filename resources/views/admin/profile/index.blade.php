@extends('layout.admin')

@section('title', 'Profile')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    @include('partials.flash')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-user me-1"></i>
                    Edit Profile
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('profile') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name" name="name" value="{{ $user->name }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email" name="email" value="{{ $user->email }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Password">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @else
                            <small class="text-muted">Leave blank to keep current password</small>
                            @enderror
                        </div>
                        {{-- submit --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-info-circle me-1"></i>
                    User Information
                </div>
                {{-- @dump($user) --}}
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ Helper::customDateFormat($user->created_at) }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ Helper::customDateFormat($user->updated_at) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
