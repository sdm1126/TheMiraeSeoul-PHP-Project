<!-- PHP 테스트용 문서. 프로젝트 완료 후 삭제 예정. -->
<?php
 $str = 'http://localhost/theMiraeSeoul/TheMiraeSeoul-PHP-Project/php/mypage_inquiry_board.php?option=title&page=1&page=2';

 $a = preg_replace('/\&page=[0-9]*/', '', $str);

 var_dump($a)

?>