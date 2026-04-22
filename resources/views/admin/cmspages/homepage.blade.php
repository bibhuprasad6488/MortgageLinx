@extends('admin.layouts.app')
@section('title', 'Home Page')
@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 d-none">
        <div>
            <h3 class="fw-bold mb-3">Home Page</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
            <a href="{{ route('admin.homepage.create') }}" class="btn btn-primary btn-round">Add Customer</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.homepage.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Page Banner Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_title" id="banner_title"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->banner_title ?? old('banner_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Desc <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="banner_desc" id="banner_desc" class="form-control border-secondary" rows="3">{{ optional($homePage)->banner_desc ?? old('banner_desc') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Btn Text <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="banner_btn_text" id="banner_btn_text"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->banner_btn_text ?? old('banner_btn_text') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Logo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="banner_logo_image" id="banner_logo_image"
                                    class="form-control border-secondary" accept=".jpg,.jpeg,.png,.webp"
                                    onchange="previewBannerLogoImage(event)"
                                    >

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img @if ($homePage && $homePage->banner_logo_image) src="{{ $homePage->banner_logo_image }}"
                                    @else
                                    src="{{ asset('admin/img/no-img.png') }}" @endif
                                    alt="Site Logo" width="150" id="bannerLogoPreview">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Banner
                                Image</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="banner_image" id="banner_image"
                                    class="form-control border-secondary" onchange="bannerImage(event)"
                                    >
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img @if ($homePage && $homePage->banner_image) src="{{ $homePage->banner_image }}"
                                @else src="{{ asset('admin/img/no-img.png') }}" @endif
                                    alt="Site Logo" class="bg-gray" width="150" id="bannerImagePreview">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Welcome Section Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Welcome
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="welcome_title" id="welcome_title"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->welcome_title ?? old('welcome_title') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Welcome
                                Desc <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <textarea name="welcome_sub_title" id="welcome_sub_title" class="form-control border-secondary" rows="3">{{ optional($homePage)->welcome_sub_title ?? old('welcome_sub_title') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Feature One</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Icon</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="f_icon_one" id="f_icon_one"
                                    class="form-control border-secondary" accept=".jpg,.jpeg,.png,.webp"
                                    onchange="featureOneImage(event)" >

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img @if ($homePage && $homePage->f_icon_one) src="{{ $homePage->f_icon_one }}"
                                    @else
                                    src="{{ asset('admin/img/no-img.png') }}" @endif
                                    alt="Site Logo" width="50" id="fOnePreview">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_title_one" id="f_title_one"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_title_one ?? old('f_title_one') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Sub Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_subtitle_one" id="f_subtitle_one"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_subtitle_one ?? old('f_subtitle_one') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Feature Two</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Icon</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="f_icon_two" id="f_icon_two"
                                    class="form-control border-secondary" accept=".jpg,.jpeg,.png,.webp"
                                    onchange="featureTwoImage(event)" >

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img @if ($homePage && $homePage->f_icon_two) src="{{ $homePage->f_icon_two }}"
                                    @else
                                    src="{{ asset('admin/img/no-img.png') }}" @endif
                                    alt="Site Logo" width="50" id="fTwoPreview">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_title_two" id="f_title_two"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_title_two ?? old('f_title_two') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Sub Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_subtitle_two" id="f_subtitle_two"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_subtitle_two ?? old('f_subtitle_two') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Feature Three</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Icon</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="f_icon_three" id="f_icon_three"
                                    class="form-control border-secondary" accept=".jpg,.jpeg,.png,.webp"
                                    onchange="featureThreeImage(event)" >

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img @if ($homePage && $homePage->f_icon_three) src="{{ $homePage->f_icon_three }}"
                                    @else
                                    src="{{ asset('admin/img/no-img.png') }}" @endif
                                    alt="Site Logo" width="50" id="fThreePreview">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_title_three" id="f_title_three"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_title_three ?? old('f_title_three') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Sub Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_subtitle_three" id="f_subtitle_three"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_subtitle_three ?? old('f_subtitle_three') }}"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Feature Four</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Icon</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="f_icon_four" id="f_icon_four"
                                    class="form-control border-secondary" accept=".jpg,.jpeg,.png,.webp"
                                    onchange="featureFourImage(event)" >

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <img @if ($homePage && $homePage->f_icon_four) src="{{ $homePage->f_icon_four }}"
                                    @else
                                    src="{{ asset('admin/img/no-img.png') }}" @endif
                                    alt="Site Logo" width="50" id="fFourPreview">
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_title_four" id="f_title_four"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_title_four ?? old('f_title_four') }}" required>
                            </div>
                        </div>
                        <div class="form-group row  mb-2">
                            <label for="" class="col-md-3 d-flex justify-content-end col-sm-3 col-xs-12">Feature
                                Sub Title <span>*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="f_subtitle_four" id="f_subtitle_four"
                                    class="form-control border-secondary"
                                    value="{{ optional($homePage)->f_subtitle_four ?? old('f_subtitle_four') }}" required>
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
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009/02/27</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010/07/14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008/11/13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function previewBannerLogoImage(event) {
            const input = event.target;
            const preview = document.getElementById('bannerLogoPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function bannerImage(event) {
            const input = event.target;
            const preview = document.getElementById('bannerImagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function featureOneImage(event) {
            const input = event.target;
            const preview = document.getElementById('fOnePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function featureTwoImage(event) {
            const input = event.target;
            const preview = document.getElementById('fTwoPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function featureThreeImage(event) {
            const input = event.target;
            const preview = document.getElementById('fThreePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function featureFourImage(event) {
            const input = event.target;
            const preview = document.getElementById('fFourPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
