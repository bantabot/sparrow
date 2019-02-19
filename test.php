<?php


include 'config/config.php';
include 'jira.php';
include 'model/TicketGroup.php';
require 'vendor/autoload.php';






$group = new TicketGroup;
$group->set_dbconn($dbconn);

$parentId = $group->set_group_family(3);

var_dump($parentId);

