<?php

include '../controller/groupController.php';
include '../controller/ticketController.php';
include '../view/header.php';

?>

<!------------------Begin Form------------------>

<div class="container">
    <form action="templateSuccess.php" method="post">

        <!------------------Get Title------------------>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="ticketTitle" value="<?php echo $ticketTitle; ?>">
        </div>

        <!------------------Enter Description----------------->

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="ticketDescription" rows="3" ><?php echo $ticketDescription; ?></textarea>
        </div>

        <!------------------Get Group Name------------------>
        <div class="form-group">
            <label for="group">Group label</label>
            <select class="form-control" id="group" name="group">
                <option value="">Select...</option>
              <?php

                    foreach ($groups as $groupKey => $groupName){

                    if( $ticketGroup == $groupKey){
                        echo '<option value="' . $groupKey . '" selected>' . $groupName . '</option>';
                    }
                    else {
                        echo '<option value="' . $groupKey . '">' . $groupName . '</option>';
                    }


                }
                ?>
            </select>
        </div>


        <!------------------Select Assignee------------------>

        <div class="form-group">
            <label for="assignee">Assignee</label>
            <select class="form-control" id="assignee" name="ticketAssignee">
                <option value="manager" <?php if($ticketAssignee=="manager"){ echo "selected";}?>>Manager</option>
                <option value="new-hire"<?php if($ticketAssignee=="new-hire"){ echo "selected";}?>>New Hire</option>
            </select>
        </div>
        <input type="hidden" name="ID" value="<?php echo $id;?>">
        <input type="hidden" name="action" value="update">

        <!------------------Submit------------------>

        <button type="submit" name="submit" class="btn btn-secondary text-center">Magic Time</button>
        <?php if (isset($id)){echo '<button type="submit" name="action"  value="delete" class="btn btn-secondary text-center">DELETE</button>';}?>

    </form>
</div>

<?php
include '../view/footer.html';?>