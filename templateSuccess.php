<?php



include 'model/Ticket.php';
include 'config/config.php';
include 'view/header.php';
include 'ticketController.php';
//---------Define global variables------------
//$ticket = new Ticket;
//$ticket->set_dbconn($dbconn);
//
//$title = $_POST['ticketTitle'];
//$description = $_POST['ticketDescription'];
//$groupName = $_POST['group'];
//$assignee = $_POST['ticketAssignee'];
//
//if (isset($_POST['ID'])) {
//    $id = $_POST['ID'];
//    $ticket->set_id($id);
//    }
//else {
//    $id = 0;
//    }
//if (isset($_POST['delete'])){
//    $delete = $_POST['delete'];
//    }
//
//$ticket->set_ticket($title,$description,$assignee,$groupName);

//var_dump($title,$description,$assignee,$groupName);


?>

    <div class="container">
        <?php

        if ($delete){
            echo '<p class="text-center">Ticket is deleted</p>';
        }
          elseif ($update){

            echo '<p class="text-center">ticket has been updated</p>';
        }
        elseif ($save) {

            echo '<p class="text-center">Ticket Added </p>';
        }
        else{
            echo '<p class="text-center">Try Again!</p>';

        }
        echo '<p class="text-center"> Click <a href="templateView.php"> here </a> to add another';

        ?>
    </div>
<?php
include 'view/footer.html';?>


