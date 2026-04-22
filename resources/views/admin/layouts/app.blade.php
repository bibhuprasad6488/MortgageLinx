<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/img/favicon.png') }}" type="image/x-icon" />

    <!-- Fonts -->
    <script src="{{ asset('admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('admin/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/fonts.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <link href="{{ asset('admin/assets/summernote/summernote.min.css') }}" rel="stylesheet">
    {{-- If using Laravel Vite (optional, remove if not needed) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .fade-notify {
            opacity: 1;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-notify.hide {
            opacity: 0;
            transform: translateY(-10px);
        }
    </style>
</head>

<body>
    <div class="wrapper">

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        <div class="main-panel">

            {{-- Navbar --}}
            @include('admin.layouts.nav')

            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <!-- Core JS -->
    <script src="{{ asset('admin/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugin/chart.js/chart.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/plugin/datatables/datatables.min.js') }}"></script> --}}
    <script src="{{ asset('admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('admin/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('admin/js/kaiadmin.min.js') }}"></script>

    <script src="{{ asset('admin/assets/summernote/summernote.min.js') }}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{ asset('admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <!-- Feather Icons (for navbar icons) -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const datatablesSimple = document.getElementById('dataTable');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#summernote').summernote({
                placeholder: 'Content',
                tabsize: 2,
                height: 500,
                border: "1px solid #000"
            });
            // // Loop through all elements with the class 'tinymce-editor'
            // document.querySelectorAll(".tinymce-editor").forEach(function(editor) {

            //     // Initialize TinyMCE for each editor
            //     tinymce.init({
            //         target: editor, // Use 'target' to bind TinyMCE to the specific element
            //         height: 500,
            //         plugins: 'advlist autolink link image lists charmap preview code fullscreen',
            //         toolbar: 'undo redo | blocks | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright | bullist numlist blockquote | link image | code fullscreen ',

            //         // NEW: use "blocks" instead of "formatselect" in TinyMCE 6+
            //         block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre; Blockquote=blockquote',

            //         setup: function(editorInstance) {
            //             // Sync content
            //             editorInstance.on('change', function() {
            //                 editor.value = editorInstance.getContent();
            //             });
            //         }
            //     });
            // });
        });
    </script>
    @if (session('success') || session('error'))
        <script>
            $(function() {

                let message = "{{ session('success') ?? session('error') }}";
                let type = "{{ session('success') ? 'success' : 'danger' }}";

                $.notify({
                    title: message,
                    message: '',
                    icon: "{{ session('success') ? 'fa fa-bell' : 'fa fa-exclamation' }}"
                }, {
                    type: type,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 3000, // ⏱ auto close after 3 sec
                    timer: 1000, // ⏱ animation timing
                    z_index: 9999,
                    mouse_over: 'pause',
                    animate: {
                        enter: 'fade-notify',
                        exit: 'fade-notify hide'
                    }
                });

            });
        </script>
    @endif
    <script>
        $("#displayNotif").on("click", function() {
            var placementFrom = $("#notify_placement_from option:selected").val();
            var placementAlign = $("#notify_placement_align option:selected").val();
            var state = $("#notify_state option:selected").val();
            var style = $("#notify_style option:selected").val();
            var content = {};

            content.message =
                'sdf';
            content.title = "Bootstrap notify";
            if (style == "withicon") {
                content.icon = "fa fa-bell";
            } else {
                content.icon = "none";
            }
            content.url = "index.html";
            content.target = "_blank";

            $.notify(content, {
                type: state,
                placement: {
                    from: placementFrom,
                    align: placementAlign,
                },
                time: 1000,
                delay: 0,
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
