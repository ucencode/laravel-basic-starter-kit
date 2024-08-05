@extends('layout.admin')

@section('title', 'Users')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">Table</li>
    </ol>
    @include('partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa fa-table me-1"></i>
                    Table of users
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Add new user</a>
                        </div>
                        <div>
                            {{-- <form method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search" placeholder="Search for..." value="{{ request()->get('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var userTable;
        window.addEventListener('DOMContentLoaded', () => {
            userTable = new DataTable('#dataTable', {
                'processing': true,
                'serverSide': true,
                'ajax': "{{ route('users.datatable') }}",
                'searchDelay': 700,
                'columns': [
                    { name: 'name', data: 'name' },
                    { name: 'email', data: 'email' },
                    {
                        name: 'actions',
                        render: function(data, type, row) {
                            let edit_button = document.createElement('a');
                            edit_button.href = row.edit_url;
                            edit_button.className = 'btn btn-primary';
                            edit_button.innerHTML = 'Edit';

                            let delete_button = document.createElement('button');
                            delete_button.type = 'button';
                            delete_button.className = 'btn btn-danger';
                            delete_button.innerHTML = 'Delete';
                            // set onclick attribute
                            delete_button.setAttribute('onclick', `deleteUser('${row.delete_url}')`);

                            return edit_button.outerHTML + ' ' + delete_button.outerHTML;
                        }
                    },
                ],
                'columnDefs': [{
                    'targets': [2], // 3rd columns
                    'orderable': false, // set not orderable
                }]
            });
        });

        function deleteUser(url) {
            deleteConfirmation().then((yes) => {
                if (yes) {
                    // delete using xmlhttprequest
                    const xhr = new XMLHttpRequest();
                    xhr.open('DELETE', url, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    // set response type to json
                    xhr.responseType = 'json';
                    xhr.onreadystatechange = function() {
                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                            successMessage(this.response.message).then(() => {
                                userTable.draw();
                            });
                        }
                    }
                    xhr.send();
                }
            });
        }
    </script>
@endpush
