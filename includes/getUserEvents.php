<?php
function getUserEvents($user){
include 'includes/connection.php';
$sql = "SELECT * FROM event_members JOIN `events` ON `event_members`.`event_id` = `events`.`id` WHERE event_members.user_id=".$user;
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] =  $row;
    }
}

return $data;
$conn->close();
}

function getUserEventsHelper($user){
    include 'includes/connection.php';
    $sql = "SELECT * FROM event_helpers JOIN `events` ON `event_helpers`.`event_id` = `events`.`id` WHERE event_helpers.user_id=".$user;
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] =  $row;
        }
    }

    return $data;
    $conn->close();
}
