<?php
include '../controller/groupController.php';
include '../view/header.php';


?>

    <!------------------Begin Form------------------>

    <div class="container">
        <form action="templateSuccess.php" method="post">

            <!------------------Get Title------------------>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="ticketTitle" value="">
            </div>

            <!------------------Enter Description----------------->

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="ticketDescription" rows="3" ></textarea>
            </div>

            <!------------------Get Group Name------------------>
            <div class="form-group">
                <label for="group">Existing Group</label>
                <select class="form-control" id="group" name="group">
                    <option value='0'>New Group</option>

                    <?php
                    foreach ($groups as $groupKey => $groupName){
                        echo "<option value=' ".$groupKey."'>".$groupName."</option>";

                    }
                    ?>
                </select>
            </div>
            <small> <a href="#newGroup" data-toggle="collapse" class="btn btn-outline-info btn-sm" role="button" aria-expanded="false" aria-controls="collapseExample">New Group</a>
                <div class="collapse" id="newGroup">
                    <div class="card card-body">


            <div class="form-group">
                <label for="newGroup">Create group:</label>
                <input type="text" class="form-control" id="newGroup" name="newGroup" value="">
            </div>
            <div class="form-group">
                <label for="parentGroup">Parent Group</label>
                <select class="form-control" id="parentGroup" name="parentGroup">
                    <option value='0'>No parent</option>
                   <?php
                    foreach ($groups as $groupKey => $groupName){
                        echo "<option value=' ".$groupKey."'>".$groupName."</option>";

                    }
                    ?>
                </select>
            </div>
                    </div>
                </div>
            </small>

            <!------------------Select Assignee------------------>

            <div class="form-group">
                <label for="assignee">Assignee</label>
                <select class="form-control" id="assignee" name="ticketAssignee">
                    <option value="manager">Manager</option>
                    <option value="new-hire">New Hire</option>
                </select>
            </div>


            <!------------------Submit------------------>
            <input type="hidden" name="action" value="save">
            <button type="submit" name="submit" class="btn btn-secondary text-center">Magic Time</button>

        </form>
    </div>

<?php
include '../view/footer.html';?>