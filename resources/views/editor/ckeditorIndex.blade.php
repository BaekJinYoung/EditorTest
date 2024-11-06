<!DOCTYPE html>
<html lang="ko">
<body>
<div id="wrap">
    <div class="admin-container">
        <header id="header">
        </header>
        <div class="admin-wrap">
            <div class="table-wrap">
                <div class="title-wrap col-group">
                    <div class="main-title-wrap col-group">
                        <h2 class="main-title">
                            에디터
                        </h2>
                    </div>
                </div>
                <table class="admin-table">
                    <colgroup>
                        <col width="10%">
                        <col width="20%">
                        <col width="60%">
                        <col width="10%">
                    </colgroup>
                    <thead class="admin-thead">
                    <tr class="admin-tr">
                        <th class="admin-th">번호</th>
                        <th class="admin-th">제목</th>
                        <th class="admin-th">내용</th>
                        <th class="admin-th">상세</th>
                    </tr>
                    </thead>
                    <tbody class="admin-tbody">
                        @foreach($items as $key => $item)
                            <tr class="admin-tr">
                                <td class="admin-td">{{ $item->id }}</td>
                                <td class="admin-td">{{ $item->title }}</td>
                                <td class="admin-td">{{ $item->content }}</td>
                                <td class="admin-td">
                                    <div class="btn-wrap col-group">
                                        <a href="{{ route("editor.ckEditorEdit", $item->id) }}" class="btn">
                                            상세
                                        </a>
                                        <form action="{{ route("editor.ckEditorDestroy", $item->id) }}" method="post"
                                              onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn del-btn">
                                                삭제
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePageCount() {
        var pageCount = document.getElementById('pageCount').value;
        window.location.href = '?perPage=' + pageCount;
    }

    function confirmDelete() {
        return confirm("정말로 삭제하시겠습니까?");
    }
</script>
</body>
</html>
