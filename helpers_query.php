<?php 
session_start();
include "includes/connection.php";

$helper_id = $_GET['user'];
$event_id = $_GET['event_id'];

$query = "INSERT INTO event_helpers ( user_id, event_id)";
$query .= " VALUES ( '$helper_id', '$event_id')";
$result = mysqli_query($conn, $query);
if ($result) {
        header('Location: memberprofile.php');
      // echo 'success';
        }
        var_dump($result);