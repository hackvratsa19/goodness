<?php
session_start();
include 'includes/connection.php';




if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

}
if (isset($email)) {
    $user_check_query = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($conn, $user_check_query);    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"])){ 
                  header('Location: pre-index.php');
                  exit;
                  return;

            }
            header('Location: login1.php?error="Грешен имейл или парола"');
        }            
    }else {
        header('Location: login1.php?error="Грешен имейл или парола222"');
    }
}
 $_SESSION['user_name'] = $name;
 $_SESSION['user_id'] = $user_id;