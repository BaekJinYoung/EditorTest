<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, viewport-fit=cover, maximum-scale=1.0, user-scalable=0"/>
    <title>관리자페이지</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/ckeditor5/ckeditor5.css') }}">
    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    @if (Route::is('editor.ckEditorCreate'))
        var initialContent = "";
    @elseif (Route::is('editor.ckEditorEdit'))
        var initialContent = @json($item->content);
    @endif
        var imageUploadUrl = "{{ route('editor.ckEditorUpload') }}";
    </script>
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "{{ asset('/ckeditor5/ckeditor5.js') }}",
                "ckeditor5/": "{{ asset('/ckeditor5') }}/"
        }
    }
    </script>
</head>
