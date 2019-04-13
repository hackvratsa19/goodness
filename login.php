<?php
include "includes/header.php";




if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

}
if (isset($email)) {
    $q_read = "SELECT * FROM `users` where `email` = '$email'";

$user_check_query = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($conn, $user_check_query);
    
    if (mysqli_num_rows($result) > 0) {
        header('Location: login1.php?error="Имейлът съществува"');
      // echo 'success';
        }
    $result = mysqli_query($conn, $q_read);
    if (mysqli_num_rows($result) > 0) {
        // echo "Success!";
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"]))
{ 
  header('Location: index.php');

} 
            }
            
        }
    }
  