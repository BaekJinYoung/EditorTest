<!DOCTYPE html>
<html>
@include('editor.components.head')
<body>
<div id="wrap">
    <div class="admin-container">
        <header id="header">
            @include('editor.components.snb')
        </header>
        <div class="admin-wrap">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="title-wrap col-group">
                <h2 class="main-title">
                    에디터 작성
                </h2>
            </div>

            <form action="{{ route('editor.ckEditorStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-wrap row-group">
                    <div class="form-item row-group">
                        <p class="item-default">
                            제목
                            <span class="red">*</span>
                        </p>
                        <textarea rows="2" name="title" id="title" placeholder="제목을 입력하세요."
                                  required>{{ old('title') }}</textarea>
                    </div>
                    <div class="form-item row-group">
                        <p class="item-default">
                            내용
                            <span class="red">*</span>
                        </p>
                        <textarea name="content" id="content"></textarea>
                    </div>
                </div>

                <div class="form-btn-wrap col-group">
                    <a href="{{ route("editor.ckEditorIndex") }}" class="form-prev-btn">
                        목록으로
                    </a>
                    <button class="form-prev-btn" type="submit">
                        등록
                    </button>
                    <button class="form-submit-btn" name="continue" type="submit" value="1">
                        등록 후 계속
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('/main.js') }}"></script>

</body>
</html>
