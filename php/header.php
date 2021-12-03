<?php
    session_start();
    $_SESSION['session_id'] = 'admin';
?>

<header>
  <div class="header-group">
    <div class="header-center">
      <a href="./main.php">
        <h1>The Mirae
          <h2>Seoul</h2>
        </h1>
      </a>
    </div>
    <div class="header-right">
      <div class="header-right-top">
        <span>로그인</span>
        <span>회원가입</span>
        <span>마이 페이지</span>
      </div>
      <div class="header-right-bottom">
        <span>문의전화 02-441-6006</span>
        <span>객실예약 02-441-7007</span>
      </div>
    </div>
  </div>
  <nav>
    <ul>
      <li>호 텔</li>
      <li>객 실</li>
      <li>다이닝</li>
      <li>부대시설</li>
      <li>고객서비스</li>
      <li>예 약</li>
    </ul>
  </nav>
</header>