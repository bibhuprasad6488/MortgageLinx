@extends('admin.layouts.app')
@section('title', 'Contact Forms')
@section('content')
    <style>
        /* #messageModal .modal-content {
                height: 95vh;
            } */

        #messageModal .modal-body {
            overflow-y: auto;
            white-space: pre-line;
            word-break: break-word;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="card-title">Contact Forms</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Enquiry Type</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Received At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactForms as $c)
                                    <tr>
                                        <td>{{ $c->full_name }}</td>
                                        <td title="{{ $c->email_address }}">
                                            {{ Str::limit($c->email_address, 10, '...') }}
                                        </td>
                                        <td>{{ $c->phone_number }}</td>
                                        <td>{{ ucfirst($c->enquiry_type) }}</td>
                                        <td>{{ $c->your_subject }}</td>
                                        <td>
                                            @if (strlen($c->your_messsage) > 30)
                                                {{ Str::limit($c->your_messsage, 30, '...') }}
                                                <a href="javascript:void(0);" class="view-message text-primary ms-1"
                                                    data-message="{{ $c->your_messsage }}" data-bs-toggle="modal"
                                                    data-bs-target="#messageModal">
                                                    Read More
                                                </a>
                                            @else
                                                {{ $c->your_messsage }}
                                            @endif
                                        </td>
                                        {{-- <td>{{ Str::limit($c->your_messsage, 30, '....') }} <a href="javascript:;">Read more</a> --}}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($c->created_at)->format('d-m-Y, H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Enquiry Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id="messageContent"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click', '.view-message', function() {
            $('#messageContent').text($(this).data('message'));
        });
    </script>
@endpush
