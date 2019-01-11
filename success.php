<?php

include 'mysql_connection.php';
include 'config.php';
include 'function.php';
include 'jira.php';


// ---------------Define variables  ----------------------------


//get username and password and encode it to use in API calls
$auth = $_POST['username'] . ":" . $_POST['password'];
$auth = base64_encode($auth);

$username = $_POST['username'];
$password = $_POST['password'];


$managerName = $_POST['managerName'];
$newhire = $_POST['newHire'];

$jiraClass = new Jira ;


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
$jiraClass->set_jira_auth($username, $password);

$authCheck = $jiraClass->jira_auth_check();

if (!$jiraClass->get_isAuth())
    {
         //redirect to error page
    header('Location: error.php');
    }

$jiraClass->set_epic_postfields($summary, $projectKey, $description);
$epic = $jiraClass->jira_epic_create();

$tickets = get_tickets($dbconn, $groups);
$epicKey = $jiraClass->get_epic_key();
$epicLink = "https://rsglab.atlassian.net/browse/".$epicKey;


while ($ticket = $tickets->fetch_object())
{
    $jiraClass->set_story_postfields($ticket->title, $projectKey,$ticket->description);
    $story_log = $jiraClass->jira_story_create();
    $story_log = json_encode($story_log);
    $story_log = mysqli_real_escape_string($dbconn, $story_log);
//    var_dump($story_log);
    $log = log_request($managerName, $newhire, $ticket->id, $story_log, $dbconn );

}


?>
<?php

include 'view/header.php';

?>


<!------------------Success Response with Epic Link------------------>
    <div class="container text-center">

        <?php echo '<p class="text-center">Awesome '.$managerName.'! </p>';
              echo '<p> Next step is to check out what tasks await</p>';
              echo '<p>Here is your brand new shiny epic: <a href="' . $epicLink . '">'.$epicLink.'</a> </p>';

              ?>

        <iframe src="https://giphy.com/embed/3o6fJ2bdNfhd6e144w" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/mailchimp-high-five-3o6fJ2bdNfhd6e144w"></a></p>

    </div>
<?php
include 'view/footer.html';?>
