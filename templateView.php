<?php

include 'mysql_connection.php';
include 'function.php';
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        h1 {
            font-family: Georgia, "Times New Roman", Times, serif;
        }
    </style>

    <title>Sparrow</title>
</head>

<body>
<!------------------Begin Header------------------->

<div class="jumbotron jumbotron-fluid" style="background-color: #ffe01b;">
    <div class="container-fluid text-center">
        <h1>Sparrow</h1>
        <p class="lead">All Aboard, your first mate to make onboarding a little bit lighter</p>
    </div>
</div>

<!-------------------End Header--------------------->

<!-------------------Begin Error Message--------------------->

<div>
    <div class="container-fluid text-center">




        <?php
        $groups = get_groups($dbconn);
        var_dump($groups->fetch_object());
        foreach ($groups as $group){
            echo ' <div class="form-check">';
            echo '<input type="checkbox" class="form-check-input" id="group">';
           echo '<label class="form-check-label" for="group">'.$group.'</label>  </div>';
        }

        ?>


    </div>
</div>

<!-------------------End Error Message--------------------->

</body>
</html>
