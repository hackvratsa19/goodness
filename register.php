<?php
include 'includes/db_connect.php';



// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    var_dump($_POST);

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password=password_hash($password, PASSWORD_DEFAULT);

    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    $fb = mysqli_real_escape_string($conn, $_POST['fb']);

    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $user_check_query = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($conn, $user_check_query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "taken";


    }
    else {
        $query = "INSERT INTO users (name, password, fb, last_name, age, email, location)";
        $query .= " VALUES ( '$name', '$password', '$fb', '$last_name', '$age', '$email', $location)";
        
         $result = mysqli_query($conn, $query);
         var_dump($result);
        $_SESSION['name'] = $name;
       
    }

}