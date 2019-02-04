<?php


include 'function.php';
include 'view/header.php';
include 'config/config.php';

?>


<div>
    <div class="container-fluid text-center">

<div class="text-left">
        <form action="ticketView.php" method="post">

        <?php
        $groups = get_groups($dbconn);
        foreach ($groups as $group){
            echo ' <div class="form-check">';
            echo '<input type="checkbox" class="form-check-input" id="group" name="'.$group['group_name'].'">';
           echo '<label class="form-check-label" for="group">'.ucwords($group['group_name']).'</label>  </div>';
        }

        ?>
            <button type="submit" class="btn btn-primary">Magic Time</button>
        </form>

</div>
    </div>
</div>
<?php
include 'view/footer.html';?>
