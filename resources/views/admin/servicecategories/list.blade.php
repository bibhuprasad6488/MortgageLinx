@extends('admin.layouts.app')
@section('title', 'Service Categories')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 ">
        <div>
            <h3 class="fw-bold mb-3 d-none">Home Page</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('admin.service-categories.create') }}" class="btn btn-primary">Add Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Categories</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img @if ($cat && $cat->cat_image) src="{{ $cat->cat_image }}"
                                        @else
                                            src="{{ asset('admin/img/no-img.png') }}" @endif
                                                alt="{{ $cat->title }}" width="80" class="rounded">
                                        </td>
                                        <td>{{ $cat->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cat->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.service-categories.edit', $cat->id) }}"
                                                class="btn btn-sm btn-primary @if (strtolower($cat->title) === 'protection') d-none @endif">Edit</a>
                                            <form action="{{ route('admin.service-categories.destroy', $cat->id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger @if (strtolower($cat->title) === 'protection') d-none @endif"
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
