<?php
include_once('../db/db_connector.php');
if (isset($_SESSION['session_id'])) {

    $id = sql_escape($con, $_SESSION['session_id']);

    if (empty($id)) {
        mysqli_close($con);
        header("location: login.php?error=user_id_empty");
        exit;
    } else {
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {

            // 게시글 테이블(inquiry)의 'no'값을 가져옴
            $list_number = $_GET['no'];

            $full_name = $row['full_name'];
            $mobile = $row['mobile1'].'-'.$row['mobile2'].'-'.$row['mobile3'];
            $email = $row['email1'].'@'.$row['email2'];

            // 게시글 불러오기
            $sql = "SELECT * FROM inquiry WHERE no = $list_number";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);

            if($row['id'] === $id){
                $title = $row['title'];
                $content = $row['content'];
    
                // 댓글 불러오기 게시글 번호를 컬럼으로 준 뒤 그 컬럼을 가지고 있는 값들을 부름
                $sql = "SELECT * FROM comment WHERE inquiry_number = $list_number";
                $result = mysqli_query($con, $sql);
    
                $result = mysqli_query($con, $sql);
                mysqli_close($con); // 데이터베이스 접속 종료
                $comment = array();
                for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                    $comment[$i] = $row;
                }         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mypage_inquiry_read.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/aside.css">
</head>

<body>
    <div class="container">
        <?php
        include('./header.php');
        ?>
        <aside>
            <div>
                <ul>
                    <li class="title">마이 페이지</li>
                    <hr>
                    <li><a href="./mypage_user.php">내 정보</a></li>
                    <li><a href="./mypage_reservation.php">내 예약</a></li>
                    <li><a href="./mypage_inquiry_board.php?option=title&page=1"><b>내 문의</b></a></li>
                    <li><a href="./mypage_resignation.php">회원탈퇴</a></li>
                </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>내 문의</h2>
            </article>
            <hr>
            <article class="form">
                <form action="./mypage_inquiry_update.php?no=<?=$list_number?>" method="post">
                    <table>
                        <tr>
                            <!-- 첫번째 줄 시작 -->
                            <td class="title">성명</td>
                            <td><?=$full_name?></td>
                        </tr><!-- 첫번째 줄 끝 -->
                        <tr>
                            <!-- 첫번째 줄 시작 -->
                            <td class="title">아이디</td>
                            <td><?=$id?></td>
                        </tr><!-- 첫번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">제목</td>
                            <td><input name="title" type="text" id="title" value="<?=$title?>" readonly></input></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">내용</td>
                            <td><textarea name="content" id="content" cols="30" rows="10" readonly><?=$content?></textarea></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">휴대전화</td>
                            <td><?=$mobile?></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">이메일</td>
                            <td><?=$email?></td>
                        </tr><!-- 두번째 줄 끝 -->
                    </table>
                </article>
                <article class="button">
                    <div>
                        <input type="button" value="수 정" id="btn_modify" name="mode">
                        <input type="button" value="삭 제" id="btn_delete" name="mode">
                    </div>
                </form>
            </article>
            <!-- 댓글 불러오기 -->
            <?php
                for ($i = 0; $i < count($comment); $i++) {
                    ?>
            <article class="textarea">
                <h3><?=$comment[$i]['id']?></h3>
                <!-- 이미 작성된 댓글 no값으로 댓글 테이블의 PK값을 준다 -->
                <form action="./mypage_comment_update.php?no=<?=$comment[$i]['no']?>" method="post">
                    <textarea name="content" class="comment_content" cols="30" rows="10" readonly><?=$comment[$i]['content']?></textarea>
                </article>
                <article class="reply">
                    <?php
                        if($comment[$i]['id'] === $id || "admin" === $id){
                    ?>
                    <div>
                        <input type="button" class="comment_update" name="mode" value="수 정">
                        <input type="button" class="comment_delete" name="mode" value="삭 제">
                    </div> 
                    <?php
                        }
                        ?>
                </form>
                </article>
                <?php } 
                ?>
            <article class="textarea">
                <h3>답 변</h3>
                <!-- 작성될 댓글 어느 게시글에 작성될지 모르기 때문에 게시글 PK를 값으로 준다 -->
                <form action="./mypage_comment_update.php?no=<?=$list_number?>" method="post">
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                </article>
                <article class="reply">
                    <div>
                        <input type="submit" id="comment_insert" name="mode" value="등 록">
                    </div> 
                </form>
                </article>
        </main>
        <?php
        include('./footer.php');
        ?>
    </div>
    <script>
        let btn_modify = document.querySelector('#btn_modify')
        let btn_delete = document.querySelector('#btn_delete')
        let title = document.querySelector('#title')
        let content = document.querySelector('#content')

        let comment_insert = document.querySelector('#comment_insert')
        let comment_update = document.querySelectorAll('.comment_update')
        let comment_delete = document.querySelectorAll('.comment_delete')
        let comment_content = document.querySelectorAll('.comment_content')

        function delete_button_change(button){
            if(button.value === "삭 제"){
                if(confirm('정말 삭제하시겠습니까?')){
                   button.type = "submit";
                }
            }else if(button.value === "취 소"){
                location.reload()
            }
        }

        btn_modify.addEventListener('click', () => {
           if(btn_modify.value === "수 정"){
               btn_modify.value = "확 인"
               btn_delete.value = "취 소"
               title.readOnly = false
               content.readOnly = false
           }else if(btn_modify.value === "확 인"){
                btn_modify.type = "submit"
           }
        })

        btn_delete.addEventListener('click', () => {
           delete_button_change(btn_delete)
        })

        for(let i = 0; i < comment_update.length; i++){
            comment_update[i].addEventListener('click', () => {
               if(comment_update[i].value === "수 정"){
                   comment_update[i].value = "확 인"
                   comment_delete[i].value = "취 소"
                   comment_content[i].readOnly = false
               }else if(comment_update[i].value === "확 인"){
                   comment_update[i].type = "submit"
               }
            })

            comment_delete[i].addEventListener('click', function(){
                delete_button_change(comment_delete[i])
            })
        }
    </script>
</body>
</html>
<?php
          }else{
            mysqli_close($con); // 데이터베이스 접속 종료
            alert_back('권한이 없습니다');
            exit;
        }
    }else{
        mysqli_close($con); // 데이터베이스 접속 종료
        alert_back('회원정보와 일치하지 않습니다');
        exit;
    }
}
}else{
mysqli_close($con); // 데이터베이스 접속 종료
alert_back('세션 오류');
exit;
}
?>