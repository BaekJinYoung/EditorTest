<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 Sample</title>
    <link rel="icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/96x96.png" sizes="96x96">
    <link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/120x120.png" sizes="120x120">
    <link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/152x152.png" sizes="152x152">
    <link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/167x167.png" sizes="167x167">
    <link rel="apple-touch-icon" type="image/png" href="https://ckeditor.com/assets/images/favicons/180x180.png" sizes="180x180">
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/ckeditor5/ckeditor5.css') }}">
    <script src="{{ asset('/ckeditor5/ckeditor5.js') }}"></script>
    <script src="{{ asset('/ckeditor5/translations/ko.js') }}"></script>
</head>
<body>
<div>
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor" id="editor-container">
            <div class="editor-container__editor"><div id="editor"></div></div>
        </div>
    </div>
</div>
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "{{ asset('/ckeditor5/ckeditor5.js') }}",
            "ckeditor5/": "{{ asset('/ckeditor5') }}/"
        }
    }
</script>
<script type="module" src="{{ asset('/main.js') }}"></script>
<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
    ClassicEditor
        .create( document.querySelector( '#classic' ), {
            language: 'ko' //언어설정
        })
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>
