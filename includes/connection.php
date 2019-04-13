<?php 

$conn = mysqli_connect('localhost', 'root', '', 'eco_good');
mysqli_set_charset($conn,"utf8");
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
} else {
	//echo '<h1>Connected successfully!</h1>';
}

