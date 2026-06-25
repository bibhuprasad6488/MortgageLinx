@extends('admin.layouts.app')
@section('title', 'Services')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 ">
        <div>
            <h3 class="fw-bold mb-3 d-none">Home Page</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add Service</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Services</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img @if ($s && $s->service_image) src="{{ $s->service_image }}"
                                        @else
                                            src="{{ asset('admin/img/no-img.png') }}" @endif
                                                alt="{{ $s->title }}" width="80" class="rounded">
                                        </td>
                                        <td>{{ $s->title }}</td>
                                        <td>{{ $s->category->title }}</td>
                                        <td>
                                            @if ($s->status == 1)
                                                <a href="javascript:;" class="badge bg-danger text-light"
                                                    title="Click to Unpublish"
                                                    onclick="accessUpdate('{{ route('admin.service-status-update', $s->id) }}', '0')">Unpublish</a>
                                            @else
                                                <a href="javascript:;" class="badge bg-primary text-light"
                                                    title="Click to Publish"
                                                    onclick="accessUpdate('{{ route('admin.service-status-update', $s->id) }}', '1')">Publish</a>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($s->created_at)->format('d-m-Y, H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.services.edit', $s->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST"
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
