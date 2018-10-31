<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>

</head>
<body>


<div class="jumbotron jumbotron-fluid">
    <div class="container-fluid text-center">
        <h1>Add Ticket</h1>
    </div>
</div>

<div class="container">

    <form action="templateSuccess.php" method="post">
        <input type="hidden" name="submitted" value="true">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="ticketTitle">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="ticketDescription" rows="3"></textarea>


        </div>


        <div class="form-group">
            <label for="group">Group label</label>
            <select class="form-control" id="group" name="group">
                <option value="engineering">Engineering</option>
                <option value="development">Development</option>
                <option value="ops">Ops</option>
                <option value="front-end">Front-End</option>
            </select>

        </div>
        <div class="form-group">
            <label for="assignee">Assignee</label>
            <select class="form-control" id="assignee" name="ticketAssignee">
                <option value="manager">Manager</option>
                <option value="new-hire">New Hire</option>
            </select>

        </div>
        <button type="submit" class="btn btn-primary" name="submit">Magic Time</button>

</div>




</form>
</div>


<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>
</html>