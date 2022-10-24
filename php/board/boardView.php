<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <section id="board" class="container">
            <h2>게시판 보기 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>게시판</h3>
                    <p>웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.</p>
                </div>
                <div class="board__view">
                    <table>
                        <colgroup>
                            <col style="width: 20%">
                            <col style="width: 80%">
                        </colgroup>
                        <tbody>
<?php
    $myBoardID = $_GET['myBoardID'];

    // echo $myBoardID;
    
    // 보드뷰 + 1(UPDATE) : 조회수 설정, 이게 위로 올라와야 게시글 들어갔을때 조회수 바로 반영                        
    $sql = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$myBoardID}";
    $connect -> query($sql);

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b. boardView, b.boardContents FROM myBoard b JOIN myMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";

        echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $info['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='height'>".$info['boardContents']."</td></tr>";
    }
?>
                            <!-- <tr>
                                <th>제목</th>
                                <td>아이유 - 에필로그</td>
                            </tr>
                            <tr>
                                <th>등록자</th>
                                <td>권규비</td>
                            </tr>
                            <tr>
                                <th>등록일</th>
                                <td>2022-09-22</td>
                            </tr>
                            <tr>
                                <th>조회수</th>
                                <td>983</td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td class="height">
                                    나를 알게 되어서 기뻤는지
                                    나를 사랑해서 좋았었는지<br>
                                    우릴 위해 불렀던 지나간 노래들이
                                    여전히 위로가 되는지<br>
                                    당신이 이 모든 질문들에
                                    '그렇다' 고 대답해준다면<br>
                                    그것만으로 끄덕이게 되는 나의 삶이란
                                    오, 충분히 의미 있지요<br>
                                    내 맘에 아무 의문이 없어 난
                                    이렇게 흘러가요<br>
                                    어디에도 없지만 어느 곳에나 있겠죠
                                    가능하리라 믿어요<br><br>
                                    짧지 않은 나와의 기억들이
                                    조금은 당신을 웃게 하는지<br>
                                    삶의 어느 지점에 우리가 함께였음이
                                    여전히 자랑이 되는지<br>
                                    멋쩍은 이 모든 질문들에
                                    '그렇다' 고 대답해준다면<br>
                                    그것만으로 글썽이게 되는 나의 삶이란
                                    오, 모르겠죠 어찌나 바라던 결말인지요<br>
                                    내 맘에 아무 의문이 없어 난
                                    이 다음으로 가요<br>
                                    툭툭 살다보면은 또 만나게 될 거예요
                                    그러리라고 믿어요<br>
                                    이 밤에 아무 미련이 없어 난
                                    깊은 잠에 들어요<br>
                                    어떤 꿈을 꿨는지 들려줄 날 오겠지요
                                    들어줄 거지요?
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="board__btn">
                    <a href="boardModify.php?myBoardID=<?=$myBoardID?>">수정하기</a>
                    <a href="boardRemove.php?myBoardID=<?=$myBoardID?>" onclick="alert('정말 삭제하시겠습니까?')">삭제하기</a>
                    <a href="board.php">목록보기</a>
                </div>
            </div>
        </section>
        <!-- // board -->

    </main>
    <!-- // main -->

    <?php include "../include/footer.php" ?>
    <!-- // footer -->


</body>
</html>