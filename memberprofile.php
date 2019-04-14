<?php 
session_start();
include "includes/connection.php";
$idUser = 1;
$read_query1 = "SELECT * FROM `users` JOIN locations ON users.location=locations.location WHERE 1";

$result1 = mysqli_query($conn, $read_query1);

$row_user = mysqli_fetch_assoc($result1);
$locations_query = "SELECT * FROM locations";
$locations_result = mysqli_query($conn, $locations_query);
$read_query = "SELECT * FROM `users` WHERE `id` = $idUser";
$result = mysqli_query($conn, $read_query);
  if(mysqli_num_rows($result) > 0){ ?>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>

<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
	 <link rel="stylesheet" type="text/css" href="css/memberprofile.css">
  <title>My profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<hr>
<body style="
  background: url(images/86583d5e25a931d.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h2><?= $row['name'] ?> <?= $row['last_name'] ?></h2></div>
  		
  		<div class="col-sm-2"><a href="/users" class="pull-right"><img src="images/logo_3.png" class="avatar" alt="avatar"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="images/<?= $row['picture'] ?>" class="avatar1 img-thumbnail" alt="avatar">
        
      </div></hr><br>
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Лична информация</a></li>
                <li><a data-toggle="tab" href="#messages">Стена на славата</a></li>
                <li><a data-toggle="tab" href="#good">Създай добрина</a></li>
              </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h3>Местоположение:</h3></label>
                              <h4><?= $row['location'] ?></h4>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h3>Mail:</h3></label>
                               <h4><?= $row['email'] ?></h4>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h3>Facebook:</h3></label>
                              <h4><?= $row['fb'] ?></h4>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          
                      </div>
                      <div class="form-group">
                          
                          
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h3>Години:</h3></label>
                               <h4><?= $row['age'] ?></h4>
                          </div>
                      </div>
                      <div class="form-group">
       
                      </div>
                      
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <h1>I am yeeeeeaaaa</h1>
                      
              	</form>
               </div>
             </div><!--/tab-pane-->
             <div class="tab-pane" id="good">
            		
               	
                  <hr>
                  <form class="form" action="goodnessCreate.php" method="post" id="registrationForm" enctype="multipart/form-data">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Заглавие</h4></label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Заглавие" title="Заглавието но вошото добрина:">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Описание</h4></label>
                              <input type="text" class="form-control" name="description" id="description" placeholder="Описание" title="Описание">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Начало</h4></label>
                              <input type="datetime-local" name="start">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Край</h4></label>
                             <input type="datetime-local" name="end">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Местоположение</h4></label>
                              <select class="form-control" id="location" name="location">
									<?php if(mysqli_num_rows($locations_result) > 0){ ?>

										<?php while($row = mysqli_fetch_assoc($locations_result)){ ?>

											<option value="<?= $row['id']; ?>" <?php if( $row['location'] == $row_user['location']) { echo 'selected'; } ?> ><?= $row['location'] ?></option>

										<?php } ?>

									<?php } ?>
								</select>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Снимка</h4></label>
                              <input type="file" id="input-file" name="file_to_upload" size="40" class="text-center center-block file-upload" onchange='$("#upload-file-info").html($(this).val());'>
				&nbsp;
                          </div>
                      </div>
                      
                   
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit" name="goodButton"><i class="glyphicon glyphicon-ok-sign"></i>Запази</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
             
          </div><!--/tab-content-->

        </div><!--/col-9-->

    </div><!--/row-->
                                             


<a href="updateProfileInfo1.php?user=<?= $row['id'] ?>" class="button">Промени</a>

                   
                          <?php } ?>  
    <?php } ?> 

</body>
</html>