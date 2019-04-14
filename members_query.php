<?php 
session_start();
include "includes/connection.php";

$member_id = $_GET['user'];
$event_id = $_GET['event_id'];

$query = "INSERT INTO event_members ( user_id, event_id)";
$query .= " VALUES ( '$member_id', '$event_id')";
$result = mysqli_query($conn, $query);
if ($result) {
        header('Location: memberprofile.php');
      // echo 'success';
        }
        var_dump($result);