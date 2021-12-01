<?php
include_once('../db/db_connector.php');
if(isset($_SESSION['session_id'])){
    
    $id = sql_escape($con, $_SESSION['session_id']);

    if(empty($id)){
        mysqli_close($con);
        header("location: login.php?error=user_id_empty");
        exit;
    }else{
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            $moblie = $row['mobile1']."-".$row['mobile2']."-".$row['mobile3'];
            $email = $row['email1']."@".$row['email2']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/service_inquiry.css">
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
                 <li class="title">고객 서비스</li>
                 <hr>
                 <li>고객서비스</li>
                 <li>F A Q</li>
                 <li>문의하기</li>
               </ul>
            </div>
        </aside>
        <main>
            <article class="head">
                <h2>문 의 하 기</h2>
            </article>
            <hr >
            <article class="main">
                <form action="./inquiry_check.php" method="post">
                    <table>
                        <tr>
                            <!-- 첫번째 줄 시작 -->
                            <td class="title">성명</td>
                            <td><span name="full_name"><?=$row['full_name']?></span>
                        </tr><!-- 첫번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">제목</td>
                            <td><input type="text" name="title"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title" id="content">내용</td>
                            <td><textarea cols="30" rows="10" name="content"></textarea></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">휴대전화</td>
                            <td><span name="mobile"><?=$moblie?></span></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">이메일</td>
                            <td><span name="email"><?=$email?></span></td>
                        </tr><!-- 두번째 줄 끝 -->
                    </table>
                </article>
                <article class="terms">
                    <h3>필수적 개인정보 수집 및 이용에 대한 동의</h3>
                    <div id="message" style="color: red; font-size: 14px;">필수 동의 사항입니다</div>
                    <section>
                        <label for="check1">동의함</label>
                        <input type="checkbox" id="check1">
                    </section>
                </article>
                <textarea disabled name="" id="terms1_text" cols="30" rows="10"> 미래호텔 고객의 문의 및 의견과 관련하여 귀사가 아래와 같이 본인의 개인정보를 수집 및 이용하는데 동의합니다.
                    
                    필수적인 개인정보의 수집 ㆍ이용에 관한 사항
                    ① 수집ㆍ이용 항목 | 성명(국문·영문), 이메일, 휴대전화
                    ② 수집ㆍ이용 목적 | 문의에 대한 안내 및 서비스 제공
                    ③ 보유ㆍ이용 기간 | 수집ㆍ이용 동의일로부터 5년간
                    ※위 사항에 대한 동의를 거부할 수 있으나, 이에 대한 동의가 없을 경우 문의에 대한 안내 및 서비스 제공과 관련된 제반 절차 진행이 불가능 할 수 있음을 알려드립니다.
                </textarea>
                <article class="terms">
                    <h3>선택적 개인정보 수집 및 이용에 대한 동의</h3>
                    <div>
                        <label for="check2">동의함</label>
                        <input type="checkbox" id="check2">
                    </div>
                </article>
                <textarea disabled name="" id="terms1_text" cols="30" rows="10"> 미래호텔 고객의 문의 및 의견과 관련하여 귀사가 아래와 같이 본인의 개인정보를 수집 및 이용하는데 동의합니다.
                    
                    필수적인 개인정보의 수집 ㆍ이용에 관한 사항
                    ① 수집ㆍ이용 항목 | 성명(국문·영문), 이메일, 휴대전화
                    ② 수집ㆍ이용 목적 | 문의에 대한 안내 및 서비스 제공
                    ③ 보유ㆍ이용 기간 | 수집ㆍ이용 동의일로부터 5년간
                    ※위 사항에 대한 동의를 거부할 수 있으나, 이에 대한 동의가 없을 경우 문의에 대한 안내 및 서비스 제공과 관련된 제반 절차 진행이 불가능 할 수 있음을 알려드립니다.
                </textarea>
                <article class="button">
                   <input type="submit" id="submit" value="등 록" disabled>
                </article>
            </form>
        </main>
        <?php
            include('./footer.php');
            ?>
    </div>
    <script>
       

    </script>
</body>
</html>
<?php
        }
    }
}
?>