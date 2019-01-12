<?php

include 'view/header.php';

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
                <label for="group">Group label</label>
                <select class="form-control" id="group" name="group">
                    <option value="">Select...</option>
                    <option value="engineering" >Engineering</option>
                    <option value="development" >Development</option>
                    <option value="ops" >Ops</option>
                    <option value="front-end">Front-End</option>
                </select>
            </div>


            <!------------------Select Assignee------------------>

            <div class="form-group">
                <label for="assignee">Assignee</label>
                <select class="form-control" id="assignee" name="ticketAssignee">
                    <option value="manager">Manager</option>
                    <option value="new-hire">New Hire</option>
                </select>
            </div>


            <!------------------Submit------------------>
            <button type="submit" name="submit" class="btn btn-secondary text-center">Magic Time</button>

        </form>
    </div>

<?php
include 'view/footer.html';?>