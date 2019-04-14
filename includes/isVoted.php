<?php
function isVoted($user,$event){
    include 'includes/connection.php';
    $sqlExist = "SELECT * FROM events_score WHERE `user_id` = '".$user."' AND `event_id` = '".$event."'";
    $resultExist = $conn->query($sqlExist);
    if ($resultExist->num_rows > 0) {
        return true;
    }
    return false;
}
