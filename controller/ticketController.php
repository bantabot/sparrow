<?php

include_once '../model/Ticket.php';
include '../controller/groupController.php';

$ticket = new Ticket;

$save = false;
$update = false;
$delete = false;
$view = false;

// Check if info is coming from editTicket or addTicket so it can be saved

if (isset($_POST['action'])){
    switch ($_POST['action']) {
        case "save":
            $save = true;
            break;
        case "update":
            $update = true;
            break;
        case "delete":
            $delete = true;
            break;
        case "view":
            $view = true;

    }

}

if($save || $update) {


    $title = $_POST['ticketTitle'];
    $description = $_POST['ticketDescription'];
//    if($saveGroup != true){
//        $groupName = $_POST['group'];
//    }
    $assignee = $_POST['ticketAssignee'];
    $ticket->set_ticket($title, $description, $assignee, $groupName);


    if ($update) {
        $id = $_POST['ID'];
        $ticket->set_id($id);
        $ticket->update();

    }
    elseif($save){

       $ticket->save();
    }

}
elseif ($delete){
    $id = $_POST['ID'];
    $ticket->set_id($id);
    $ticket->delete();
}
elseif ($view){
    $groups = [];
    foreach ($_POST as $key => $value){
        $groups[] = $key;
    }
    $ticket->set_groups($groups);
    $tickets = $ticket->get_ticket_by_group($groups);

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