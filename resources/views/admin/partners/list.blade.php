@extends('admin.layouts.app')
@section('title', 'Partners')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 ">
        <div>
            <h3 class="fw-bold mb-3 d-none">Home Page</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">Add Partner</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Partners</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Partner</th>
                                    <th>Website URL</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img @if ($p && $p->partner_image) src="{{ $p->partner_image }}"
                                        @else
                                            src="{{ asset('admin/img/no-img.png') }}" @endif
                                                alt="Partner" width="150" class="rounded">
                                        </td>
                                        <td>
                                            {{ $p->website_url ?? '#' }}
                                        </td>
                                        <td>
                                            @if ($p->status == 1)
                                                <a href="javascript:;" class="badge bg-danger text-light"
                                                    title="Click to Unpublish"
                                                    onclick="accessUpdate('{{ route('admin.partner-status-update', $p->id) }}', '0')">Unpublish</a>
                                            @else
                                                <a href="javascript:;" class="badge bg-primary text-light"
                                                    title="Click to Publish"
                                                    onclick="accessUpdate('{{ route('admin.partner-status-update', $p->id) }}', '1')">Publish</a>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y, H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.partners.edit', $p->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.partners.destroy', $p->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this?');">Delete</button>
                                            </form>
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
