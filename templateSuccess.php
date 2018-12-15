<?php

include 'mysql_connection.php';
include 'function.php';

//---------Define global variables------------

$title = mysqli_real_escape_string($dbconn,$_POST['ticketTitle']);
$description = mysqli_real_escape_string($dbconn, $_POST['ticketDescription'] );
$groupName = mysqli_real_escape_string($dbconn, $_POST['group']);
$assignee = mysqli_real_escape_string($dbconn,$_POST['ticketAssignee']);
$id = $_POST['ID'];
$delete = $_POST['delete'];

include 'view/header.php';

?>

    <div class="container">
        <?php

        if (isset($delete)){
            $delete = $delete($id, $dbconn);
            echo '<p class="text-center">' . $delete . ' </p>';
        }
          elseif ($id>0){
            $update = update($title, $description, $groupName, $assignee, $id, $dbconn);
            echo '<p class="text-center">' . $update . ' </p>';
        }
        else {
            $saveMessage = save($title, $description, $groupName, $assignee, $dbconn);
            echo '<p class="text-center">' . $saveMessage . ' </p>';
        }
        echo '<p class="text-center"> Click <a href="templateView.php"> here </a> to add another';

        ?>
    </div>
<?php
include 'view/footer.html';?>


