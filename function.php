<?php
include 'requester.php';

//instantiate requester class to be used in make_call




//-------------------Start defining functions----------------------------

function make_call($url, $description, $action, $auth){
    $requester = new Requester;
   $curl = $requester->my_curl_init();
  // $curl = $requester->curl;
    //$curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $action,
        CURLOPT_POSTFIELDS => $description,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic " . $auth . "",
            "Cache-Control: no-cache",
            "Content-Type: application/json",

        ),
    ));

//    $response = curl_exec($curl);
  $response = $requester->my_curl_exec();
    //$err = curl_error($curl);
   $err = $requester->my_curl_error();

    //curl_close($curl);
    $requester->my_curl_close();

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $response;
    }
//    $requester->my_curl_get_response();


}


// create_epic creates the initial epic so all the following tickets can have that parameter
//note this is using v2 of atlassian API there is an issue with v3 where it wouldn't accept a name for the epic https://ecosystem.atlassian.net/browse/ACJIRA-1596

        function create_epic($auth, $newhire)
        {


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://rsglab.atlassian.net/rest/api/2/issue",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\t\"fields\": {\n\n\t\t\"summary\": \"Onboarding for " . $newhire . "\",\n\t\t\"customfield_10009\": \"Onboarding for " . $newhire . "  \",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10000\"\n\n\t\t},\n\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": \"We heavily use Atlassian JIRA at MailChimp as a way to keep track of the different work status and communicate in an asynchronous fashion. This onboarding JIRA series aims at providing guidance around how to organize your time during your onboarding at MailChimp. We encourage you to use the JIRA features to keep track of your progress (via the ticket workflow) and communicate (using JIRA comments with wiki syntax) with your manager and colleagues. Welcome to Mailchimp " . $newhire . "!!!\"\n\n\t}\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic " . $auth . "",
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
                $response = json_decode($response, true);
                return $response;
            }
        }

// auth_check is making sure that the atlassian creds are valid

        function auth_check($auth)
        {

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
                    "Authorization: Basic " . $auth . "",
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

            $description = json_encode($description);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://rsglab.atlassian.net/rest/api/3/issue",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n\t\"fields\": {\n\n\t\t\"summary\": \"" . $title . "\",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10001\"\n\t\t},\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": {\n\t\t\t\"version\": 1,\n\t\t\t\"type\": \"doc\",\n\t\t\t\"content\": [{\n\t\t\t\t\"type\": \"paragraph\",\n\t\t\t\t\"content\": [{\n\t\t\t\t\t\"type\": \"text\",\n\t\t\t\t\t\"text\": " . $description . "\n\t\t\t\t}]\n\t\t\t}]\n\t\t},\n\t\t\"customfield_10008\": \"" . $epic . "\"\n\t}\n}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic " . $auth . "",
                    "Cache-Control: no-cache",
                    "Content-Type: application/json",

                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                $response = "cURL Error #:" . $err;
                return $response;
            } else {
//                $response = json_decode($response, true);
                return $response;
            }
        }

// get tickets from DB based on group_name

        function get_tickets($dbconn, $groups)
        {

            $sql = "SELECT * FROM templates WHERE group_name IN ('$groups') AND visible='true'";
            $result = mysqli_query($dbconn, $sql);
            return $result;
        }
        // get ticket by ID
        function get_tickets_id($dbconn, $id)
        {

            $sql = "SELECT * FROM templates WHERE id=$id AND visible='true'";
            $result = mysqli_query($dbconn, $sql);
            return $result;
        }

        //Get group names
        function get_groups($dbconn)
        {
                    $sql ="SELECT group_name FROM templates GROUP BY group_name";
                    $result = mysqli_query($dbconn, $sql);
            while ($group = $result->fetch_assoc()) {
                $groupArr[] = $group;
            }

                    return $groupArr;
        }

// save a new ticket to DB

        function save($title, $description, $groupName, $assignee, $dbconn)
        {
            $sql = "INSERT INTO templates (`title`, `description`, `group_name`, `assignee`) VALUES ('$title', '$description', '$groupName', '$assignee')";
            if (mysqli_query($dbconn, $sql)) {
                return "New template created!";
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($dbconn);
            }


        }

        //Update an existing ticket
        function update($title, $description, $groupName, $assignee, $id, $dbconn)
        {
            $sql = "UPDATE `templates` SET `title` = '$title', `description` = '$description', `group_name`='$groupName', `assignee`= '$assignee' WHERE `templates`.`id` = $id";
            if (mysqli_query($dbconn, $sql)) {
                return "Template Updated";
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($dbconn);
            }


        }
        //Delete ticket
        function delete($id, $dbconn)
        {
            $sql = "UPDATE `templates` SET `visible`= 'false' WHERE `templates`.`id` = $id";
            if (mysqli_query($dbconn, $sql)) {
                return "Template Deleted";
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($dbconn);
            }


        }

        // Log actions to error table

        function log_request($managerName, $newhireName, $templateId, $jiraTicket, $response, $dbconn){
            $sql = "INSERT INTO `epic_logs` ( `manager_name`, `newhire_name`, `template_id`, `jira_ticket`, `response_text`) VALUES ('$managerName', '$newhireName', '$templateId', '$jiraTicket', '$response')";
            if (mysqli_query($dbconn, $sql)) {
                 $logResponse = "Event Logged";

            } else {
                $logResponse= "Error: " . $sql . "<br>" . mysqli_error($dbconn);
            }
            return $logResponse;
        }


//-------------------------End of defining functions



