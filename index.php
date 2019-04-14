<!DOCTYPE html>
<html lang="bg">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./js/jquery.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/styles_top.css">

    <link rel="stylesheet" href="css/queries.css">
    <link rel="stylesheet" href="css/etline-font.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="css/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/front_style.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/vote-section.css">
    <link rel="stylesheet" href="css/sedna_bootstrap.min.css">
    <title>Сайт за добрини</title>
    <style>
        area {
            cursor: copy;
        }
    </style>
</head>
<body id="top">
    <?php include 'includes/getLocations.php'; ?>
    <?php include 'includes/getEventByLocation.php'; ?>
    <?php include 'includes/userPowerVotePoints.php'; ?>
    <?php include 'includes/isVoted.php'; ?>
    <?php session_start();
    if(!isset($_SESSION['location'])){
        if(isset($_GET['location'])){
            $_SESSION['location'] = $_GET['location'];
        }else{
            $_SESSION['location'] = 1;
        }
    }
    $_SESSION['user_id'] = 1;
    $_SESSION['user_name'] = 'vanko';
    ?>
    <section class="hero">
        <section class="navigation">
            <header>
                <div class="header-content">
                    <div class="logo"><a href="./pre-index.php"><img src="images/logo_3.png" alt="Sedna logo" width="50vw"></a></div>
                    <div class="header-nav">
                        <nav>
                            <ul class="primary-nav">
                                <?php if(!isset($_SESSION['user_id'])){ ?>
                                    <li><a href="./login1.php">Вход</a></li>
                                    <li><a href="./register1.php">Регистрация</a></li>
                                <?php }else{ echo '<a href="./memberprofile.php">'.$_SESSION['user_name']."</a>"; }?>
                                <li style="float:right"><a href="./pre-index.php">Регион - <?php echo getSingleLocation($_SESSION['location']); ?></a></li>

                            </ul>
                            <!-- <ul class="member-actions">
                                <li><a href="#download" class="login">вход</a></li>
                                <li><a href="#download" class="btn-white btn-small">регистрация</a></li>
                            </ul> -->
                        </nav>
                    </div>
                    <div class="navicon">
                        <a class="nav-toggle" href="#"><span></span></a>
                    </div>
                </div>
            </header>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="hero-content text-center">
                        <h1>Събери съмишленици, направи добро!</h1>
                        <p class="intro"></p>
                        <a href="#events-wrapper" class="btn btn-fill btn-large btn-margin-right">Виж още</a> <a href="#events-wrapper-vote" class="btn btn-accent btn-large">Гласувай</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="down-arrow floating-arrow"><a href="#"><i class="fa fa-angle-down"></i></a></div>
    </section>
    <section class="intro section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span class="icon"><i class="fab fa-creative-commons-share"></i></span>
                    </div>
                    <div class="intro-content">
                        <h5>Създай</h5>
                        <p>Регистрирай се, натрупай точки, направи сам ДОБРИНА</p>
                    </div>
                </div>
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span class="icon"><i class="fas fa-users"></i></span>
                    </div>
                    <div class="intro-content">
                        <h5>Участвай</h5>
                        <p>Вземи участие в добрина като участник или помощник</p>
                    </div>
                </div>
                <div class="col-md-4 intro-feature">
                    <div class="intro-icon">
                        <span class="icon"><i class="fas fa-thumbs-up"></i></span>
                    </div>
                    <div class="intro-content last">
                        <h5>Стани по-добър</h5>
                        <p>С всяка добрина, ще правиш земята, едно по-добро място </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- slider -->

    <div class="site-section block-15" id="events-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Добрини регион - <?php echo getSingleLocation($_SESSION['location']); ?></h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">
            <?php $events = getEventByLocation($_SESSION['location']);

            if(count($events) > 0){
                foreach($events as $key => $event){
             ?>
            <div class="media-with-text p-md-4">
              <div class="img-border-sm mb-4">
                <a href="#" class="popup-off image-play">
                  <img src="images/<?php echo $event['event_pic'] ?>" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0 text-center"><a href="#"><?php echo $event['title'] ?></a></h2>
              <hr>
              <span class="mb-3 d-block post-date">
              <p>
                  <img class="user-org-pic" src="images/<?php echo $event['user_pic'] ?>" alt="" class="img-fluid">
                  <span style="float:right">организатор:<b>
                  <?php echo $event['name']?></b></span>
                  <span style="float:right">точки организатор: <b><?php echo $event['points'] ?></b></span>
              </p>
              <br>
              <hr>
              <p style="text-align: justify;height:200px">
                  <?php echo strlen($event['description']) > 120?substr($event['description'],0,120).'...':$event['description']; ?>
              </p>
              <hr>
              <p>
                  <span class="starts_at_span">Започва:<?php echo $event['start_at']?></span><span class="ends_at_span">Свършва:<?php echo $event['ends_at']?></span>
              </p>
              <p>
                  <hr>
                  <a href="./singleEvent.php?event_id=<?php echo $event['event_id'] ?>"><button type="button" class="btn btn-primary">Вземи участие</button></a>
                  <a class="helper-btn" href="./single_event.php?event_id=<?php echo $event['event_id'] ?>"><button type="button" class="btn btn-success">Бъди помощник</button></a>
              </p>
            </div>

        <?php } }?>

        </div>
      </div>
    </div>

<?php $waitEvents = getEventByLocationVote($_SESSION['location']); ?>
<div class="col-md-12 mx-auto text-center mb-5 section-heading" id="events-wrapper-vote">
  <h2>Гласувай за Добрини регион - <?php echo getSingleLocation($_SESSION['location']); ?></h2>
</div>
<div class="box">
<?php foreach($waitEvents as $key => $event) {?>
      <div class="card">
        <div class="imgBx">
            <img src="images/<?php echo $event['event_pic'] ?>" alt="images">
            <span class="vote-desc"><?php echo $event['description'] ?></span>
            <div class="progress">
              <div id="progress-<?php echo $event['event_id']; ?>" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo ($event['score'] * 2) < 101?($event['score'] * 2):100;?>"
              aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($event['score'] * 2) < 101?($event['score'] * 2):100;?>%">
                <?php echo ($event['score'] * 2) < 101?($event['score'] * 2):100; ?>%
              </div>
            </div>
        </div>
        <div class="details">
            <h2><?php echo $event['title'] ?><br>
                <?php if(!isVoted($_SESSION['user_id'],$event['event_id'])){ ?>
                    <span>
                        <a href="#" class="add_points" data-user-id="<?php echo $_SESSION['user_id'] ?>" data-old-points="<?php echo $event['score'];?>" data-event-id="<?php echo $event['event_id'] ?>" data-points="<?php echo getUserPower($_SESSION['user_id']);?>"><button type="button" class="btn btn-success">Гласувай +<?php echo getUserPower($_SESSION['user_id']);?> т.</button></a>
                    </span>
                <?php }else{ ?>
                    <button type="button" name="button" class="btn btn-primary" disabled>Гласувал</button>
                <?php }?>
            </h2>
        </div>
    </div>
<?php } ?>
</div>
<script>
    $('.add_points').on('click', function(){
        var event_id = $(this).attr('data-event-id');
        var newPoints = ((parseInt($(this).attr('data-old-points')) + parseInt($(this).attr('data-points'))) * 2);
        $('#progress-'+$(this).attr('data-event-id')).css('width',newPoints+'%');
        if(newPoints < 101){
            $('#progress-'+$(this).attr('data-event-id')).text(newPoints+'%');
        }else{
            $('#progress-'+$(this).attr('data-event-id')).text('100%');
        }
        $(this).attr('data-old-points',parseInt($(this).attr('data-old-points')) + parseInt($(this).attr('data-points')));
        $(this).find('button').attr('class','btn btn-primary').attr('disabled','disabled');
        $(this).remove();
        $.ajax( {
        headers: {
            "Content-type":"application/x-www-form-urlencoded",
        },
		type: "POST",
		url: './addPoints.php',
        data: {
            'user_id': $(this).attr('data-user-id'),
            'event_id': $(this).attr('data-event-id'),
            'points': $(this).attr('data-points'),
        },
		success: function ( data, textStatus, xhr ) {
			console.log(xhr);
		}
	   } );
    });
</script>

<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-links">
                        <ul class="footer-group">
                            <li><a href="./login1.php">Вход</a></li>
                            <li><a href="./register1.php">Регистрация</a></li>
                            <li><a href="./pre-index.php">Регион</li>
                            <li><a href="./memberprofile.php">Моят Профил</a></li>
                        </ul>
                        <p class="text-center">Copyright © 2019 <b>PHP ECO FORCE</b><br>
                        | Crafted with |<br/> | <img class="footer-logo" src="./images/php-logo.png"> | <img class="footer-logo" src="./images/html-logo.png"> | <img class="footer-logo" src="./images/css-logo.png"> | <img class="footer-logo" src="./images/jquery_logo.png"> | </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  </div>
    <script src="js/jquery-3.3.1.min.js"></script>
     <script src="js/jquery-migrate-3.0.1.min.js"></script>
     <script src="js/jquery-ui.js"></script>
     <script src="js/popper.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/jquery.countdown.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/bootstrap-datepicker.min.js"></script>
     <script src="js/aos.js"></script>


     <script src="js/mediaelement-and-player.min.js"></script>

     <script src="js/main.js"></script>
     <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>
</body>
</html>
