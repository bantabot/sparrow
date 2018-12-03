<?php

include 'mysql_connection.php';
include 'function.php';


// ---------------Define variables  ----------------------------


//get username and password and encode it to use in API calls
$auth = $_POST['username'] . ":" . $_POST['password'];
$auth = base64_encode($auth);

$managerName = $_POST['managerName'];
$newhire = $_POST['newHire'];


//Set group to have at least the engineering group
$groups = ['engineering'];

//depending on the value from the form, this may need more tickets to be added

switch ($_POST['group']) {
    case 'Development':
        $groups[] = 'development';
        break;
    case 'Front-End':
        $groups[] = 'front-end';
        $groups[] = 'development';
        break;
    case 'ops':
        $groups[] = 'ops';
        break;
}

//implode $groups to get ready to be used in a query
$groups = implode("', '", $groups);

// -----------------------end of grabbing global variables-----------------------



// Check auth creds
$authCheck = auth_check($auth);

// if username works then create epic
if ($authCheck == true) {
    $epic = create_epic($auth, $newhire);
    $epic = $epic['key'];

} else {
    $epic = false;
}

// if the epic has been created then go to create tickets

if ($epic != false){

    $tickets = get_tickets($dbconn, $groups);


    while ($ticket = $tickets->fetch_object()) {
        $story_log = create_story($auth, $ticket->title, $ticket->description, $epic);
    }

    $epicLink = "https://rsglab.atlassian.net/browse/" . $epic;
}

else{
    //redirect to error page
    header('Location: error.php');

}

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

<!------------------Success Response with Epic Link------------------>
    <div class="container text-center">

        <?php echo '<p class="text-center">Awesome '.$managerName.'! </p>';
              echo '<p> Next step is to check out what tasks await</p>';
              echo '<p>Here is your brand new shiny epic: <a href="' . $epicLink . '">'.$epicLink.'</a> </p>'; ?>

        <iframe src="https://giphy.com/embed/3o6fJ2bdNfhd6e144w" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/mailchimp-high-five-3o6fJ2bdNfhd6e144w"></a></p>

    </div>

<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>

