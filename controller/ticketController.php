<?php

include_once '../model/Ticket.php';

$ticket = new Ticket;
$ticket->set_dbconn($dbconn);
$save = false;
$update = false;
$delete = false;
$view = false;

// Check if info is coming from editTicket or addTicket so it can be saved

if(isset($_POST['ticketTitle'])) {


    $title = $_POST['ticketTitle'];
    $description = $_POST['ticketDescription'];
    $groupName = $_POST['group'];
    $assignee = $_POST['ticketAssignee'];
    $ticket->set_ticket($title, $description, $assignee, $groupName);


    if (isset($_POST['ID'])) {
        $id = $_POST['ID'];
        $ticket->set_id($id);
        $update = true;
    } else {
        $save = true;
    }

    // Check if ticket should be deleted. post variable coming from editTicket.php
    if (isset($_POST['delete'])) {

        $delete = true;
    }

}


if (isset($_POST['action'])) {
    if ($_POST['action']=='view'){
        $view = true;
    }

    if ($view){
        $groups = [];
        foreach ($_POST as $key => $value){
            $groups[] = $value;
        }
        $groups = implode("', '", $groups);
        $ticket->set_groups($groups);
        $tickets = $ticket->get_ticket_by_group();
    }

    elseif ($update) {
        $ticket->update();
    }
    elseif ($save) {
        $ticket->save();
    }
    elseif ($delete) {
        $ticket->delete();
    }
}



// Get the id so you can display the right info when arriving to editTicket.php

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $ticket->set_id($id);
    $tickets = $ticket->get_ticket_by_id();
    $ticketTitle = $ticket->get_title();
    $ticketDescription = $ticket->get_description();
    $ticketAssignee = $ticket->get_assignee();
    $ticketGroup = $ticket->get_group_name();
}








?>