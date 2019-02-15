<?php

include 'groupController.php';
include 'view/header.php';

?>


<div>
    <div class="container-fluid text-center">

<div class="text-left">
        <form action="ticketView.php" method="post">

        <?php

            foreach ($groups as $groupKey => $groupName){
                echo ' <div class="form-check">';
                echo '<input type="checkbox" class="form-check-input" id="group" name="'.$groupName.'">';
                echo '<label class="form-check-label" for="group">'.ucwords($groupName).'</label>  </div>';

                }
            ?>
            <button type="submit" class="btn btn-primary">Magic Time</button>
        </form>

</div>
    </div>
</div>
<?php
include 'view/footer.html';?>
