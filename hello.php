<?php
include 'config/config.php';
$header = "All Aboard, a tool to make onboarding a little bit lighter";
include 'view/header.php';



$sql ="SELECT * FROM ticketGroup";
$ticketGroup = mysqli_query($dbconn, $sql);
//$ticketGroupArray = mysqli_fetch_array($ticketGroup, MYSQLI_ASSOC);
while ($group = mysqli_fetch_assoc($ticketGroup)) {
    $groups[$group['id']] = $group['name'];
//    var_dump($group);
}


var_dump($groups);

?>



<!------------------Begin Form---------------------->
    <div class="container">
        <form action="successController.php" method="post">

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
                        echo "<option>".$groupName."</option>";

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
include 'view/footer.html';?>