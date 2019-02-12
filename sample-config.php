<?php
// username and password for bot jira credentials
$username = "";
$password = "";


//set DB connection constants
DEFINE ('DB_USER', '');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST','');
DEFINE ('DB_NAME', '');

$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);