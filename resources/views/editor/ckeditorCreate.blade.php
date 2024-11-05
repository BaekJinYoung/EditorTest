<!doctype html>
<html lang="en">
@include('editor.components.head')
<body>
<div id="wrap">
    <div class="admin-container">
        <header id="header">
        </header>
    </div>
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor editor-container_include-style" id="editor-container">
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
    window.onload = function() {
        if ( window.location.protocol === "file:" ) {
            alert( "This sample requires an HTTP server. Please serve this file with a web server." );
        }
    };
</script>
</body>
</html>
