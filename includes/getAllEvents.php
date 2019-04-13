<?php
function getLocations(){
include 'includes/connection.php';
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[$row['id']] =  $row["location"];
    }
} else {
    echo "0 results";
}

return $data;
$conn->close();
}
