<?php
function getEventByLocation($location){
include 'includes/connection.php';
$sql = "SELECT *,events.picture AS event_pic, users.picture AS user_pic FROM events JOIN `users` ON `events`.`user_id` = `users`.`id` WHERE `location_id` = '".$location."' AND `is_active` IS NOT NULL";
$result = $conn->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] =  $row;
    }
}

return $data;
$conn->close();
}
