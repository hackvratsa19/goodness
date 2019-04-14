<?php
function getUserPower($user){
include 'includes/connection.php';
$sql = "SELECT `points` FROM users WHERE id=".$user;
$result = $conn->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data =  (int)($row['points'] / 2);
    }
}

return $data;
$conn->close();
}
