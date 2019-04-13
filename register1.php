<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <script src="./js/jquery.js"></script>
  <script src="./js/jquery.easing.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style_reg.css">
  
</head>
<body>
  

<form id="msform" method="post" action="register.php">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Настройка на акаунта</li>
    <li>Социални платформи</li>
    <li>Лична информация</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Създай нов профил</h2>
    <?php
    if (isset($_GET['error'])) {
       echo '<span style="color:#f00;text-align:center;">Имейлът е вече зает</span>';;
    }
     ?>
    
    <h3 class="fs-subtitle">Първа стъпка</h3>
    <input type="text" name="email" placeholder="Имейл*" id="email" required />
    <input type="password" name="password" placeholder="Парола*" id="pass" required />
    <input type="password" name="cpass" placeholder="Повтори парола*" id="passc" required />
    <input type="button" name="next" class="next action-button" value="Продължи" required />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Социални платформи</h2>
    <h3 class="fs-subtitle">Твоето присъствие в социалните медии</h3>
    
    <input type="text" name="fb" placeholder="Facebook" />
    <input type="button" name="previous" class="previous action-button" value="Назад" />
    <input type="button" name="next" class="next action-button" value="Продължи" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Персонални данни</h2>
    <h3 class="fs-subtitle">Никога няма да ги продадем</h3>
    <input type="text" name="name" placeholder="Име*" id="fname" />
    <input type="text" name="last_name" placeholder="Фамилия*" id="lname" />
    <input type="text" name="location" placeholder="Локация" />
    <input type="text" name="age" placeholder="Години" />
    <input type="button" name="previous" class="previous action-button" value="Назад" />
    <input type="submit" name="reg_user" class="submit action-button" value="Продължи" />
  </fieldset>
</form>

<script>
  //jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var click_count = 0;
var first_step = false;
var third_step = false;
$(".next").click(function(){
  
click_count++;
if (click_count == 1) {
  if($('#email').val().length < 1){
    $('#email').attr('placeholder','Полето е задължително!!!');
    $('#email').css('background','#f00');
    first_step = true;
  }
  if($('#pass').val().length < 1){
    $('#pass').attr('placeholder','Полето е задължително!!!');
    $('#pass').css('background','#f00');
   first_step = true;
  }
    if($('#passc').val().length < 1){
    $('#passc').attr('placeholder','Полето е задължително!!!');
    $('#passc').css('background','#f00');
  first_step = true;
  }
  if($('#pass').val().length < 6){
    $('#pass').attr('placeholder','Минимум 6 цифри');
    $('#pass').css('background','#f00');
  first_step = true;
  }
  if($('#passc').val().length < 6){
    $('#passc').attr('placeholder','Минимум 6 цифри');
    $('#passc').css('background','#f00');
    first_step = true;
  }
   click_count = 0;
   if (first_step){
    first_step = false;
    return false 
   }
 
}
if (click_count == 3) {
  if($('#fname').val().length < 1){
    $('#fname').attr('placeholder','Полето е задължително!!!');
    $('#fname').css('background','#f00');
   third_step = true;
  }
  if($('#lname').val().length < 1){
    $('#lname').attr('placeholder','Полето е задължително!!!');
    $('#lname').css('background','#f00');
    third_step = true;
  } 
  click_count = 0;
   if (third_step){
    third_step = false;
    return false 
   }
} 
  
 
   if(animating) return false; 
  animating = true;

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(){
  if($('#fname').val().length < 1){
    $('#fname').attr('placeholder','Полето е задължително!!!');
    $('#fname').css('background','#f00');
   third_step = true;
  }
  if($('#lname').val().length < 1){
    $('#lname').attr('placeholder','Полето е задължително!!!');
    $('#lname').css('background','#f00');
    third_step = true;
  } 
 
   if (third_step){
    third_step = false;
    return false 
   } else {
    $('#msform').submit();
   }

  
})


</script>
</body>
</html>

