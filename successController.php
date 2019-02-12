<?php

include 'config/config.php';
include 'function.php';
include 'jira.php';
include 'model/Logger.php';
include 'model/Ticket.php';


// ---------------Define variables  ----------------------------


//get username and password and encode it to use in API calls

//
//$username = $username;
//$password = $password;
$managerName = $_POST['managerName'];
$newhire = $_POST['newHire'];

$jiraClass = new Jira ;

$description = "We heavily use Atlassian JIRA at MailChimp as a way to keep track of the different work status and communicate in an asynchronous fashion. This onboarding JIRA series aims at providing guidance around how to organize your time during your onboarding at MailChimp. We encourage you to use the JIRA features to keep track of your progress (via the ticket workflow) and communicate (using JIRA comments with wiki syntax) with your manager and colleagues. Welcome to Mailchimp  ".$newhire."!!!";
$summary = "Onboarding for  ".$newhire;


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



$jiraClass->set_epic_postfields($summary, $projectKey, $description);
$epic = $jiraClass->jira_epic_create();

$tickets = get_tickets($dbconn, $groups);
$logger = new Logger;
$logger->set_dbconn($dbconn);


while ($ticket = $tickets->fetch_object())
{
    $jiraClass->set_story_postfields($ticket->title, $projectKey,$ticket->description);
    $story_log = $jiraClass->jira_story_create();
    $story_log = json_encode($story_log);
    $story_log = mysqli_real_escape_string($dbconn, $story_log);
    $log = $logger->log_request($managerName, $newhire, $ticket->id, $story_log);

}

if (!$jiraClass->get_isAuth())
{
    //redirect to error page
    header('Location: view/error.php');
}
else
{
    $epicKey = $jiraClass->get_epic_key();
    header('Location: success.php?key='.$epicKey);
}

