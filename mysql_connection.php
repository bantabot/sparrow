<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', 'root');
DEFINE ('DB_HOST','127.0.0.1:8889');
DEFINE ('DB_NAME', 'sparrow');

$dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

//hi again