@extends('admin.layouts.app')
@section('title', 'Become an Introducer')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats card-round">
                <div class="card-header">
                    <div class="card-title">Become an Introducer</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Trading Name</th>
                                    <th>Role</th>
                                    <th>Contact Name</th>
                                    <th> Email</th>
                                    <th> Phone</th>
                                    <th>Contact Method</th>
                                    <th>Range</th>
                                    <th>Received At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($introducerForms as $i)
                                    <tr>
                                        <td>{{ $i->business_name }}</td>
                                        <td>{{ $i->trading_name ?? 'N/A' }}</td>
                                        <td>{{ $i->role }}</td>
                                        <td>{{ $i->contact_name }}</td>

                                        <td title="{{ $i->contact_email }}">
                                            {{ Str::limit($i->contact_email, 10, '...') }}
                                        </td>

                                        <td>{{ $i->contact_phone }}</td>
                                        <td>{{ $i->contact_method }}</td>
                                        <td>{{ $i->range }}</td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($i->created_at)->format('d-m-Y, H:i') }}
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
@endsection
