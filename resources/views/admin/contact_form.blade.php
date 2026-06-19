@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="card-title">Contact Forms</div>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Enquiry Type</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactForms as $c)
                                <tr>
                                    <td>{{ $c->full_name }}</td>
                                    <td>{{ $c->email_address }}</td>
                                    <td>{{ $c->phone_number }}</td>
                                    <td>{{ $c->enquiry_type }}</td>
                                    <td>{{ $c->your_subject }}</td>
                                    <td>
                                        @if (strlen($c->your_messsage) > 50)
                                            <span class="short-text">
                                                {{ Str::limit($c->your_messsage, 50, '...') }}
                                            </span>

                                            <span class="full-text d-none">
                                                {{ $c->your_messsage }}
                                            </span>

                                            <a href="javascript:void(0);" class="toggle-text text-primary">Read More</a>
                                        @else
                                            {{ $c->your_messsage }}
                                        @endif
                                    </td>
                                    {{-- <td>{{ Str::limit($c->your_messsage, 50, '....') }} <a href="javascript:;">Read more</a> --}}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($c->created_at)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).on('click', '.toggle-text', function() {
            let row = $(this).closest('td');

            row.find('.short-text').toggleClass('d-none');
            row.find('.full-text').toggleClass('d-none');

            $(this).text(
                $(this).text() === 'Read More' ?
                'Read Less' :
                'Read More'
            );
        });
    </script>
@endpush
