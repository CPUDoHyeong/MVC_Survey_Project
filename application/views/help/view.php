<link rel="stylesheet" href="<?= URL; ?>public/css/help/notice_board.css?ddddd">
<div class="content">
    <div class="contentbox view">
        <div class="contentbox-header">
            <span class="num-title"><?= $row['num'].". ".$row['title'] ?></span>
            <span class="regtime"><?= $row['regtime'] ?></span>
        </div>
        <div class="contentbox-content">
            <p><?= $row['content'] ?></p>
        </div>
    </div>

    <div class="notice-btns">
        <a class="list-btn" href="<?= bdUrl('/help/notices', -1, $page); ?>">목록으로</a>
        <?php if($name == 'master') : // 유저가 master라면 글 수정 버튼과 삭제 버튼 생성 ?>
            <a class="modify-btn" href="<?= bdUrl('/help/update_form', $num, $page) ?>">글 수정</a>
            <a class="delete-btn" onclick="confirm_click();">글 삭제</a>
        <?php endif ?>
    </div>
</div>
<script>
    function confirm_click() {
        var check = confirm("정말 삭제 하겠습니까?");
        if(check) {
            location.href="<?= bdUrl('/help/delete', $num, $page) ?>";
        } else {
            
        }
    }
</script>