@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Add User</h3>
                </div>
                <form action="{{ route('storeUser') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtName">Name</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="txtUsername">Username</label>
                        <input type="text" id="txtUsername" name="txtUsername" class="form-control" required placeholder="Username">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 position-relative">
                            <label for="txtPassword">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="txtPassword" name="txtPassword" required placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('txtPassword', this)" style="cursor: pointer;">
                                        <i class="ti-lock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="txtConfPassword">Retype Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="txtConfPassword" name="txtConfPassword" required placeholder="Retype Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('txtConfPassword', this)" style="cursor: pointer;">
                                        <i class="ti-lock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtRole">Role</label>
                            <select class="custom-select" id="txtRole" name="txtRole" required>
                                <option value="tim keuangan" selected>Tim Keuangan</option>
                                <option value="panitia">Panitia</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtStatus">Status</label>
                            <select class="custom-select" id="txtStatus" name="txtStatus" required>
                                <option value="1" selected>Active</option>
                                <option value="0">Nonactive</option>
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
<!-- /.content -->

<script>
    function togglePassword(inputId, iconSpan) {
        const input = document.getElementById(inputId);
        const icon = iconSpan.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection