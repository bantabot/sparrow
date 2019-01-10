<?php


class jira extends requester
{
    private $url = null;
    private $action = null;
    private $postfields = null;
    private $auth = null;
    private $authCheckResponse = null;
    private $epicCreateResponse = null;
    private $storyCreateResponse = null;
    
    function set_jira_url()
    {
        return $this->url;
    }
    
    function set_jira_action()
    {
        return $this->action;
    }
    
    function set_jira_postfields()
    {
        return $this->postfields;
    }
    
    function set_jira_auth($username, $password)
    {
        $this->auth = $username . ":" . $password;
        $this->auth = base64_encode($this->auth);
        return $this->auth;

    }

    function set_epic_postfields($summary, $projectKey, $description)
    {
        $this->postfields = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"".$summary."\",\n\t\t\"customfield_10009\": \"".$summary."  \",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10000\"\n\n\t\t},\n\n\t\t\"project\": {\n\t\t\t\"key\": \"".$projectKey."\"\n\n\t\t},\n\t\t\"description\": \"".$description."\"\n\n\t}\n}";
        return $this->postfields;


    }

    function set_story_postfields($summary, $projectKey, $description)
    {
        $description = json_encode($description);
        $epicKey = $this->epicCreateResponse['key'];

        $this->postfields = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"" . $summary . "\",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10001\"\n\t\t},\n\t\t\"project\": {\n\t\t\t\"key\": \"$projectKey\"\n\n\t\t},\n\t\t\"description\": {\n\t\t\t\"version\": 1,\n\t\t\t\"type\": \"doc\",\n\t\t\t\"content\": [{\n\t\t\t\t\"type\": \"paragraph\",\n\t\t\t\t\"content\": [{\n\t\t\t\t\t\"type\": \"text\",\n\t\t\t\t\t\"text\": " . $description . "\n\t\t\t\t}]\n\t\t\t}]\n\t\t},\n\t\t\"customfield_10008\": \"" . $epicKey . "\"\n\t}\n}";
        return $this->postfields;


    }
    

    function make_jira_call()
    {
        $this->my_curl_init();
        $this->setop_array_builder($this->url, $this->action, $this->postfields, $this->auth);
        $this->my_curl_setop_array();
        $this->my_curl_exec();
        $this->my_curl_error();
        $this->my_curl_close();
      // I think I should take this out and move it to another method. This is to be more explicit  $this->my_curl_get_response();
        return $this;

    }



    function jira_auth_check()
    {
        $this->url = "https://rsglab.atlassian.net/rest/api/3/myself";
        $this->action = "GET";
        $this->postfields = "";
        $this->authChekcResponse = $this->make_jira_call();
        $this->authChekcResponse  = json_decode($this->get_response(), true);
        return $this->authCheckResponse;

    }

    function jira_epic_create()
    {
        $this->url  = "https://rsglab.atlassian.net/rest/api/2/issue";
        $this->action = "POST";

        if($this->postfields)
        {
            $this->epicCreateResponse = $this->make_jira_call();
            $this->epicCreateResponse = json_decode($this->get_response(), true);
            return $this->epicCreateResponse;
         }
         else
             {
                 //return some error that
                 $this->epicCreateResponse = "must have postfields set";
                 return $this->epicCreateResponse;
             }
    }

    function jira_story_create()
    {
        $this->url = "https://rsglab.atlassian.net/rest/api/3/issue";
        $this->action = "POST";

        if($this->postfields)
        {
            $this->storyCreateResponse = $this->make_jira_call();
            $this->storyCreateResponse = json_decode($this->get_response(), true);
            return $this->storyCreateResponse;
        }
        else
        {
            //return some error that
            $this->storyCreateResponse = "must have postfields set";
            return $this->storyCreateResponse;
        }
    }

}



?>