<?php

include 'mysql_connection.php';
include 'function.php';

//Get POST variables

$groups = [];
foreach ($_POST as $key => $value){
    $groups[] = $key;
}
$groups = implode("', '", $groups);
$tickets = get_tickets($dbconn, $groups);
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


        <form action="ticketView.php" method="post">

            <?php


            while ($ticket = $tickets->fetch_object()) {
                echo '<div class="card">';
                echo '<div class="card-body"> <h5 class="card-title">'. $ticket->title.'</h5>';
               echo '<p class="card-text">'. $ticket->description.'</p>';
               echo '<a class="card-link" href="editTicket.php?id='.$ticket->id.'">Edit Ticket</a>';
               echo '</div> </div>';

            }

            ?>
            <button type="submit" class="btn btn-primary">Magic Time</button>
        </form>


    </div>
</div>

<!-------------------End Error Message--------------------->

</body>
</html>
