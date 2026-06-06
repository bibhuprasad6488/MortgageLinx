@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h2 class="fw-bold mb-3">Dashboard</h2>
        </div>
        {{-- <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
            <a href="#" class="btn btn-primary btn-round">Add Customer</a>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="card-title">Contact Form Submissions</div>
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
                                    <td>{{ $c->your_messsage }}</td>
                                    <td>{{ \Carbon\Carbon::parse($c->created_at)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="card-title">Become an Introducer Submissions</div>
                </div>
                <div class="card-body">
                    <table id="dataTable2" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>BusinessName</th>
                                <th>Trading Name</th>
                                <th>Role</th>
                                <th>Contact Name</th>
                                <th>Contact Email</th>
                                <th>Contact Phone</th>
                                <th>Contact Method</th>
                                <th>Range</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($introducerForms as $i)
                                <tr>
                                    <td>{{ $i->business_name }}</td>
                                    <td>{{ $i->trading_name??'N/A' }}</td>
                                    <td>{{ $i->role }}</td>
                                    <td>{{ $i->contact_name }}</td>
                                    <td>{{ $i->contact_email }}</td>
                                    <td>{{ $i->contact_phone }}</td>
                                    <td>{{ $i->contact_method }}</td>
                                    <td>{{ $i->range }}</td>
                                    <td>{{ \Carbon\Carbon::parse($i->created_at)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Visitors</p>
                                <h4 class="card-title">1,294</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Subscribers</p>
                                <h4 class="card-title">1303</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-luggage-cart"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Sales</p>
                                <h4 class="card-title">$ 1,345</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Order</p>
                                <h4 class="card-title">576</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
@push('scripts')

    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const datatablesSimple = document.getElementById('dataTable2');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>
@endpush
