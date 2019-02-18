<?php


include 'config/config.php';
include 'jira.php';
include 'model/TicketGroup.php';
//include 'dbfunctions.php';
require 'vendor/autoload.php';
//use vendor\GuzzleHttp\Client;
//use vendor\GuzzleHttp\Psr7\Request;





$group = new TicketGroup;
$group->set_dbconn($dbconn);

$parentId = $group->set_group_family(3);

var_dump($parentId);

