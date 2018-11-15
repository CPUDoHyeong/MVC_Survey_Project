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
                    <p>비밀번호 변경</p>
                </div>

                <div class="contentbox-content">
                    <form accept-charset="UTF-8" action="/user/pwUpdate/" class="edit-user" method="POST">  
                        <div>
                            <!-- 세션의 id를 hidden 으로 해서 저장해놓는다. -->
                            <input name="id" hidden value="<?= $id ?>">
                        </div>
                        <ul>
                            <li>
                                <label class="field-name">현재 비밀번호</label>
                                <input class="user-input" id="current-pw" name="current-pw" size="30" type="password" value="">
                                <label id="error-input"></label>
                            </li>
                            <li>
                                <label class="field-name">새 비밀번호</label>
                                <input class="user-input" id="new-pw" name="new-pw" size="30" type="password" value="">
                            </li>
                            <li>
                                <label class="field-name">비밀번호 확인</label>
                                <input class="user-input" id="new-pw-check" name="new-pw-check" size="30" type="password" value="">
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