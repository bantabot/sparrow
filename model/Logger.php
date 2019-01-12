<?php



class Logger
{
    private $dbconn = null;
    private $result = null;

    function set_dbconn($dbconn)
    {
        $this->dbconn = $dbconn;
    }
    function log_request($managerName, $newhireName, $templateId, $response)
    {
        $sql = "INSERT INTO `epic_logs` ( `manager_name`, `newhire_name`, `template_id`, `jira_ticket`,`response_text`) VALUES ('$managerName', '$newhireName', '$templateId', 'JIRA PLACEHOLDER','$response')";
        $this->result = mysqli_query($this->dbconn, $sql);
        return $this->result;
    }

}