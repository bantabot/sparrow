<?php

include 'function.php';
include 'config.php';
include 'jira.php';
include 'dbfunctions.php';



$storyUrl = "https://rsglab.atlassian.net/rest/api/3/issue";
$authUrl = "https://rsglab.atlassian.net/rest/api/3/myself";
$epicUrl= "https://rsglab.atlassian.net/rest/api/2/issue";

$groups = "engineering";


//$response = make_call($storyUrl, $post, $storyDescription, $myAuth);
//$response = create_epic($myAuth);
//$response = auth_check($myAuth);
//$response->print_response();
//var_dump($response);


//$testJiraClass = new Jira;
//
//$testJiraClass->set_jira_auth($username, $password);
//$authdump = $testJiraClass->jira_auth_check();
//
//$testJiraClass->set_epic_postfields($summary, $projectKey, $description);
//$epictime = $testJiraClass->jira_epic_create();
//$testJiraClass->set_story_postfields($storySummary, $projectKey, $storyDescription);
//$storyTime = $testJiraClass->jira_story_create();

$testDBfunctions = new Ticket;
$testDBfunctions->set_dbconn($dbconn);
//$testDBfunctions->get_group_names();

//$testDBfunctions->set_groups($groups);
$testDBfunctions->set_id(72);
$tickets = $testDBfunctions->get_ticket_by_id();
////$tickets = get_tickets($dbconn, $groups);
////
//while ($ticket = $tickets->fetch_object())
//{
//   echo $ticket->title;
//   echo "hello";
//
//}


var_dump($testDBfunctions);

