<!DOCTYPE html>
<html>
@include('editor.components.head')
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

<script type="module" src="{{ asset('/main.js') }}"></script>

</body>
</html>
