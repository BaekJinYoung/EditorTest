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
        var initialContent = @json($item->content);
        var imageUploadUrl = "{{ route('editor.ckEditorUpload') }}";
    </script>
</head>
<body>
<div id="wrap">
    <div class="admin-container">
        <div class="admin-wrap">

            <div class="title-wrap col-group">
                <h2 class="main-title">
                    에디터 상세
                </h2>
            </div>
            <form action="{{ route("editor.ckEditorUpdate", $item) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-wrap row-group">
                    <div class="form-item row-group">
                        <p class="item-default">
                            제목
                            <span class="red">*</span>
                        </p>
                        <input type="text" id="title" name="title" class="form-input"
                               value="{{ old('title', $item->title) }}" placeholder="제목을 입력해주세요." required>
                    </div>
                    <div class="form-item row-group">
                        <p class="item-default">
                            내용
                            <span class="red">*</span>
                        </p>
                        <textarea name="content" id="editor"></textarea>
                    </div>
                </div>

                <div class="form-btn-wrap col-group">
                    <a href="{{ route("editor.ckEditorIndex") }}" class="form-prev-btn">
                        목록으로
                    </a>
                    <button class="form-prev-btn" type="submit">
                        수정
                    </button>
                </div>
            </form>
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

</body>
</html>
