<!DOCTYPE html>
<html>
<head>
    <title>CKEditor 적용</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/ckeditor5/ckeditor5.css') }}">
    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('editor');
        var initialContent = "";
        var imageUploadUrl = "{{ route('editor.ckEditorUpload') }}";
    </script>
</head>
<body>
<form action="{{ route('editor.ckEditorStore') }}" method="POST">
    @csrf
    <div class="form-item row-group">
        <p class="item-default">
            제목
            <span class="red">*</span>
        </p>
        <textarea rows="2" name="title" id="title" placeholder="제목을 입력하세요."
                  required>{{ old('title') }}</textarea>
    </div>
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
