<?php

include 'mysql_connection.php';

$title = $_POST['ticketTitle'];
$description = $_POST['ticketDescription'];
$groupName = $_POST['group'];
$assignee = $_POST['ticketAssignee'];


//write ticket to template table
function save($title, $description, $groupName, $assignee, $dbconn){
    $sql = "INSERT INTO templates (`title`, `description`, `group_name`, `assignee`) VALUES ('$title', '$description', '$groupName', '$assignee')";
    if (mysqli_query($dbconn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
    }
mysqli_close($dbconn);

}
save($title, $description, $groupName, $assignee, $dbconn);


//echo $saveError;