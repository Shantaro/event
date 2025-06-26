@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Registration</h3>
                </div>
                <form action="{{ route('storeRegistration', ['eventId' => $event->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtName">Name</label>
                            <input type="text" id="txtName" name="txtName" class="form-control" value="{{ Auth::user()->name }}" disabled required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtUsername">Username</label>
                            <input type="text" class="form-control" id="txtUsername" name="txtUsername" value="{{ Auth::user()->username }}" disabled required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtEvent">Event Name</label>
                            <input type="text" class="form-control" id="txtEvent" name="txtEvent" value="{{ $event->name }}" disabled required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtFee">Price</label>
                            <input type="text" class="form-control" id="txtFee" name="txtFee" value="Rp {{ number_format($event->registration_fee, 0, ',', '.') }}" disabled required>
                        </div>
                    </div>

                    <div class="form-group">
                        @if (isset($event->poster_url))
                        <img src="{{ asset('img/event/' . $event->poster_url) }}" width="160" height="240">
                        @else
                        <img src="{{ asset('img/default.jpg') }}" width="160" height="240">
                        @endif
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="txtTransaction">Payment Proof (BCA: 0980385710)</label>
                        </div>
                        <input type="file" class="form-control" id="txtTransaction" name="txtTransaction" accept="image/*">
                    </div>
                    <div class="text-right">
                        <a href="{{ route('eventList') }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>

@endsection