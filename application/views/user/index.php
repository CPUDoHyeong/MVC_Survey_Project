<?php
    // 로그인 하지 않은 사용자이면 회원 정보 수정 불가.
    if(!$id) {
        errorBack("로그인 후 이용 가능 합니다.");
    }
?>

<link rel="stylesheet" href="<?= URL; ?>public/css/user/user.css">
        <div class="content">
            <div class="contentbox">
                <div class="contentbox-header">
                    <p>기본정보</p>
                </div>

                <div class="contentbox-content">
                    <form accept-charset="UTF-8" action="/user/userUpdate/" class="edit-user" method="POST">  
                        <div>
                        </div>
                        <ul>
                            <li>
                                <label class="field-name">이름</label>
                                <input class="user-input" id="user-name" name="name" size="30" type="text" value="<?= $name ?>">
                            </li>
                            <li>
                                <label class="field-name">아이디</label>
                                <input class="user-input" id="user-id" name="id" size="30" type="text" value="<?= $id ?>" readonly>
                            </li>
                            <li>
                                <div class="btn-group">   
                                    <button class="update-btn" id="updateBasic">변경하기</button>
                                    <!--<button class="cancel-btn" id="cancelBasic">취소</button>-->
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
</div>