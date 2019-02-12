<?php


include 'function.php';
include 'model/Ticket.php';
include 'config/config.php';

//---------Define global variables------------
$ticket = new Ticket;
$ticket->set_dbconn($dbconn);

$title = $_POST['ticketTitle'];
$description = $_POST['ticketDescription'];
$groupName = $_POST['group'];
$assignee = $_POST['ticketAssignee'];

if (isset($_POST['id'])) {
    $id = $_POST['ID'];
    $ticket->set_id($id);
    }
else {
    $id = 0;
    }
if (isset($_POST['delete'])){
    $delete = $_POST['delete'];
    }

$ticket->set_ticket($title,$description,$assignee,$groupName);


include 'view/header.php';

?>

    <div class="container">
        <?php

        if (isset($delete)){
            $ticket->delete();
            echo '<p class="text-center">Ticket is deleted</p>';
        }
          elseif ($id>0){
            $ticket->update();
            echo '<p class="text-center">ticket has been updated</p>';
        }
        else {
            $ticket->save();
            echo '<p class="text-center">Ticket Added </p>';
        }
        echo '<p class="text-center"> Click <a href="templateView.php"> here </a> to add another';

        ?>
    </div>
<?php
include 'view/footer.html';?>


