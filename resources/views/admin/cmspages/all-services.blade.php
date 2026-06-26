@extends('admin.layouts.app')
@section('title', 'About Us')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 d-none">
        <div>
            <h3 class="fw-bold mb-3">About Us</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form action="{{ route('admin.cms-all-services') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">SEO Section</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="meta_title" id="meta_title" class="form-control"
                                    value="{{ optional($allServicePage)->meta_title ?? old('meta_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Description
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_desc" id="meta_desc" class="form-control " rows="3">{{ optional($allServicePage)->meta_desc ?? old('meta_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Keywords
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control " rows="3">{{ optional($allServicePage)->meta_keywords ?? old('meta_keywords') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class=" col-form-label"></label>
                    <div class="d-flex justify-content-center">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" id="submitBtn1" class="btn btn-primary px-4"
                                name="submit2">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
