<?php

include_once '../config/config.php';
include '../model/TicketGroup.php';




$groups = new TicketGroup;
$groups->set_dbconn($dbconn);
$groups = $groups->get_all_groups();






?>