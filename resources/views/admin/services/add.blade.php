@extends('admin.layouts.app')
@section('title', 'Add Service')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="catUploadForm">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-12 fond-bold ">
                                Category <span>*</span>
                            </label>
                            <div class="col-md-12">
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($serviceCats as $sc)
                                        <option value="{{ $sc->id }}">{{ $sc->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="shadow">
                            <h4 class="card-title">To be displayed on category page</h4>
                            <div class="form-group row  mb-2">
                                <label for="" class="col-md-12 fw-bold">
                                    Title <span>*</span>
                                </label>
                                <div class="col-md-12">
                                    <input type="text" name="thumb_title" id="thumb_title" class="form-control "
                                        value="{{ old('thumb_title') }}">
                                </div>
                            </div>
                            <div class="form-group row  mb-2">
                                <label for="" class="col-md-12 fond-bold">
                                    Short Description
                                </label>
                                <div class="col-md-12">
                                    <textarea name="thumb_short_desc" id="thumb_short_desc" class="form-control " rows="3">{{ old('thumb_short_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row  mb-2">
                                <label for="Img" class="col-md-12">
                                    Icon</label>
                                <div class="col-md-2 col-sm-3 col-xs-12">

                                    <div class="drop-area" data-input="thumb_image" data-preview="thumbImgPreview"
                                        data-default="{{ asset('admin/img/no-img.png') }}">
                                        <p>Drag & Drop/Click </p>
                                        <input type="file" id="thumb_image" name="thumb_image" hidden
                                            accept=".jpg,.jpeg,.png,.webp">

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="" id="thumbImgPreview" width="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row  mb-2">
                        <label for="" class="col-md-12 fw-bold">
                            Banner Title <span>*</span>
                        </label>
                        <div class="col-md-12">
                            <input type="text" name="title" id="title" class="form-control "
                                value="{{ old('title') }}" required>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <label for="" class="col-md-12 fond-bold">
                            Banner Description
                        </label>
                        <div class="col-md-12">
                            <textarea name="short_desc" id="short_desc" class="form-control " rows="3">{{ old('short_desc') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row  mb-2">
                        <label for="Img" class="col-md-12">
                            Banner Image (Drag & Drop)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <div class="drop-area" data-input="service_image" data-preview="serviceImgPreview"
                                data-default="{{ asset('admin/img/no-img.png') }}">
                                <p>Drag & Drop Image Here or Click to Select</p>
                                <input type="file" id="service_image" name="service_image" hidden
                                    accept=".jpg,.jpeg,.png,.webp">

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img src="" id="serviceImgPreview" width="100">
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <label for="" class="col-md-12 fond-bold">
                            Page Content
                        </label>
                        <div class="col-md-12">
                            <textarea name="content" id="summernote" class="form-control " rows="3">{{ old('content') }}</textarea>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">SEO Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row  mb-2">
                                <label for="" class="col-md-12">Meta
                                    Title
                                </label>
                                <div class="col-md-12">
                                    <input type="text" name="meta_title" id="meta_title" class="form-control "
                                        value="{{ old('meta_title') }}" required>
                                </div>
                            </div>
                            <div class="form-group row  mb-2">
                                <label for="" class="col-md-12">Meta
                                    Description
                                </label>
                                <div class="col-md-12">
                                    <textarea name="meta_desc" id="meta_desc" class="form-control " rows="3">{{ old('meta_desc') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row  mb-2">
                                <label for="" class="col-md-12">Meta
                                    Keywords
                                </label>
                                <div class="col-md-12">
                                    <textarea name="meta_keywords" id="meta_keywords" class="form-control " rows="3">{{ old('meta_keywords') }}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class=" col-form-label"></label>
                        <div class="d-flex justify-content-center">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" id="uploadBtn" class="btn btn-primary px-4"
                                    name="submit2">Save</button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary px-4">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>

@endsection
