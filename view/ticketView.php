<?php


//include_once '../config/config.php';
include '../controller/ticketController.php';
include '../view/header.php';

?>


<div>
    <div class="container-fluid text-center">


            <?php
            foreach ($tickets as $ticket){
                echo '<div class="card">';
                echo '<div class="card-body"> <h5 class="card-title">'. $ticket['title'].'</h5>';
                echo '<p class="card-text">'. nl2br($ticket['description']).'</p>';
                echo '<a class="card-link" href="editTicket.php?id='.$ticket['id'].'">Edit Ticket</a>';
                echo '</div> </div>';
            }

            ?>



    </div>
</div>

<?php
include '../view/footer.html';?>