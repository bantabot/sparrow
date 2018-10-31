<?php

include 'mysql_connection.php';
include 'function.php';


// ---------------Define variables  ----------------------------
//get username and password and encode it to use in API calls
$auth = $_POST['username'] . ":" . $_POST['password'];
$auth = base64_encode($auth);

$managerName = $_POST['managerName'];
$newhire = $_POST['newHire'];
$startDate = $_POST['startDate'];


//Set group to have at least the engineering group
$groups = ['engineering'];

//depending on the value from the form, this may need more tickets to be added

switch ($_POST['group']){
    case 'Development':
        $groups[]= 'development';
        break;
    case 'Front-End':
        $groups[]= 'front-end';
        $groups[] = 'development';
        break;
    case 'ops':
        $groups[] = 'ops';
}

//implode $groups to get ready to be used in a query
$groups = implode("', '", $groups);

// -----------------------end of grabbing global variables-----------------------

//     if the authentication check passes, use credentials to create tickets
if ($auth == true){
    $epic = create_epic($auth, $newhire);
    $epic = $epic['key'];

}
else {
    echo "bad creds";
}

$tickets= get_tickets($dbconn, $groups);


while($ticket = $tickets->fetch_object()){
    $story_log= create_story($auth, $ticket->title, $ticket->description, $epic);
}

$epicLink = "https://rsglab.atlassian.net/browse/".$epic;

?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container-fluid text-center">
        <h1>Sparrow</h1>
        <p class="lead">All Aboard, your first mate to make onboarding a little bit lighter</p>
    </div>
</div>
<div class="container">
    <?php
    echo '<p class="text-center">Great! Click <a href="'.$epicLink.'">Here</a> to get started </p>';
    ?>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

</body>
</html>

