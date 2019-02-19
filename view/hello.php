<?php

include '../view/header.php';
include '../controller/groupController.php';
?>



<!------------------Begin Form---------------------->
    <div class="container">
        <form action="success.php" method="post">

        <!--Manager Name-->

            <div class="form-group">
                <label for="managerName">Manager Name:</label>
                <input type="text" class="form-control" id="managerName" name="managerName">
            </div>

        <!--New Hire Name-->

            <div class="form-group">
                <label for="newHire">New Hire</label>
                <input type="text" class="form-control" name="newHire" id="newHire">
            </div>

        <!--Get group_name-->

            <div class="form-group">
                <label for="group">What group are they in?</label>
                <select class="form-control" id="group" name="group">
                    <?php
                    foreach ($groups as $groupKey => $groupName){
                        echo "<option value=' ".$groupKey."'>".$groupName."</option>";

                    }
                    ?>
                </select>
            </div>

        <!--Submit Button  -->

            <button type="submit" class="btn btn-primary">Magic Time</button>
        </form>
    </div>

<!--End Form-->

<?php
include '../view/footer.html';?>