<!-- 체크인/체크아웃 선택하여 상품 조회하는 기능(Ajax 통신 사용) -->
<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/theMiraeSeoul/db/db_connector.php";
    
    $q = $_GET['q'];
    $q_array = explode("_", $q);
    
    $check_in = $q_array[0];
    $check_out = $q_array[1];
    $prev_check_out = date("Y-m-d", strtotime("-1 days", strtotime($check_out)));

    $sql = "SELECT * FROM deal WHERE '$prev_check_out' BETWEEN deal_start AND deal_end";
    $result = mysqli_query($con, $sql);
    $list = array();
    
    for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $list[$i] = $row;

        echo "<fieldset>";
        echo '<div class="section3-3-group">';
        
        // left
        echo '<div class="section3-3-left">';
        echo "<img src="."\"".$list[$i]['deal_image']."\""."/>";
        echo "</div>";
        
        // center
        echo '<div class="section3-3-center">';
        echo '<h3 id="deal_name'.$i.'">'.$list[$i]['deal_name'].'</h3>';
        echo "<h4>".$list[$i]['deal_content']."</h4>";
        if($i === 0) {
            echo "<h4>".$list[$i]['deal_start']." ~ 상시"."</h4>";
        } else {
            echo "<h4>".$list[$i]['deal_start']." ~ ".$list[$i]['deal_end']."</h4>";
        }
        echo "</div>";

        // right
        echo '<div class="section3-3-right">';
        echo '<label><input type="radio" class="room_type" name="deal_info" value="'.$list[$i]['deal_name'].'_'.'더블" required>더블</label><br>';
        echo '<label><input type="radio" class="room_type" name="deal_info" value="'.$list[$i]['deal_name'].'_'.'트윈" required>트윈</label><br>';
        echo '<label><input type="radio" class="room_type" name="deal_info" value="'.$list[$i]['deal_name'].'_'.'트리플" required>트리플</label><br>';
        echo '<label><input type="radio" class="room_type" name="deal_info" value="'.$list[$i]['deal_name'].'_'.'그랜드" required>그랜드</label><br>';
        echo "</div>";
        
        echo '</div>';
        echo "</fieldset>";
    }
?>