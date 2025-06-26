@extends('layouts.main')

@section('content')

<!-- Main content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="font-weight-bold mb-0">Event List</h3>
            @auth
            @if (Auth::user()->role == 'panitia')
            <a href="{{ route('createEvent') }}" class="btn btn-primary" role="button">
                Add Event
            </a>
            @endif
            @endauth
        </div>

        <div class="d-flex flex-wrap justify-content-start" style="gap: 1rem;">
            @foreach($events as $event)
            <div class="card" style="width: 32%; display: flex; flex-direction: row; padding: 10px;">
                <div style="width: 100px; height: auto; flex-shrink: 0;">
                    <img src="{{ asset('img/event/' . $event->poster_url) }}"
                        alt="Cover {{ $event->name }}"
                        style="width: 100%; aspect-ratio: 2/3; object-fit: cover; border-radius: 5px;">
                </div>

                <div class="ml-3 d-flex flex-column justify-content-between w-100">
                    <div>
                        <h5 class="font-weight-bold mb-2">{{ $event->name }}</h5>
                        <p class="mb-0"><i class="ti-user mr-2"></i>{{ $event->speaker }}</p>
                        <p class="mb-0"><i class="ti-location-pin mr-2"></i>{{ $event->location }}</p>
                        <p class="mb-0">
                            <i class="ti-calendar mr-2"></i>{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }} | {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                        </p>
                        <p class="mb-0"><i class="ti-money mr-2"></i>Rp {{ number_format($event->registration_fee, 0, ',', '.') }}</p>
                    </div>

                    <div class="d-flex justify-content-end">
                        @auth
                        @if (Auth::user()->role == 'panitia')
                        <a href="{{ route('paymentList', ['eventId' => $event->id]) }}"
                            class="btn btn-primary btn-sm d-flex align-items-center mr-2">
                            Participants
                        </a>

                        <a href="{{ route('editEvent', ['event' => $event->id]) }}"
                            class="btn btn-warning btn-sm d-flex align-items-center justify-content-center mr-2">
                            <i class="ti-write"></i>
                        </a>

                        <a href="#"
                            class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                            role="button"
                            data-toggle="modal"
                            data-target="#deleteConfirmationModal{{ $event->id }}">
                            <i class="ti-trash"></i>
                        </a>

                        @elseif (Auth::user()->role == 'member')
                        <a href="{{ route('createRegistration', ['eventId' => $event->id]) }}" class="btn btn-success btn-sm mr-2">Register</a>
                        @elseif (Auth::user()->role == 'tim keuangan')
                        <a href="{{ route('paymentList', ['eventId' => $event->id]) }}" class="btn btn-primary btn-sm mr-2">Participants</a>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteConfirmationModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Delete <b>{{ $event->name }}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="{{ route('deleteEvent', ['event' => $event->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection