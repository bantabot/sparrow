<?php



//-------------------Start defining functions----------------------------


// create_epic creates the initial epic so all the following tickets can have that parameter
//note this is using v2 of atlassian API there is an issue with v3 where it wouldn't accept a name for the epic https://ecosystem.atlassian.net/browse/ACJIRA-1596

function create_epic($auth, $newhire){


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://rsglab.atlassian.net/rest/api/2/issue",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n\t\"fields\": {\n\n\t\t\"summary\": \"Onboarding for ".$newhire."\",\n\t\t\"customfield_10009\": \"Onboarding for ".$newhire."  \",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10000\"\n\n\t\t},\n\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": \"We heavily use Atlassian JIRA at MailChimp as a way to keep track of the different work status and communicate in an asynchronous fashion. This onboarding JIRA series aims at providing guidance around how to organize your time during your onboarding at MailChimp. We encourage you to use the JIRA features to keep track of your progress (via the ticket workflow) and communicate (using JIRA comments with wiki syntax) with your manager and colleagues. Welcome to Mailchimp ".$newhire."!!!\"\n\n\t}\n}",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$auth."",
        "Cache-Control: no-cache",
        "Content-Type: application/json",
        "Postman-Token: bf411a5f-07e5-40cb-b143-6c8d9c4a66ab"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $response =  json_decode($response, true);
    return $response;
}
}

// auth_check is making sure that the atlassian creds are valid
function auth_check($auth){

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://rsglab.atlassian.net/rest/api/3/myself",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$auth."",
        "Cache-Control: no-cache",

    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    return false;
} else {
    return true;
}

}

//create_story will be used to create a story for each ticket
//not using batch creation in order to use a foreach for each ticket later

function create_story($auth, $title, $description, $epic)
{

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://rsglab.atlassian.net/rest/api/3/issue",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n\t\"fields\": {\n\n\t\t\"summary\": \"".$title."\",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10001\"\n\t\t},\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": {\n\t\t\t\"version\": 1,\n\t\t\t\"type\": \"doc\",\n\t\t\t\"content\": [{\n\t\t\t\t\"type\": \"paragraph\",\n\t\t\t\t\"content\": [{\n\t\t\t\t\t\"type\": \"text\",\n\t\t\t\t\t\"text\": \"".$description."\"\n\t\t\t\t}]\n\t\t\t}]\n\t\t},\n\t\t\"customfield_10008\": \"".$epic."\"\n\t}\n}",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic ".$auth."",
        "Cache-Control: no-cache",
        "Content-Type: application/json",

    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    return $response;
}
}

// get tickets from DB
// SELECT * FROM `sparrow` WHERE `group` IN $groups


function get_tickets($dbconn, $groups){

    $sql = "SELECT * FROM templates WHERE group_name IN ('$groups')";
    $result = mysqli_query($dbconn, $sql);

    return $result;


    mysqli_close($dbconn);


}

//-------------------------End of defining functions



