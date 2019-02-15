<?php

include_once 'config/config.php';
include 'model/TicketGroup.php';

//might not need to Ticket model here


$groups = new TicketGroup;
$groups->set_dbconn($dbconn);
$groups = $groups->get_all_groups();




?>