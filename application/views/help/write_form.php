<link rel="stylesheet" href="<?= URL; ?>public/css/help/notice_board.css?ddddddddfddddddddd">

<div class="content">
    <form accept-charset="UTF-8" action="/help/write/" class="edit-user" id="write-form" method="POST">
        <div class="contentbox">
            <div class="contentbox-header">
                <span class="write">공지사항 등록</span>
            </div>

            <div class="contentbox-content">  
                <div>
                    <input hidden name="id" value="<?= $id ?>">
                </div>
                <ul>
                    <li>
                        <label class="field-name">제목</label>
                    </li>
                    <li>
                        <input class="user-input" id="title" name="title" size="30" type="text">
                    </li>
                    <li>
                        <label class="field-name">내용</label>
                    </li>
                    <li>
                        <textarea class="content-input" id="content" name="content"></textarea>
                    </li>
                </ul>
            </div>
        </div>
        <div class="btn-group">
            <button type="submit" class="write-ok-btn">글 등록</button>
            <a class="cancel-btn" href="javascript:history.back()">취소</a>
        </div>
    </form>
</div>
<script>
    //textarea resize 처리 .. 스크롤 바 없애고 할 수 있도록.
    var textarea;
    textarea = document.getElementById("content");
    textarea.addEventListener('keydown', resize);
    textarea.addEventListener('keyup', resize);

    function resize() {
        textarea.style.height = "72px";
        textarea.style.height = (23+textarea.scrollHeight) + "px";
    }
</script>