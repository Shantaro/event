@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Edit User</h3>
                </div>
                <form action="{{ route('updateUser', ['user' => $user->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtName">Name</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Nama" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="txtUsername">Username</label>
                        <input type="text" id="txtUsername" name="txtUsername" class="form-control" required placeholder="Username" value="{{ $user->username }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtRole">Role</label>
                            <select class="custom-select" id="txtRole" name="txtRole" required>
                                <option value="{{ $user->role }}" selected>{{ ucwords($user->role) }}</option>
                                @if ($user->role == 'tim keuangan')
                                <option value="panitia">Panitia</option>
                                @else
                                <option value="tim keuangan">Tim Keuangan</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtStatus">Status</label>
                            <select class="custom-select" id="txtStatus" name="txtStatus" required>
                                @if ($user->status == 1)
                                <option value="1" selected>Active</option>
                                <option value="0">Nonactive</option>
                                @else
                                <option value="0" selected>Nonactive</option>
                                <option value="1">Active</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('userList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>

@endsection