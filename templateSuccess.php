<?php



include 'model/Ticket.php';
include 'config/config.php';
include 'view/header.php';
include 'ticketController.php';



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


