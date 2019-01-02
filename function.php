<?php
include 'requester.php';

//instantiate requester class to be used in make_call




//-------------------Start defining functions----------------------------


        function make_call($url, $action, $description, $auth)
        {
            $requester = new Requester;
            $requester->my_curl_init();
            $requester->setop_array_builder($url, $action, $description, $auth);
            $requester->my_curl_setop_array();
            $requester->my_curl_exec();
            $requester->my_curl_error();
            $requester->my_curl_close();
            $requester->my_curl_get_response();
            return $requester;
        }


// create_epic creates the initial epic so all the following tickets can have that parameter
//note this is using v2 of atlassian API there is an issue with v3 where it wouldn't accept a name for the epic https://ecosystem.atlassian.net/browse/ACJIRA-1596

        function create_epic($auth)
        {
            $description = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"Onboarding for  Ali\",\n\t\t\"customfield_10009\": \"Onboarding for  Ali  \",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10000\"\n\n\t\t},\n\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": \"We heavily use Atlassian JIRA at MailChimp as a way to keep track of the different work status and communicate in an asynchronous fashion. This onboarding JIRA series aims at providing guidance around how to organize your time during your onboarding at MailChimp. We encourage you to use the JIRA features to keep track of your progress (via the ticket workflow) and communicate (using JIRA comments with wiki syntax) with your manager and colleagues. Welcome to Mailchimp  Ali!!!\"\n\n\t}\n}";

            $url = "https://rsglab.atlassian.net/rest/api/2/issue";
            $post = "POST";

            $response = make_call($url, $post, $description, $auth);
            $response = json_decode($response->get_response(), true);
            return $response;



        }


// auth_check is making sure that the atlassian creds are valid

        function auth_check($auth)
        {
            $url = "https://rsglab.atlassian.net/rest/api/3/myself";
            $action = "GET";
            $description = "";
            $response = make_call($url, $action, $description, $auth);
            $response = json_decode($response->get_response(), true);
            return $response;

        }

//create_story will be used to create a story for each ticket
//not using batch creation in order to use a foreach for each ticket later


        function create_story($auth, $title, $description, $epic)
        {

            $description = json_encode($description);
            $postfields = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"" . $title . "\",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10001\"\n\t\t},\n\t\t\"project\": {\n\t\t\t\"key\": \"DC\"\n\n\t\t},\n\t\t\"description\": {\n\t\t\t\"version\": 1,\n\t\t\t\"type\": \"doc\",\n\t\t\t\"content\": [{\n\t\t\t\t\"type\": \"paragraph\",\n\t\t\t\t\"content\": [{\n\t\t\t\t\t\"type\": \"text\",\n\t\t\t\t\t\"text\": " . $description . "\n\t\t\t\t}]\n\t\t\t}]\n\t\t},\n\t\t\"customfield_10008\": \"" . $epic . "\"\n\t}\n}";
            $url = "https://rsglab.atlassian.net/rest/api/3/issue";
            $post = "POST";
            $response = make_call($url, $post, $postfields, $auth);
            return $response;


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

        function log_request($managerName, $newhireName, $templateId, $response, $dbconn){
            $sql = "INSERT INTO `epic_logs` ( `manager_name`, `newhire_name`, `template_id`, `jira_ticket`,`response_text`) VALUES ('$managerName', '$newhireName', '$templateId', 'JIRA PLACEHOLDER','$response')";
            if (mysqli_query($dbconn, $sql)) {
                 $logResponse = "Event Logged";

            } else {
                $logResponse= "Error: " . $sql . "<br>" . mysqli_error($dbconn);
            }
            return $logResponse;
        }


//-------------------------End of defining functions
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


