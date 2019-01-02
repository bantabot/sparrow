<?php

include 'function.php';
include 'config.php';



$storyUrl = "https://rsglab.atlassian.net/rest/api/3/issue";
$authUrl = "https://rsglab.atlassian.net/rest/api/3/myself";
$epicUrl= "https://rsglab.atlassian.net/rest/api/2/issue";

$storyDescription = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"testing file\",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10001\"\n\t\t},\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": {\n\t\t\t\"version\": 1,\n\t\t\t\"type\": \"doc\",\n\t\t\t\"content\": [{\n\t\t\t\t\"type\": \"paragraph\",\n\t\t\t\t\"content\": [{\n\t\t\t\t\t\"type\": \"text\",\n\t\t\t\t\t\"text\":  \"Test\"\n\t\t\t\t}]\n\t\t\t}]\n\t\t}\n\t\t\n\t}\n}";
$epicDescription = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"Onboarding for  Ali\",\n\t\t\"customfield_10009\": \"Onboarding for  Ali  \",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10000\"\n\n\t\t},\n\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": \"We heavily use Atlassian JIRA at MailChimp as a way to keep track of the different work status and communicate in an asynchronous fashion. This onboarding JIRA series aims at providing guidance around how to organize your time during your onboarding at MailChimp. We encourage you to use the JIRA features to keep track of your progress (via the ticket workflow) and communicate (using JIRA comments with wiki syntax) with your manager and colleagues. Welcome to Mailchimp  Ali!!!\"\n\n\t}\n}";
$authDescription = "";

$get = "GET";
$post = "POST";


//$response = make_call($storyUrl, $post, $storyDescription, $myAuth);
//$response = create_epic($myAuth);
$response = auth_check($myAuth);
//$response->print_response();
var_dump($response);
