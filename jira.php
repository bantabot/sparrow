<?php

include_once 'requester.php';


class jira extends Requester
{
    private $url = "";
    private $action = "";
    private $epicPostfields = null;
    private $storyPostfields = null;
    private $postfields = null;
    private $auth = "";
    private $authCheckResponse = null;
    private $epicCreateResponse = null;
    private $storyCreateResponse = null;
    private $isAuth = false;
    private $username = "";
    private $password = "";
    private $response = null;

    
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
        $this->username = $username;
        $this->password = $password;
        $this->auth = $username . ":" . $password;
        $this->auth = base64_encode($this->auth);
        return $this->auth;

    }

    function set_epic_postfields($summary, $projectKey, $description)
    {
        $this->epicPostfields = "{\n\t\"fields\": {\n\n\t\t\"summary\": \"".$summary."\",\n\t\t\"customfield_10009\": \"".$summary."  \",\n\t\t\"issuetype\": {\n\t\t\t\"id\": \"10000\"\n\n\t\t},\n\n\t\t\"project\": {\n\t\t\t\"key\": \"".$projectKey."\"\n\n\t\t},\n\t\t\"description\": \"".$description."\"\n\n\t}\n}";
        return $this->epicPostfields;


    }

    function set_story_postfields($summary, $projectKey, $description)
    {
        $description = json_encode($description);
        $epicKey = $this->epicCreateResponse['key'];
        $this->storyPostfields = "{\"fields\": {\"summary\": \"".$summary."\", \"issuetype\": {\"id\": \"10001\"},\"project\": {\"key\": \"".$projectKey."\"},\"description\": ".$description.",\"customfield_10008\": \"".$epicKey."\"}}";
        return $this->storyPostfields;


    }

    function get_isAuth()
    {
        return $this->isAuth;
    }

    function get_epic_key()
    {
        return $this->epicCreateResponse['key'];
    }
    

    function make_jira_call()
    {
        $this->my_curl_init();
        $this->setop_array_builder($this->url, $this->action, $this->postfields, $this->auth);
        $this->my_curl_setop_array();
        $this->my_curl_exec();
        $this->my_curl_error();
        $this->my_curl_close();
      // I think I should take this out and move it to another method. This is to be more explicit
        return $this->get_response();


    }




    function jira_auth_check()
    {
        $this->url = "https://jira.mailchimp.com/rest/api/latest/myself";
        $this->action = "GET";
        $this->postfields = "";
        $this->authCheckResponse = $this->make_jira_call();
        $this->authCheckResponse  = json_decode($this->authCheckResponse, true);
        if ($this->authCheckResponse['name'] == $this->username)
        {
            $this->isAuth = true;
        }
        return $this->authCheckResponse;
    }


    function jira_epic_create()
    {
        $this->url  = "https://jira.mailchimp.com/rest/api/latest/issue";
        $this->action = "POST";
        $this->postfields = $this->epicPostfields;

        if(isset($this->postfields) && $this->isAuth)
        {
            $this->epicCreateResponse = $this->make_jira_call();
            $this->epicCreateResponse = json_decode($this->get_response(), true);
            return $this->epicCreateResponse;
         }
         elseif (!isset($this->postfields))
             {
                 //return some error that
                 $this->epicCreateResponse = "must have postfields set";
                 return $this->epicCreateResponse;
             }
             else
             {
                 $this->epicCreateResponse = "Check authentication credentials";
                 return $this->epicCreateResponse;
             }
    }

    function jira_story_create()
    {
        $this->url = "https://jira.mailchimp.com/rest/api/latest/issue";
        $this->action = "POST";
        $this->postfields = $this->storyPostfields;

        if(isset($this->postfields) && isset($this->epicCreateResponse['key']))
        {
            $this->storyCreateResponse = $this->make_jira_call();
            $this->storyCreateResponse = json_decode($this->get_response(), true);
            return $this->storyCreateResponse;
        }
        elseif(!isset($this->postfields))
        {
            //return some error that
            $this->storyCreateResponse = "must have postfields set";
            return $this->storyCreateResponse;
        }
        else
        {
            $this->storyCreateResponse = "must have an epic key set";
        }
    }

}



?>