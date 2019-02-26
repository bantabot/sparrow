<?php

//include_once '../config/config.php';
include_once '../model/TicketGroup.php';




$groups = new TicketGroup;




if (isset($_POST['group']))
    {
        $groupId = $_POST['group'];
        $groupFamily = $groups->set_group_family($groupId);
        $groupFamily = array_keys($groupFamily);
//        $groupFamily = implode("', '", $groupFamily);
    }
    if (isset($_POST['newGroup'])){

    $parentId = $_POST['parentGroup'] != 0 ? $_POST['parentGroup'] : null;
    $groupName = $_POST['newGroup'];
    $saveGroup = $groups->save($groupName, $parentId);
    $groupName = $groups->get_id();
    }

$groups = $groups->pdo_get_all_groups();



?>
