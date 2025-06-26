@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h3 class="font-weight-bold">Participants List</h3>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            @if (Auth::user()->role == 'tim keuangan')
                                            <th>Payment Status</th>
                                            <th>Registration Date</th>
                                            @else
                                            <th>Presence Status</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registrations as $index => $registration)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $registration->user->name }}</td>
                                            <td>{{ $registration->user->username }}</td>
                                            @if (Auth::user()->role == 'tim keuangan')
                                            <td class="text-capitalize">
                                                <span class="badge badge-{{ $registration->payment_status == 'paid' ? 'success' : 'warning' }}">
                                                    {{ $registration->payment_status }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($registration->created_at)->format('d M Y H:i') }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary mr-2 py-2" role="button" data-toggle="modal" data-target="#paymentModal{{ $registration->id }}">Payment Proof</a>
                                                @if ($registration->payment_status == 'pending')
                                                <a href="{{ route('updatePayment', ['registration' => $registration->id]) }}" class="btn btn-success py-2" role="button">Verify</a>
                                                @endif
                                            </td>
                                            @else
                                            <td class="text-capitalize">
                                                @if ($registration->presence)
                                                <span class="badge badge-success">Attend</span>
                                                @else
                                                <span class="badge badge-danger">Not Attend</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$registration->presence)
                                                <!-- <a href="{{ route('createPresence', ['registration' => $registration->id]) }}" class="btn btn-primary py-2 mr-2">Presence</a> -->
                                                @else
                                                @if ($registration->certificate)
                                                <a href="#" class="btn btn-primary py-2 mr-2" role="button" data-toggle="modal" data-target="#certificateModal{{ $registration->id }}">Certificate</a>
                                                <a href="{{ route('editCertificate', ['certificate' => $registration->certificate->id]) }}" class="btn btn-warning py-2" role="button"><i class="ti-write mr-2"></i>Certificate</a>
                                                @else
                                                <a href="{{ route('createCertificate', ['registration' => $registration->id]) }}" class="btn btn-success py-2" role="button"><i class="ti-export mr-2"></i>Certificate</a>
                                                @endif
                                                @endif
                                            </td>
                                            @endif
                                        </tr>

                                        <div class="modal fade" id="paymentModal{{ $registration->id }}" tabindex="-1" role="dialog" aria-labelledby="paymentLabel{{ $registration->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="paymentLabel{{ $registration->id }}">Payment {{ $registration->user->name }}</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        @if ($registration->transaction_proof_url)
                                                        <img src="{{ asset('img/transaction/' . $registration->transaction_proof_url) }}" style="width: 460px; height: auto;">
                                                        @else
                                                        <p>No Payment</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="certificateModal{{ $registration->id }}" tabindex="-1" role="dialog" aria-labelledby="certificateLabel{{ $registration->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="certificateLabel{{ $registration->id }}">Certificate {{ $registration->user->name }}</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        @if ($registration->certificate)
                                                        <img src="{{ asset('img/certificate/' . $registration->certificate->certificate_url) }}" style="width: 460px; height: auto;">
                                                        @else
                                                        <p>No Certificate</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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