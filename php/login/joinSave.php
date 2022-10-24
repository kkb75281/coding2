<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    <?php include "../include/link.php" ?>
</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- // skip -->

    <?php include "../include/header.php" ?>
    <!-- // header -->

    <main id="main">
        <section id="banner">
            <h2>회원가입 페이지입니다.</h2>
            <div class="banner__inner2 container">
                <div class="img">
                    <img src="../assets/img/banner_img02.svg" alt="">
                </div>
                <div class="desc">
                    어떤 일이라도 <em>노력하고 즐기면</em> 그 결과는 <em>빛</em>을 바란다고 생각합니다.<br>
<?php
    include "../connect/connect.php";

    $youEmail = $_POST['youEmail'];
    $youName = $_POST['youName'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youNickName = $_POST['youNickName'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();

    // echo $youEmail, $youName, $youPass, $youNickName, $youPhone, $regTime;
    
    // 조건 없이 가입
    // $sql = "INSERT INTO myMember(youEmail, youName, youPass, youNickName, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youNickName', '$youPhone', '$regTime')";

    // $result = $connect -> query($sql);

    // if($result){
    //     echo "INSERT INTO TRUE";
    // } else {
    //     echo "INSERT INTO FALSE";
    // }

    // 데이터 가져오기 : 유효성 검사 : 데이터 중복검사 : 중복 아니면 회원가입 진행 / 중복이면 로그인창 이동 (트리거 변수 이용: true,false 나눠서 해주는 것)
    
    // 메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

    // 유효성 검사(이메일) : 내장함수
    // $checkEmail = filter_var($youEmail, FILTER_VALIDATE_EMAIL);

    // if(checkEmail == false) {
    //     msg("이메일이 잘못되었습니다. 다시 입력바랍니다.");
    //     exit;
    // }

    // 유효성 검사(이메일) : 정규식 표현
    // $check_email = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);
    
    // if($check_email == false) {
    //     msg("이메일이 잘못되었습니다.<br> 다시 입력 바랍니다.");
    //     exit;
    // }

    // 유효성 검사(비밀번호)
    if($youPass !== $youPassC) {
        msg("비밀번호가 일치하지 않습니다.<br> 다시 입력 바랍니다.");
        exit;
    }

    // 비밀번호 암호화
    // $youPass = sha1($youPass);

    // 유효성 검사(이름)
    $checkName = preg_match("/^[가-힣]{1,}$/", $youName);

    if($checkName == false){
        msg("이름이 정확하지 않습니다.<br> 한글로만 적어주세요!");
        exit;
    }

    // 닉네임 검사
    // $checkNicName = preg_match("/^[가-힣]{1,}$/", $youNicName)

    // 휴대폰 번호 검사
    $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

    if($check_number == false){
        msg("번호가 정확하지 않습니다.<br> 올바른 핸드폰 번호(010-0000-0000)를 적어주세요!");
        exit;
    }
    
    // 이메일 중복검사
    $isEmailCheck = false;

    $sql = "SELECT youEmail FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($result){
        // 있으면 1, 없으면 0 : num_rows
        $count = $result -> num_rows;

        if($count == 0){
            // 회원가입
            $isEmailCheck = true;
        } else {
            // 로그인 유도
            msg("이미 회원가입이 되어있습니다.<br> <a href='../main/main.php'>로그인 페이지</a>로 이동해주세요!");
            exit;
        }
    } else {
        msg("에러가 발생하였습니다.(1) 관리자에게 문의바랍니다.");
        exit;
    }

    // 핸드폰 번호 중복검사
    $isPhoneCheck = false;

    $sql = "SELECT youPhone FROM myMember WHERE youPhone = '$youPhone'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            // 회원가입
            $isPhoneCheck = true;
        } else {
            // 로그인 유도
            msg("이미 회원가입이 되어있습니다.<br> 로그인 페이지로 이동 바랍니다.");
            exit;
        }
    } else {
        msg("에러가 발생하였습니다.(2) 관리자에게 문의바랍니다.");
        exit;
    }

    // 회원가입
    if($isEmailCheck == true && $isPhoneCheck == true){
        $sql = "INSERT INTO myMember(youEmail, youName, youPass, youNickName, youPhone, regTime) VALUES('$youEmail', '$youName', '$youPass', '$youNickName', '$youPhone', '$regTime')";
        $result = $connect -> query($sql);

        if($result){
            msg("회원가입을 축하드립니다 !<br><a href='../main/main.php'>메인으로 이동하기</a>");
            exit;
        } else {
            msg("에러가 발생하였습니다.(3) 관리자에게 문의바랍니다.");
            exit;
        }
    } else {
        msg("이메일 또는 핸드폰 번호가 틀렸습니다.<br> 다시 확인 바랍니다.");
        exit;
    }

?>
                </div>
                <a href="main.html">메인으로</a>
            </div>
        </section>
        <!-- //banner -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->





</body>
</html>