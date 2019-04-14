<?php
session_start();
include "includes/connection.php";
$read_query = "SELECT * FROM users";
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
                 <h2>участник:</h2>
                 <?php
                 include "includes/getUserEvents.php";
                 $_SESSION['user_id']= 1;
                 $events = getUserEvents($_SESSION['user_id']);
                 echo "<table class='table table-bordered'>";
                 echo "<tr><td>Заглавие</td><td>Снимка</td><td>Описание</td><td>Започва</td><td>Свършва</td></tr>";
                 foreach ($events as $key => $event) { ?>
                     <tr>
                         <td>

                             <?php echo $event['title']; ?>

                        </td>
                        <td>
                            <img src="./images/<?php echo $event['picture']?>" alt="" class="img-in-table">
                        </td>
                        <td>

                             <?php echo $event['description']; ?>

                         </td>
                         <td>

                             <?php echo $event['start_at']; ?>

                         </td>
                         <td>

                             <?php echo $event['start_at']; ?>

                         </td>
                    </tr>
                 <?php
                 }
                 echo "</table>";
                 ?>

                 <h2>помощник:</h2>
                 <?php
                 $_SESSION['user_id']= 1;
                 $events = getUserEventsHelper($_SESSION['user_id']);
                 echo "<table class='table table-bordered'>";
                 echo "<tr><td>Заглавие</td><td>Снимка</td><td>Описание</td><td>Започва</td><td>Свършва</td></tr>";
                 foreach ($events as $key => $event) { ?>
                     <tr>
                         <td>

                             <?php echo $event['title']; ?>

                        </td>
                        <td>
                            <img src="./images/<?php echo $event['picture']?>" alt="" class="img-in-table">
                        </td>
                        <td>

                             <?php echo $event['description']; ?>

                         </td>
                         <td>

                             <?php echo $event['start_at']; ?>

                         </td>
                         <td>

                             <?php echo $event['start_at']; ?>

                         </td>
                    </tr>
                 <?php
                 }
                 echo "</table>";
                 ?>
             </div><!--/tab-pane-->

          </div><!--/tab-content-->

        </div><!--/col-9-->

    </div><!--/row-->



<a href="updateProfileInfo1.php?user=<?= $row['id'] ?>" class="button">Промени</a>


                          <?php } ?>
    <?php } ?>

</body>
</html>
