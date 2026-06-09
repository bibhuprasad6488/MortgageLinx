@extends('admin.layouts.app')
@section('title', 'Contact Us')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 d-none">
        <div>
            <h3 class="fw-bold mb-3">Contact Us</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form action="{{ route('admin.contactus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Page Banner Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_title" id="banner_title" class="form-control "
                                    value="{{ optional($contactPage)->banner_title ?? old('banner_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner Sub
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_sub_title" id="banner_sub_title" class="form-control "
                                    value="{{ optional($contactPage)->banner_sub_title ?? old('banner_sub_title') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Desc <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="banner_desc" id="banner_desc" class="form-control " rows="3">{{ optional($contactPage)->banner_desc ?? old('banner_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Btn Text <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_btn_text" id="banner_btn_text" class="form-control "
                                    value="{{ optional($contactPage)->banner_btn_text ?? old('banner_btn_text') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Banner Image (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="banner_image"
                                    data-preview="bannerImagePreview"
                                    data-default="{{ $contactPage->banner_image ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="banner_image" name="banner_image" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="bannerImagePreview" width="150">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Why Clients Choose Us</h4>
                        <h6 class="card-title fs-5 text-center">Feature One</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_title_one" id="wccml_title_one" class="form-control"
                                    value="{{ optional($contactPage)->wccml_title_one ?? old('wccml_title_one') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_subtitle_one" id="wccml_subtitle_one" class="form-control"
                                    value="{{ optional($contactPage)->wccml_subtitle_one ?? old('wccml_subtitle_one') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Icon (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="wccml_icon_one"
                                    data-preview="wOneImagePreview"
                                    data-default="{{ $contactPage->wccml_icon_one ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="wccml_icon_one" name="wccml_icon_one" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="wOneImagePreview" width="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title fs-5 text-center">Feature Two</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_title_two" id="wccml_title_two" class="form-control"
                                    value="{{ optional($contactPage)->wccml_title_two ?? old('wccml_title_two') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_subtitle_two" id="wccml_subtitle_two" class="form-control"
                                    value="{{ optional($contactPage)->wccml_subtitle_two ?? old('wccml_subtitle_two') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Icon (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="wccml_icon_two"
                                    data-preview="wTwoImagePreview"
                                    data-default="{{ $contactPage->wccml_icon_two ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="wccml_icon_two" name="wccml_icon_two" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="wTwoImagePreview" width="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title fs-5 text-center">Feature Three</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_title_three" id="wccml_title_three" class="form-control"
                                    value="{{ optional($contactPage)->wccml_title_three ?? old('wccml_title_three') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_subtitle_three" id="wccml_subtitle_three"
                                    class="form-control"
                                    value="{{ optional($contactPage)->wccml_subtitle_three ?? old('wccml_subtitle_three') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Icon (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="wccml_icon_three"
                                    data-preview="wThreeImagePreview"
                                    data-default="{{ $contactPage->wccml_icon_three ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="wccml_icon_three" name="wccml_icon_three" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="wThreeImagePreview" width="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title fs-5 text-center">Feature Four</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_title_four" id="wccml_title_four" class="form-control"
                                    value="{{ optional($contactPage)->wccml_title_four ?? old('wccml_title_four') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_subtitle_four" id="wccml_subtitle_four" class="form-control"
                                    value="{{ optional($contactPage)->wccml_subtitle_four ?? old('wccml_subtitle_four') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Icon (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="wccml_icon_four"
                                    data-preview="wFourImagePreview"
                                    data-default="{{ $contactPage->wccml_icon_four ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="wccml_icon_four" name="wccml_icon_four" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="wFourImagePreview" width="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title fs-5 text-center">Feature Five</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_title_five" id="wccml_title_five" class="form-control"
                                    value="{{ optional($contactPage)->wccml_title_five ?? old('wccml_title_five') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="wccml_subtitle_five" id="wccml_subtitle_five" class="form-control"
                                    value="{{ optional($contactPage)->wccml_subtitle_five ?? old('wccml_subtitle_five') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Icon (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="wccml_icon_five"
                                    data-preview="wfiveImagePreview"
                                    data-default="{{ $contactPage->wccml_icon_five ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="wccml_icon_five" name="wccml_icon_five" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="wfiveImagePreview" width="50">
                            </div>
                        </div>
                    </div>
                </div>

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
                                    value="{{ optional($contactPage)->meta_title ?? old('meta_title') }}">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Description
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_desc" id="meta_desc" class="form-control " rows="3">{{ optional($contactPage)->meta_desc ?? old('meta_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Keywords
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control " rows="3">{{ optional($contactPage)->meta_keywords ?? old('meta_keywords') }}</textarea>
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
