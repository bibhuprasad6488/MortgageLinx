@extends('admin.layouts.app')
@section('title', 'Edit Service')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data"
                id="catUploadForm">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-12 fw-bold">
                                Category <span>*</span>
                            </label>
                            <div class="col-md-12">
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($serviceCats as $sc)
                                        <option value="{{ $sc->id }}"
                                            {{ $service->category_id == $sc->id ? 'selected' : '' }}>
                                            {{ $sc->title }}</option>
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
                                        value="{{ $service->thumb_title }}" required>
                                </div>
                            </div>
                            <div class="form-group row  mb-2">
                                <label for="" class="col-md-12 fond-bold">
                                    Short Description
                                </label>
                                <div class="col-md-12">
                                    <textarea name="thumb_short_desc" id="thumb_short_desc" class="form-control " rows="3" required>{{ $service->thumb_short_desc }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row  mb-2">
                                <label for="Img" class="col-md-12">
                                    Icon</label>
                                <div class="col-md-2">

                                    <div class="drop-area" data-input="thumb_image" data-preview="thumbImgPreview"
                                        data-default="{{ $service->thumb_image ?? asset('admin/img/no-img.png') }}">
                                        <p>Drag & Drop/Click</p>
                                        <input type="file" id="thumb_image" name="thumb_image" hidden
                                            accept=".jpg,.jpeg,.png,.webp">

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="" id="thumbImgPreview" width="100">
                                </div>
                            </div>
                        </div>


                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-12 fw-bold">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-12">
                                <input type="text" name="title" id="title" class="form-control "
                                    value="{{ $service->title }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-12 fw-bold">
                                Description
                            </label>
                            <div class="col-md-12">
                                <textarea name="short_desc" id="short_desc" class="form-control " rows="3">{{ $service->short_desc }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-12 fw-bold">
                                Image (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" data-input="service_image" data-preview="serviceImgPreview"
                                    data-default="{{ $service->service_image ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="service_image" name="service_image" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="" id="serviceImgPreview" width="150">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-12 fw-bold">
                                Page Content
                            </label>
                            <div class="col-md-12">
                                <textarea name="content" id="summernote" class="form-control " rows="3">{{ $service->content }}</textarea>
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
                                            value="{{ optional($service)->meta_title ?? old('meta_title') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row  mb-2">
                                    <label for="" class="col-md-12">Meta
                                        Description
                                    </label>
                                    <div class="col-md-12">
                                        <textarea name="meta_desc" id="meta_desc" class="form-control " rows="3">{{ optional($service)->meta_desc ?? old('meta_desc') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row  mb-2">
                                    <label for="" class="col-md-12">Meta
                                        Keywords
                                    </label>
                                    <div class="col-md-12">
                                        <textarea name="meta_keywords" id="meta_keywords" class="form-control " rows="3">{{ optional($service)->meta_keywords ?? old('meta_keywords') }}</textarea>

                                    </div>
                                </div>

                                <div class="form-group row  mb-2">
                                    <label for="" class="col-md-12">
                                        Status
                                    </label>
                                    <div class="col-md-12">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Publish
                                            </option>
                                            <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Unpublish
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class=" col-form-label"></label>
                            <div class="d-flex justify-content-center">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" id="uploadBtn" class="btn btn-primary px-4"
                                        name="submit2">Update</button>
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const categoryField = document.getElementById('category_id');
            const pCatData = document.getElementById('pCatData');

            function getPCatFields() {

                if (!categoryField || !pCatData) return;

                const categoryId = parseInt(categoryField.value);

                if (categoryId === 7) {
                    pCatData.style.display = 'block';
                } else {
                    pCatData.style.display = 'none';
                }
            }

            // Initial load
            getPCatFields();

            // On change
            categoryField.addEventListener('change', getPCatFields);

        });
    </script>
@endpush
