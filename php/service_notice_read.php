<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/TheMiraeSeoul/db/db_connector.php";
  $mode = $_GET['mode'];
  $title = isset($_GET['title']) ? $_GET['title'] : "";
  $content = "";
  $no = isset($_GET['no']) ? $_GET['no'] : "";

  if($mode === '글읽기') {
    $sql = "select * from notice where no = '$no' ";
    $update_query = "update notice set read_count = read_count+1 where no= $no";
    $view_query = mysqli_query($con, $update_query); 
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $content = $row['content'];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/service_notification_read.css">
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
                    <li>공 지 사 항</li>
                    <li>F A Q</li>
                    <li>문의하기</li>
                </ul>
            </div>
        </aside>
        <main>
            <article class="h2">
                <h2>공 지 사 항</h2>
            </article>
            <hr>
            <article class="form">
                <form method="post" action="service_notice_crud.php">
                    <table>
                        <input type="hidden" value="<?= $no?>" name="no">
                        <tr>
                            <!-- 에러메세지 출력 -->
                            <?php if(isset($_GET['error'])){ ?>
                            <div id="check" style="color: red">
                                <?= $_GET['error']; ?>
                            </div>
                            <?php } ?>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">제 목</td>
                            <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title">작 성 일 자</td>
                            <td><input type="text" id="currentDate" name="written_date"
                                    value="<?php echo $row['written_date']; ?>" readonly></td>
                        </tr><!-- 두번째 줄 끝 -->
                        <tr>
                            <!-- 두번째 줄 시작 -->
                            <td class="title" id="content">내 용</td>
                            <td><textarea name="content" cols="30" rows="10"><?php echo $content; ?></textarea></td>
                        </tr><!-- 두번째 줄 끝 -->
                    </table>
            </article>
            <article class="button">

                <div>
                    <?php
          if(isset($_SESSION['session_id'])&& $_SESSION['session_id'] === 'admin'){ 
          if($mode === '글쓰기') {?>
                    <input type="submit" value="작 성" name="mode">
                    <?php }else if($mode === '글읽기'){?>
                    <input type="submit" value="수 정" name="mode">
                    <?php } ?>
                    <input type="submit" value="삭 제" name="mode">
                    <?php } ?>
                    <!-- <input type="button" value="수 정"> -->
                </div>
                </form>
            </article>
        </main>
        <?php
            include('./footer.php');
            ?>
    </div>
</body>

<script src="../js/date.js"></script>

</html>