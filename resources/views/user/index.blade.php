@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h3 class="font-weight-bold">User List</h3>

                        <div class="d-flex align-items-center">
                            <form action="{{ route('userList') }}" method="GET" id="roleFilterForm" class="mr-2">
                                <div class="d-flex align-items-center">
                                    <i class="nav-icon fa fa-filter fa-lg mr-2"></i>
                                    <select class="custom-select" name="filter" onchange="document.getElementById('roleFilterForm').submit();">
                                        <option value="" {{ request('filter') ? '' : 'selected' }}>Semua Role</option>
                                        <option value="tim keuangan" {{ request('filter') == 'tim keuangan' ? 'selected' : '' }}>Tim Keuangan</option>
                                        <option value="panitia" {{ request('filter') == 'panitia' ? 'selected' : '' }}>Panitia</option>
                                    </select>
                                </div>
                            </form>

                            <a href="{{ route('createUser') }}" class="btn btn-primary">Add User</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td class="text-capitalize">{{ $user->role }}</td>
                                            <td class="text-capitalize">{{ $user->status ? 'Active' : 'Nonactive' }}</td>
                                            <td>
                                                <a href="{{ route('editUser', ['user' => $user->id]) }}" class="btn btn-warning py-2" role="button">Edit</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="deleteConfirmationModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete <b>{{ $user->username }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <a href="{{ route('deleteUser', ['user' => $user->id]) }}" class="btn btn-danger">Delete</a>
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
            </div>
        </div>
    </div>
</div>

@endsection