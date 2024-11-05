<!DOCTYPE html>
<html>
<head>
    <title>CKEditor 적용</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/ckeditor5/ckeditor5.css') }}">
</head>
<body>
<form action="{{ route('editor.ckEditorStore') }}" method="POST">
    @csrf
    <textarea name="content" id="editor"></textarea>
    <button type="submit">Submit</button>
</form>

<script type="importmap">
    {
        "imports": {
            "ckeditor5": "{{ asset('/ckeditor5/ckeditor5.js') }}",
            "ckeditor5/": "{{ asset('/ckeditor5') }}/"
        }
    }
</script>
<script type="module" src="{{ asset('/main.js') }}"></script>

</body>
</html>
