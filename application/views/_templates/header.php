<?php
    // header 부분
    // 고정된 상위 메뉴 바.

    require 'application/libs/tools.php';
    
    // 사용자 아이디와 이름을 담은 세션 변수 읽기
    session_start_if_none();
    $id = sessionVar("uid");
    $name = sessionVar("uname"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css?ddddf">
    <link rel="shortcut icon" href="<?php echo URL; ?>public/imgs/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
</head>

<body>
    <header>
        <div class="topnav">
        <?php if($id) : // 로그인 상태일 때의 출력 ?>
            <!-- 로고 보여주는 부분 -->
            <div class="navlogo-wrapper">
                <a href="<?= URL; ?>surveyBoard/whole_survey/">
                    <img class="navlogo" src="<?= URL; ?>public/imgs/logo.png" width="100px">
                </a>
            </div>

            <!-- 로그인을 없애고 사용자 메뉴를 보여주는 드롭다운 추가 -->
            <div class="direct-menu">
                <div class="login-btn user-dropdown-wrapper">
                    <div class="user-dropdown">
                        <button class="user-dropbtn" id="user-nav"><?= $name ?></button>
                        <div class="user-dropdown-content" id="user-myDropdown">
                            <a href="/surveyBoard/whole_survey/">나의 설문</a>
                            <a href="/help/">도움말</a>
                            <a href="/user/">설정</a>
                            <a class="logout-btn" href="/member/logout/">로그아웃</a>
                        </div>
                    </div> 
                </div>
                <div class="login">
                    <div class="login-btn">
                        <a href="/surveyBoard/whole_survey/">설문리스트</a>
                    </div>
                    <div class="login-btn">
                        <a href="/help/">도움말</a>
                    </div>
                </div>

                <div class="mobile-login">
                    <div class="login-btn">
                        <a href="/surveyBoard/whole_survey/">
                            <img src="<?= URL; ?>public/imgs/survey-icon.png" width="20" height="20" alt="설문리스트"/>
                        </a>
                    </div>
                    <div class="login-btn">
                        <a href="/help/">
                            <img src="<?= URL; ?>public/imgs/info-icon.png" width="20" height="20" alt="도움말"/>
                        </a>
                    </div>
                </div>
            </div>
            

        <?php else : // 로그인 상태가 아닐 때의 출력 ?>
            <!-- 로고 보여주는 부분 -->
            <a href="<?= URL; ?>">
                <img class="navlogo" src="<?= URL; ?>public/imgs/logo.png" width="100px">
            </a>

            <div class="login">
                <a href="/member/">로그인 • 가입</a>
                <a href="/surveyBoard/whole_survey">설문리스트</a>
                <a href="/help/">도움말</a>
            </div>

            <div class="mobile-login">
                <a href="/member/">
                    <img src="<?= URL; ?>public/imgs/login-icon.png" width="20" height="20" alt="로그인"/>
                </a>
                <a href="/surveyBoard/whole_survey/">
                    <img src="<?= URL; ?>public/imgs/survey-icon.png" width="20" height="20" alt="설문리스트"/>
                </a>
                <a href="/help/">
                    <img src="<?= URL; ?>public/imgs/info-icon.png" width="20" height="20" alt="도움말"/>
                </a>
            </div>

        <?php endif ?>
        </div>
    </header>
    

