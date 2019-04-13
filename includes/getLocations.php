<?php
function getLocations(){
include 'includes/connection.php';
$sql = "SELECT * FROM locations";
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


function getSingleLocation($locationId){
    include 'includes/connection.php';
    $sql = "SELECT * FROM locations WHERE `id` = ".$locationId;
    $result = $conn->query($sql);

    $data = '';
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data =  $row["location"];
        }
    } else {
        echo "0 results";
    }

    return $data;
    $conn->close();
}
