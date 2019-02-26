<?php
include_once 'connection.php';


class Logger extends Connection
{

    private $result = null;


    function log_request($managerName, $newhireName, $templateId, $response)
    {

        $con = $this->Open();
        $sql = "INSERT INTO sparrow.epic_logs ( `manager_name`, `newhire_name`, `template_id`, `jira_ticket`,`response_text`) VALUES ( :managerName, :newhireName, :templateId, 'JIRA PLACEHOLDER', :response)";
        $this->result = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY))->execute([':managerName'=> $managerName, ':newhireName'=>$newhireName, ':templateId'=>$templateId, ':response'=>$response]);
        return $this->result;
    }

}