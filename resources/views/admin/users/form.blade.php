@extends('layout.admin')

@section('title', 'Users')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
        @if ($is_add)
        <li class="breadcrumb-item active">Create</li>
        @else
        <li class="breadcrumb-item active">Edit</li>
        <li class="breadcrumb-item active">{{ $user->name }}</li>
        @endif
    </ol>
    @include('partials.flash')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-user me-1"></i>
                    {{ ($is_add) ? 'Add new user' : 'Edit user' }}
                </div>
                <div class="card-body">
                    <form method="post" action="{{ ($is_add) ? route('users.store') : route('users.update', $user->id) }}">
                        @csrf
                        @if (!$is_add)
                        @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="e.g. John Doe" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="e.g. name@example.com" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPasswordConfirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputRole" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="inputRole" name="role">
                                @foreach (User::roles() as $role)
                                <option value="{{ $role }}" {{ (old('role', $user->role) == $role) ? 'selected' : '' }}>{{ ucwords($role) }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- submit --}}
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-2"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @if(!$is_add)
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
                            <th>Last Active</th>
                            <td>{{ ($user->last_activity) ? Helper::customDateFormat($user->last_activity, 'd F Y H:i:s') : '-' }}</td>
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
        @endif
    </div>
</div>
@endsection
