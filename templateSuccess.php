<?php

include 'mysql_connection.php';
include 'function.php';

//---------Define global variables------------

$title = $_POST['ticketTitle'];
$description = $_POST['ticketDescription'];
$groupName = $_POST['group'];
$assignee = $_POST['ticketAssignee'];
$id = $_POST['ID'];
$delete = $_POST['delete'];




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
<!------------------Begin Header------------------>

    <div class="jumbotron jumbotron-fluid" style="background-color: #ffe01b;">
        <div class="container-fluid text-center">
            <h1>Sparrow</h1>
            <p class="lead">All Aboard, your first mate to make onboarding a little bit lighter</p>
        </div>
    </div>

<!------------------End Header------------------>

    <div class="container">
        <?php

        if (isset($delete)){
            $delete = $delete($id, $dbconn);
            echo '<p class="text-center">' . $delete . ' </p>';
        }
          elseif (isset($id)){
            $update = update($title, $description, $groupName, $assignee, $id, $dbconn);
            echo '<p class="text-center">' . $update . ' </p>';
        }
        else {
            $saveMessage = save($title, $description, $groupName, $assignee, $dbconn);
            echo '<p class="text-center">' . $saveMessage . ' </p>';
        }
        echo '<p class="text-center"> Click <a href="ticketTemplate.php"> here </a> to add another';

        ?>
    </div>

<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>


