<?php



include 'view/header.php';
include 'config/config.php';
include 'model/Ticket.php';

?>


<div>
    <div class="container-fluid text-center">

<div class="text-left">
        <form action="ticketView.php" method="post">

        <?php
        $groups = new Ticket;
        $groups->set_dbconn($dbconn);
        $groups = $groups->get_group_names();
         foreach ($groups as $group){
            echo ' <div class="form-check">';
           echo '<input type="checkbox" class="form-check-input" id="group" name="'.$group.'">';
           echo '<label class="form-check-label" for="group">'.ucwords($group).'</label>  </div>';
        }

        ?>
            <button type="submit" class="btn btn-primary">Magic Time</button>
        </form>

</div>
    </div>
</div>
<?php
include 'view/footer.html';?>
