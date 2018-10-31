<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        h1 {
            font-family: Georgia, "Times New Roman", Times, serif;
        }
    </style>

    <title>Sparrow</title>
</head>

<body>

<!------------------Begin Header------------------>

    <div class="jumbotron jumbotron-fluid" style="background-color: #ffe01b;">
        <div class="container-fluid text-center">
            <h1>Add Ticket</h1>
            <p class="lead">Add a task for new engineers to complete</p>
        </div>
    </div>

<!------------------End Header------------------>

<!------------------Begin Form------------------>

    <div class="container">
    <form action="templateSuccess.php" method="post">

        <!------------------Get Title------------------>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="ticketTitle">
        </div>

        <!------------------Enter Description----------------->

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="ticketDescription" rows="3"></textarea>
        </div>

        <!------------------Get Group Name------------------>
        <div class="form-group">
            <label for="group">Group label</label>
            <select class="form-control" id="group" name="group">
                <option value="engineering">Engineering</option>
                <option value="development">Development</option>
                <option value="ops">Ops</option>
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

<!--End Form-->

<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>