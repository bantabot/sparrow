<?php

include_once 'model/Ticket.php';

$ticket = new Ticket;
$ticket->set_dbconn($dbconn);
$save = false;
$update = false;
$delete = false;

// Check if info is coming from editTicket or addTicket so it can be saved

if(isset($_POST['ticketTitle'])){


    $title = $_POST['ticketTitle'];
    $description = $_POST['ticketDescription'];
    $groupName = $_POST['group'];
    $assignee = $_POST['ticketAssignee'];
    $ticket->set_ticket($title,$description,$assignee,$groupName);


    if (isset($_POST['ID'])) {
        $id = $_POST['ID'];
        $ticket->set_id($id);
        $update = true;
    }
    else {
        $save = true;
    }

    // Check if ticket should be deleted. post variable coming from editTicket.php
    if (isset($_POST['delete'])){

        $delete = true;
    }




    // $updateId is an indicator whether something should be updated after we checked earlier to see if the ID is set
    if ($update){
        $ticket->update();
    }
    if ($save){
        $ticket->save();
    }
    if($delete){
        $ticket->delete();
    }
    }



// Get the id so you can display the right info when arriving to editTicket.php

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $ticket->set_id($id);
    $ticket = $ticket->get_ticket_by_id();
}








?>