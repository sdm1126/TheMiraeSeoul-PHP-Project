<<<<<<< HEAD
<?php
    include_once('../db/db_connector.php');
?>
=======
>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
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
<<<<<<< HEAD
        include('./header.php');
=======
            include('./header.php');
>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
        ?>
        <aside>
            <div>
                <ul>
                    <li class="title">마이 페이지</li>
                    <hr>
<<<<<<< HEAD
                    <li><a href="./mypage_user.php">내 정보</a></li>
                    <li><a href="./mypage_reservation.php">내 예약</a></li>
                    <li><a href="./mypage_inquiry_board.php?page=1"><b>내 문의</b></a></li>
                    <li><a href="./mypage_resignation.php">회원탈퇴</a></li>
=======
                    <li>내 정보</li>
                    <li>내 예약</li>
                    <li><b>내 문의</b></li>
                    <li>회원탈퇴</li>
>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
                </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>내 문의</h2>
<<<<<<< HEAD
                <?php
                    $list_number = $_GET['no'];
                    $mb_id = $_GET['id'];

                    $sql = "SELECT * FROM user WHERE id = '$mb_id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $full_name = $row['full_name'];
                    $mobile = $row['mobile1'].'-'.$row['mobile2'].'-'.$row['mobile3'];
                    $email = $row['email1'].'@'.$row['email2'];

                    $sql = "SELECT * FROM inquiry WHERE no = $list_number";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $title = $row['title'];
                    $content = $row['content'];

                    $sql = "SELECT * FROM comment WHERE inquiry_number = $list_number";
                    $result = mysqli_query($con, $sql);

                    $result = mysqli_query($con, $sql);
                    $list = array();
                    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                        $list[$i] = $row;
                    }
                    ?>
            </article>
            <hr>
            <article class="form">
                <form action="./mypage_inquiry_update.php?no=<?=$list_number?>" method="post">
=======
            </article>
            <hr>
            <article class="form">
                <form action="">
>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
                    <table>
                        <tr>
                            <!-- 첫번째 줄 시작 -->
                            <td class="title">성명</td>
<<<<<<< HEAD
                            <td><?=$full_name?></td>
                        </tr><!-- 첫번째 줄 끝 -->
                        <tr>
                            <!-- 첫번째 줄 시작 -->
                            <td class="title">아이디</td>
                            <td><?=$mb_id?></td>
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
=======
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr><!-- 첫번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">예약번호</td>
                            <td><input type="text"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">제목</td>
                            <td><input type="text"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title" id="content">내용</td>
                            <td><textarea name="" id="" cols="30" rows="10"></textarea></td>
>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">휴대전화</td>
<<<<<<< HEAD
                            <td><?=$mobile?></td>
=======
                            <td>(개인 정보에서 넘어오게 함)</td>
>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">이메일</td>
<<<<<<< HEAD
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
            <?php
                for ($i = 0; $i < count($list); $i++) {
                    ?>
            <article class="textarea">
                <h3><?=$list[$i]['id']?></h3>
                <form action="./mypage_comment_update.php?id=<?=$mb_id?>&no=<?=$list[$i]['no']?>" method="post">
                    <textarea name="content" class="comment_content" cols="30" rows="10" readonly><?=$list[$i]['content']?></textarea>
                </article>
                <article class="reply">
                    <div>
                        <input type="button" class="comment_update" name="mode" value="수 정">
                        <input type="button" class="comment_delete" name="mode" value="삭 제">
                    </div> 
                </form>
                </article>
                <?php }
                    mysqli_close($con); // 데이터베이스 접속 종료
                    ?>
            <article class="textarea">
                <h3>답 변</h3>
                <form action="./mypage_comment_update.php?id=<?=$mb_id?>&no=<?=$list_number?>" method="post">
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
=======
                            <td>(개인 정보에서 넘어오게 함)</td>
                        </tr><!-- 두번째 줄 끝 -->
                    </table>
                </form>
            </article>
            <article class="button">
                <div>
                    <input type="submit" value="수 정">
                    <input type="button" value="삭 제">
                </div>
            </article>
            <article class="textarea">
                <h3>댓 글</h3>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </article>
            <article class="reply">
                <div>
                    <input type="button" value="등 록">
                    <input type="button" value="수 정">
                    <input type="button" value="삭 제">
                </div>
            </article>
        </main>
        <?php
            include('./footer.php');
        ?>
    </div>
</body>

>>>>>>> ded97b3b448de508e911d6108db4fb4fcfbfb460
</html>