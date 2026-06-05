@extends('admin.layouts.app')
@section('title', 'Add Category')
@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.service-categories.store') }}" method="POST" enctype="multipart/form-data"
                id="catUploadForm">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="title" id="title" class="form-control "
                                    value="{{ old('title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Description
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="short_desc" id="short_desc" class="form-control " rows="3">{{ old('short_desc') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Image (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" data-input="cat_image" data-preview="catImgPreview"
                                    data-default="{{ asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="cat_image" name="cat_image" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="catImgPreview" width="100">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Footer Icon </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" data-input="footer_icon" data-preview="catFooterIconPreview"
                                    data-default="{{ asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="footer_icon" name="footer_icon" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="catFooterIconPreview" width="100">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Show On Home Page
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="checkbox" name="show_on_home" id="show_on_home" class="" value="1">
                            </div>
                        </div>

                        <div class="card-header">
                            <h4 class="card-title ">SEO Details</h4>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="meta_title" id="meta_title" class="form-control "
                                    value="{{ old('meta_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Description
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_desc" id="meta_desc" class="form-control " rows="3">{{ old('meta_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Keywords
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control " rows="3">{{ old('meta_keywords') }}</textarea>

                            </div>
                        </div>
                        <div class="row">
                            <label class=" col-form-label"></label>
                            <div class="d-flex justify-content-center">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" id="uploadBtn" class="btn btn-primary px-4"
                                        name="submit2">Save</button>
                                    <a href="{{ route('admin.service-categories.index') }}"
                                        class="btn btn-secondary px-4">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
