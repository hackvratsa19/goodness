<!DOCTYPE html>
<html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
	<title>My profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/memberprofile.css">
</head>

<hr>
<body style="
background: url(images/86583d5e25a931d.png) no-repeat center center fixed; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
<?php 
$title = 'Update';
include "includes/connection.php";

$user_id = $_GET['user'];

$read_query = "SELECT * FROM `users` JOIN locations ON users.location=locations.location WHERE 1";

$result = mysqli_query($conn, $read_query);

$row_user = mysqli_fetch_assoc($result);

$locations_query = "SELECT * FROM locations";
$locations_result = mysqli_query($conn, $locations_query);



?>
<?php 
if(isset($_POST['submit'])){
	$name 			= $_POST['name'];
	$last_name 			= $_POST['last_name'];
	$fb 		= $_POST['fb'];
	$email 		= $_POST['email'];
	$age 		= $_POST['age'];
	$location 	= $_POST['location'];
	$filename=$_FILES['file_to_upload']['name'];
		$target_dir = "images/";
   $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);


   move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file);

	$update_query = "UPDATE `users` SET `name`= '$name',`last_name`='$last_name',`location`='$location',`picture`='$filename',`fb`='$fb',`email`='$email',`age`=$age WHERE id = 1";
	$result_update1 = mysqli_query($conn, $update_query);
	if($result_update1){
		// echo "Success!";
			header('Location: ./memberprofile.php');
		exit;
	} else {
		echo mysqli_error($conn);
		// echo "Please, try again later!";
	}
}

?>



<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-sm-10"><h2></h2></div>
		<div class="col-sm-2"><a href="/users" class="pull-right"><img src="images/logo_3.png" class="avatar" alt="avatar"></a></div>
	</div>
	<div class="row">
		<div class="col-sm-3"><!--left col-->


			<div class="text-center">

			</div></hr><br>
		</div><!--/col-3-->
		<div class="col-sm-9">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Лична информация</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="home">
					<hr>
					<form class="form" action="##" method="post" id="registrationForm" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-xs-6">
								<img src="images/<?= $row_user['picture'] ?>" class="avatar1 img-thumbnail" alt="avatar">
				<h6>Upload a different photo...</h6>
				<input type="file" id="input-file" name="file_to_upload" size="40" class="text-center center-block file-upload" onchange='$("#upload-file-info").html($(this).val());'>
				&nbsp;
							</div>
						</div>
						
						<div class="form-group">

							<div class="col-xs-6">
								<label for="first_name"><h3>Местоположение:</h3></label>
								<select class="form-control" id="location" name="location">
									<?php if(mysqli_num_rows($locations_result) > 0){ ?>

										<?php while($row = mysqli_fetch_assoc($locations_result)){ ?>

											<option value="<?= $row['location']; ?>" <?php if( $row['location'] == $row_user['location']) { echo 'selected'; } ?> ><?= $row['location'] ?></option>

										<?php } ?>

									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">


						</div>

						<div class="form-group">

							<div class="col-xs-6">
								<label for="phone"><h3>Mail:</h3></label>
								<input type="text" class="form-control" id="email" name="email" value="<?= $row_user['email'] ?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-6">
								<label for="mobile"><h3>Facebook:</h3></label>
								<input type="text" class="form-control" id="fb" name="fb" value="<?= $row_user['fb'] ?>">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="password"><h3>Име:</h3></label>
								<input type="text" class="form-control" id="name" name="name" value="<?= $row_user['name'] ?>">
							</div>
						</div>
						<div class="col-xs-6">
							<label for="password"><h3>Фамилия:</h3></label>
							<input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row_user['last_name'] ?>">
						</div>



					</div>
					<div class="form-group">

						<div class="col-xs-6">
							<label for="password"><h3>Години:</h3></label>
							<input type="text" class="form-control" id="age" name="age" value="<?= $row_user['age'] ?>">
						</div>
					</div>
					<div class="form-group">

					</div>
					<input type="submit" name="submit" class="btn btn-success btn-rounded">
				</form>

				<hr>

			</div><!--/tab-pane-->


		</body>
		</html>