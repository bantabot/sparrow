<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', 'root');
DEFINE ('DB_HOST','127.0.0.1:8889');
DEFINE ('DB_NAME', 'sparrow');

$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

//if (!$dbconn) {
//    echo "Error: Unable to connect to MySQL." . PHP_EOL;
//    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//    exit;
//}
//
//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
//
//mysqli_close($dbconn);