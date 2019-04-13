<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <!-- <script src="./js/jquery.js"></script>
  <script src="./js/jquery.easing.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="css/style_reg.css">
  
</head>
<body>
  

<form id="msform" method="post" action="login.php">
  <!-- progressbar -->
  
  <fieldset>
    <h2 class="fs-title">Вход</h2>
    <?php
    if (isset($_GET['error'])) {
       echo '<span style="color:#f00;text-align:center;">Имейлът е вече зает</span>';;
    }
     ?>
    <input type="text" name="email" placeholder="Email" required id="email" />
    <input type="password" name="password" placeholder="Password" required />
    
    <input type="submit" name="login" class="submit action-button" value="Вход" />
  </fieldset>
</form>


</body>
</html>