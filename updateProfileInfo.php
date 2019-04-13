<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/memberprofile.css">
</head>
<body>

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
<div class="container">
	<div class="row justify-content-md-center">
		<h2>Промени</h2>
	</div>
	<div class="row justify-content-md-center">			
		<div class="col-sm-10">			
			<form method="post" action="">
				<div class="form-group">
					<label for="product_name">Име</label>
					<input type="text" class="form-control" id="name" name="name" value="<?= $row_user['name'] ?>">
				</div>
				<div class="form-group">
					<label for="product_price">Фамилия</label>
					<input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row_user['last_name'] ?>">
				</div>
				<div class="form-group">
					<label for="product_name">Facebook</label>
					<input type="text" class="form-control" id="fb" name="fb" value="<?= $row_user['fb'] ?>">
				</div>
				<div class="form-group">
					<label for="product_name">Mail</label>
					<input type="text" class="form-control" id="email" name="email" value="<?= $row_user['email'] ?>">
				</div>
				<div class="form-group">
					<label for="product_name">Години</label>
					<input type="text" class="form-control" id="age" name="age" value="<?= $row_user['age'] ?>">
				</div>
				<div class="form-group">
					<label for="manufacturer">Местоположение</label>
					<select class="form-control" id="location" name="location">
						<?php if(mysqli_num_rows($locations_result) > 0){ ?>
							
							<?php while($row = mysqli_fetch_assoc($locations_result)){ ?>

								<option value="<?= $row['location']; ?>" <?php if( $row['location'] == $row_user['location']) { echo 'selected'; } ?> ><?= $row['location'] ?></option>

							<?php } ?>

						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success">Запази</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['submit'])){
		$name 			= $_POST['name'];
		$last_name 			= $_POST['last_name '];
		$fb 		= $_POST['fb'];
		$email 		= $_POST['email'];
		$age 		= $_POST['age'];
		$location 	= $_POST['location'];
		
		//to do add hidden field product id
		$update_query = "UPDATE `users` SET `name`= '$name',`last_name`='$last_name',`location`='$location',`fb`='$fb',`email`='$email',`age`=$age WHERE id = $user_id";
		$result_update = mysqli_query($conn, $update_query);

		if($result_update){
		// echo "Success!";
			header('Location: memberprofile.php');
		} else {
			echo mysqli_error($conn);
		// echo "Please, try again later!";
		}
	}

?>

</body>
</html>