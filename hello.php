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
    <h1>Sparrow</h1>
        <p class="lead">All Aboard, your first mate to make onboarding a little bit lighter</p>
    </div>
</div>
<div class="container">

    <form action="success.php" method="post">
        <div class="form-group">
            <label for="jiraUsername">Jira Username:</label>
            <input type="text" class="form-control" id="jiraUsername" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
            <small>Having trouble finding your password? Check this out <a href="#passwordinstructions" data-toggle="collapse" class="btn btn-outline-info btn-sm" role="button" aria-expanded="false" aria-controls="collapseExample">here</a>
                <div class="collapse" id="passwordinstructions">
                    <div class="card card-body">
                        1) Sign out or JIRA or open a new incognito window <br>
                        2) Visit https://id.atlassian.com <br>
                        3) Click the "Can't log in?" link <br>
                        4) Enter your email and hit the "Send Recovery Link" button <br>
                        5) Atlassian email will offer to "Alternatively, you can reset your password for your Atlassian account.". Click the reset your password option
                        <br>
                        6) Don't forget to save your new password in lastpass. You should be able to use that password to authenticate.
                    </div>
                </div>
            </small>

        </div>
        <div class="form-group">
            <label for="managerName">Manager Name:</label>
            <input type="text" class="form-control" id="managerName" name="managerName">


        </div>


        <div class="form-group">
            <label for="newHire">New Hire</label>
            <input type="text" class="form-control" name="newHire" id="newHire">

        </div>
        <div class="form-group">
            <label for="startDate" >Start Date</label>

                <input class="form-control" type="date" name="startDate" id="startDate">

        </div>
        <div class="form-group">
            <label for="group">What group are they in?</label>
            <select class="form-control" id="group" name="group">
                <option>Development</option>
                <option>Ops</option>
                <option>Front-End</option>
            </select>

        </div>
        <button type="submit" class="btn btn-primary">Magic Time</button>

    </div>




    </form>
</div>

<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>