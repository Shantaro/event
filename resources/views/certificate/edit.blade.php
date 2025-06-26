@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Edit Certificate</h3>
                </div>
                <form action="{{ route('updateCertificate', ['certificate' => $certificate->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="certificateNow">Current Certificate</label>
                        <div>
                            <img src="{{ asset('img/certificate/' . $certificate->certificate_url) }}" style="width: 500px; height: auto;">
                        </div>
                        <div class="mt-4">
                            <label for="txtCertificate">Edit Certificate</label>
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