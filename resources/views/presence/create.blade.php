@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Presence</h3>
                </div>
                <form action="{{ route('storePresence', ['registration' => $registration->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtCode">QR Code</label>
                        <input type="text" id="txtCode" name="txtCode" class="form-control" placeholder="QR Code" required>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('paymentList', ['eventId' => $registration->event_id]) }}" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>

@endsection