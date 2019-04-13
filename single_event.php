<?php 
include "includes/connection.php";
// $sql = "SELECT *, events.id AS event_id, events.picture AS event_pic, users.picture AS user_pic FROM events JOIN `users` ON `events`.`user_id` = `users`.`id` WHERE `event_id` = 1 ";
$sql = "SELECT e.id, `description`, loc.location, e.picture, `title`, `start_at`, `ends_at`, `location_id`, `user_id` FROM events e JOIN locations loc ON loc.id = e.location_id JOIN users u ON u.id = e.user_id WHERE e.id =" . $_GET['event_id'];

// $read_query = "SELECT * FROM users WHERE id=1";
$result = mysqli_query($conn, $sql);


  if(mysqli_num_rows($result) > 0){
   ?>

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
  		<div class="col-sm-10"><h2><?= $row['title'] ?></h2></div>
  		
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
                <li class="active"><a data-toggle="tab" href="#home">Информация за добрината</a></li>
                <li><a data-toggle="tab" href="#messages">Участници</a></li>
                <li><a data-toggle="tab" href="#helpers">Помагачи</a></li>
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
                              <label for="phone"><h3>Описание</h3></label>
                               <h4><?= $row['description'] ?></h4>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h3>старт</h3></label>
                              <h4><?= $row['start_at'] ?></h4>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h3>край</h3></label>
                              <h4><?= $row['ends_at'] ?></h4>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          
                      </div>
                      <div class="form-group">
                          
                          
                      </div>
                     
                      <div class="form-group">
       
                      </div>
                      
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->

             <div class="tab-pane" id="messages">
               <?php
                $sql_members = "SELECT u.id, `user_id`, `event_id`, `score`, u.name, u.picture FROM `event_members` e_m JOIN users u ON u.id = e_m.user_id";
                $members_result = mysqli_query($conn, $sql_members);
                    if(mysqli_num_rows($members_result) > 0){ 
                      while($row = mysqli_fetch_assoc($members_result)){ ?>
                        <div class="text-center">
        <img src="images/<?= $row['picture'] ?>" class="avatar1 img-thumbnail" alt="avatar">
        <span><h4><?= $row['name'] ?></h4></span>
      </div></hr><br>
        
                    <?php  }
                  }
                ?>
                <hr>
              
             </div><!--/tab-pane-->

             <div class="tab-pane" id="helpers">
               <?php
                $sql_helpers = "SELECT u.id, `user_id`, `event_id`, `score`, u.name, u.picture FROM `event_helpers` e_m JOIN users u ON u.id = e_m.user_id";
                $helpers_result = mysqli_query($conn, $sql_helpers);
                    if(mysqli_num_rows($helpers_result) > 0){ 
                      while($row = mysqli_fetch_assoc($helpers_result)){ ?>
                        <div class="text-center">
        <img src="images/<?= $row['picture'] ?>" class="avatar1 img-thumbnail" alt="avatar">
        <span><h4><?= $row['name'] ?></h4></span>
      </div></hr><br>
        
                    <?php  }
                  }
                ?>
                
               
               
             </div><!--/tab-pane-->
             
          </div><!--/tab-content-->

        </div><!--/col-9-->

    </div><!--/row-->
                                             


<a href="updateProfileInfo1.php?user=<?= $row['id'] ?>" class="button">Участвай</a>

                   
                          <?php } ?>  
    <?php } ?> 

</body>
</html>
