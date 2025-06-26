@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Add Certificate</h3>
                </div>
                <form action="{{ route('storeCertificate', ['registration' => $registration->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label for="txtCertificate">Add Certificate</label>
                        </div>
                        <input type="file" class="form-control" id="txtCertificate" name="txtCertificate" accept="image/*">
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