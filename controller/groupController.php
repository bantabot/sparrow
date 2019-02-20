<?php

include_once '../config/config.php';
include '../model/TicketGroup.php';




$groups = new TicketGroup;
$groups->set_dbconn($dbconn);



if (isset($_POST['group']))
    {
        $groupId = $_POST['group'];
        $groupFamily = $groups->set_group_family($groupId);
        $groupFamily = implode("', '", $groupFamily);
    }

$groups = $groups->get_all_groups();



?>