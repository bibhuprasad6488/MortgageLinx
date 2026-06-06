@extends('admin.layouts.app')
@section('title', 'Our Process')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 d-none">
        <div>
            <h3 class="fw-bold mb-3">Our Process</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form action="{{ route('admin.ourprocess.store') }}" method="POST" enctype="multipart/form-data">
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
                                    value="{{ optional($process)->banner_title ?? old('banner_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner Sub
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_sub_title" id="banner_sub_title" class="form-control "
                                    value="{{ optional($process)->banner_sub_title ?? old('banner_sub_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Desc <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="banner_desc" id="banner_desc" class="form-control " rows="3">{{ optional($process)->banner_desc ?? old('banner_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Btn Text <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_btn_text" id="banner_btn_text" class="form-control "
                                    value="{{ optional($process)->banner_btn_text ?? old('banner_btn_text') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Banner Image (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="banner_image"
                                    data-preview="bannerImagePreview"
                                    data-default="{{ $process->banner_image ?? asset('admin/img/no-img.png') }}">
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
                        <h4 class="card-title text-center">Process One</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_title_one" id="mj_title_one" class="form-control"
                                    value="{{ optional($process)->mj_title_one ?? old('mj_title_one') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_subtitle_one" id="mj_subtitle_one" class="form-control"
                                    value="{{ optional($process)->mj_subtitle_one ?? old('mj_subtitle_one') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Process Two</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_title_two" id="mj_title_two" class="form-control"
                                    value="{{ optional($process)->mj_title_two ?? old('mj_title_two') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_subtitle_two" id="mj_subtitle_two" class="form-control"
                                    value="{{ optional($process)->mj_subtitle_two ?? old('mj_subtitle_two') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Process Three</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_title_three" id="mj_title_three" class="form-control"
                                    value="{{ optional($process)->mj_title_three ?? old('mj_title_three') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_subtitle_three" id="mj_subtitle_three" class="form-control"
                                    value="{{ optional($process)->mj_subtitle_three ?? old('mj_subtitle_three') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Process Four</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_title_four" id="mj_title_four" class="form-control"
                                    value="{{ optional($process)->mj_title_four ?? old('mj_title_four') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_subtitle_four" id="mj_subtitle_four" class="form-control"
                                    value="{{ optional($process)->mj_subtitle_four ?? old('mj_subtitle_four') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Process Five</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_title_five" id="mj_title_five" class="form-control"
                                    value="{{ optional($process)->mj_title_five ?? old('mj_title_five') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_subtitle_five" id="mj_subtitle_five" class="form-control"
                                    value="{{ optional($process)->mj_subtitle_five ?? old('mj_subtitle_five') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Process Six</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_title_six" id="mj_title_six" class="form-control"
                                    value="{{ optional($process)->mj_title_six ?? old('mj_title_six') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Sub Title
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="mj_subtitle_six" id="mj_subtitle_six" class="form-control"
                                    value="{{ optional($process)->mj_subtitle_six ?? old('mj_subtitle_six') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Why Clients Choose Us</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="Img" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">
                                Left Image (Drag & Drop)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="drop-area" id="dropArea" data-input="wccu_image"
                                    data-preview="leftImagePreview"
                                    data-default="{{ $process->wccu_image ?? asset('admin/img/no-img.png') }}">
                                    <p>Drag & Drop Image Here or Click to Select</p>
                                    <input type="file" id="wccu_image" name="wccu_image" hidden
                                        accept=".jpg,.jpeg,.png,.webp">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img src="" id="leftImagePreview" width="150">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Right
                                Content <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="wccu_content" id="wccu_content" class="form-control " placeholder="Ex: Point 1, Point 2, Point 3.."
                                    rows="3" required>{{ optional($process)->wccu_content ?? old('wccu_content') }}</textarea>
                                <small>Enter the content separated by slash (/). Ex: Point 1/ Point 2/ Point 3 etc..</small>
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
                                    value="{{ optional($process)->meta_title ?? old('meta_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Description
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_desc" id="meta_desc" class="form-control " rows="3">{{ optional($process)->meta_desc ?? old('meta_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Meta
                                Keywords
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control " rows="3">{{ optional($process)->meta_keywords ?? old('meta_keywords') }}</textarea>
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
