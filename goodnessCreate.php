<?php 
session_start();
include "includes/connection.php";

$user_id = 2;
$read_query = "SELECT * FROM `events` JOIN locations ON events.location_id = locations.id JOIN users ON users.id = events.user_id WHERE `user_id` = $user_id";

$result = mysqli_query($conn, $read_query);


if(mysqli_num_rows($result) > 0){ 
	while($row = mysqli_fetch_assoc($result)){
			$points = $row['points'];

		}
		if (isset($_POST['goodButton'])) {
			echo "You are great man";
			if ($points>50) {
				echo "You are powerful man";
				$end		= $_POST['end'];
				$start 		= $_POST['start'];
				$location 		= $_POST['location'];
				$description 	= $_POST['description'];
				$title 	= $_POST['title'];
				$valueStart = date("Y-m-d\TH:i:s", strtotime($start));
				$valueEnd = date("Y-m-d\TH:i:s", strtotime($end));
				$filename=$_FILES['file_to_upload']['name'];
		$target_dir = "images/";
   $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);


   move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file);

				$create_query = "INSERT INTO `events`(`user_id`, `picture`, `title`, `description`, `start_at`, `ends_at`, `location_id`) VALUES ($user_id,'$filename','$title','$description','$valueStart','$valueEnd', $location)";
		
		$result_create_query = mysqli_query($conn, $create_query);
		if($result_create_query){
		// echo "Success!";
			header('Location: ./memberprofile.php');
		exit;
	} else {
		echo mysqli_error($conn);
		// echo "Please, try again later!";
	}
}
			}else{
				echo "You don't have enough points";
			}
	}

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>

	</body>
	</html>