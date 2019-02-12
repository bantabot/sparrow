<?php


include 'model/Ticket.php';
include 'config/config.php';

//Get POST variables

$groups = [];
foreach ($_POST as $key => $value){
    $groups[] = $key;
}
$groups = implode("', '", $groups);
$tickets = new Ticket;
$tickets->set_dbconn($dbconn);
$tickets->set_groups($groups);
$tickets = $tickets->get_ticket_by_group();

include 'view/header.php';

?>


<div>
    <div class="container-fluid text-center">


            <?php


            while ($ticket = $tickets->fetch_object()) {
                echo '<div class="card">';
                echo '<div class="card-body"> <h5 class="card-title">'. $ticket->title.'</h5>';
               echo '<p class="card-text">'. nl2br($ticket->description).'</p>';
               echo '<a class="card-link" href="editTicket.php?id='.$ticket->id.'">Edit Ticket</a>';
               echo '</div> </div>';

            }

            ?>



    </div>
</div>

<?php
include 'view/footer.html';?>