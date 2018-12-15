<?php

include 'mysql_connection.php';
include 'function.php';
$id = $_GET['id'];
if (isset($id)){
$ticket = get_tickets_id($dbconn, $id);
$ticket = $ticket->fetch_object();}

$header= "Jay is great";
include 'view/header.php';

?>

<!------------------Begin Form------------------>

<div class="container">
    <form action="templateSuccess.php" method="post">

        <!------------------Get Title------------------>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="ticketTitle" value="<?php echo $ticket->title; ?>">
        </div>

        <!------------------Enter Description----------------->

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="ticketDescription" rows="3" ><?php echo $ticket->description; ?></textarea>
        </div>

        <!------------------Get Group Name------------------>
        <div class="form-group">
            <label for="group">Group label</label>
            <select class="form-control" id="group" name="group">
                <option value="">Select...</option>
                <option value="engineering" <?php if($ticket->group_name=="engineering"){ echo "selected";}?> >Engineering</option>
                <option value="development" <?php if($ticket->group_name=="development"){ echo "selected";}?> >Development</option>
                <option value="ops" <?php if($ticket->group_name=="ops"){ echo "selected";}?> >Ops</option>
                <option value="front-end"<?php if($ticket->group_name=="front-end"){ echo "selected";}?>>Front-End</option>
            </select>
        </div>


        <!------------------Select Assignee------------------>

        <div class="form-group">
            <label for="assignee">Assignee</label>
            <select class="form-control" id="assignee" name="ticketAssignee">
                <option value="manager" <?php if($ticket->assignee=="manager"){ echo "selected";}?>>Manager</option>
                <option value="new-hire"<?php if($ticket->group_name=="new-hire"){ echo "selected";}?>>New Hire</option>
            </select>
        </div>
        <input type="hidden" name="ID" value="<?php echo $id;?>">

        <!------------------Submit------------------>

        <button type="submit" name="submit" class="btn btn-secondary text-center">Magic Time</button>
        <?php if (isset($id)){echo '<button type="submit" name="delete"  value="delete" class="btn btn-secondary text-center">DELETE</button>';}?>

    </form>
</div>

<?php
include 'view/footer.html';?>