<!DOCTYPE html>
<html lang="bg">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./js/jquery.js" charset="utf-8"></script>
    <title>Сайт за добрини</title>
    <style>
        area {
            cursor: copy;
        }
    </style>
</head>
<body>
    <?php include 'includes/getLocations.php'; ?>
    <h2 class="text-center">Избери локация от картата</h2>
    <center>
        <img src="./images/bg_map2.jpg" usemap="#image-map">
    </center>
    <map name="image-map">
        <?php $locations = getLocations();
        foreach($locations as $key => $location){
            if($location == 'Враца'){
                echo '<area target="" alt="vraca" title="Враца" href="index.php?location='.$key.'" coords="126,175,147,174,162,176,167,165,168,157,165,150,165,141,165,129,172,124,170,116,171,106,177,100,185,99,195,95,172,87,164,87,155,84,148,81,142,81,137,98,135,104,143,113,133,121,122,122,118,132,115,138,114,146"
                    shape="poly">';
            }

            if($location == 'София'){
                echo '<area target="" alt="sofiq" title="София" href="index.php?location='.$key.'" coords="48,197,75,215,91,232,97,246,98,255,99,264,101,276,122,293,136,286,152,275,157,267,156,258,152,237,170,243,186,234,210,240,187,221,176,213,177,200,169,190,161,188,140,184,127,186,110,181,113,173,106,167,92,169,71,171,76,166"
                    shape="poly">';
            }
        }
        ?>
    </map>
</body>

</html>
