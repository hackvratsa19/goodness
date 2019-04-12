<?php
include "includes/header.php";




if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

}
if (isset($email)) {
    $q_read = "SELECT * FROM `users` where `email` = '$email'";

// if (password_verify($password, $stored_secret))
// { 
//   //Password OK
// }
    $result = mysqli_query($conn, $q_read);
    if (mysqli_num_rows($result) > 0) {
        // echo "Success!";
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"]))
{ 
  echo 'ok';
} 
            }
            // header('Location: index.php');

        }
    }
  