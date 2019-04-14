<?php
include 'includes/connection.php';
$sql = "UPDATE events SET score = score + '".$_POST['points']."' WHERE id=".$_POST['event_id'];
$result = $conn->query($sql);

$userId = $_POST["user_id"];
$eventId = $_POST["event_id"];
$score = $_POST["points"];
$sqlExist = "SELECT * FROM events_score WHERE `user_id` = '".$userId."' AND `event_id` = '".$eventId."'";
$resultExist = $conn->query($sqlExist);
if ($resultExist->num_rows > 0) {
    return false;
}else{
    $sqlInsert = "INSERT INTO events_score (user_id, event_id, score)
    VALUES ('$userId', '$eventId', '$score')";
    $result = $conn->query($sqlInsert);
    $conn->close();
}
