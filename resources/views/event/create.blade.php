@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h3 class="font-weight-bold">Add Event</h3>
                </div>
                <form action="{{ route('storeEvent') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="txtName">Event Name</label>
                        <input type="text" id="txtName" name="txtName" class="form-control" required placeholder="Event Name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtLocation">Location</label>
                            <input type="text" class="form-control" id="txtLocation" placeholder="Event Location" name="txtLocation" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtSpeaker">Speaker</label>
                            <input type="text" class="form-control" id="txtSpeaker" placeholder="Speaker Name" name="txtSpeaker" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="txtDate">Date</label>
                            <input type="date" class="form-control" id="txtDate" name="txtDate" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtTime">Time</label>
                            <input type="time" class="form-control" id="txtTime" name="txtTime" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtFee">Price</label>
                            <input type="number" class="form-control" id="txtFee" placeholder="Event Price" name="txtFee" min="0" max="9999999999" value="0" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="txtPeserta">Max. Participants</label>
                            <input type="number" class="form-control" id="txtPeserta" name="txtPeserta" placeholder="Max. Participants" min="0" max="999" value="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="txtCover">Choose Poster</label>
                        </div>
                        <input type="file" class="form-control" id="txtCover" name="txtCover" accept="image/*">
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