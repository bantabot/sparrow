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
<!------------------Begin Header------------------->

    <div class="jumbotron jumbotron-fluid" style="background-color: #ffe01b;">
        <div class="container-fluid text-center">
            <h1>Sparrow</h1>
            <p class="lead">All Aboard, your first mate to make onboarding a little bit lighter</p>
        </div>
    </div>

<!-------------------End Header--------------------->



<!------------------Begin Form---------------------->
    <div class="container">
        <form action="success.php" method="post">

        <!------------------ Get jira username-------------->

            <div class="form-group">
                <label for="jiraUsername">Jira Username:</label>
                <input type="text" class="form-control" id="jiraUsername" name="username">
            </div>

        <!------------------ Get jira password------------------>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password">

            <!------------------Password help------------------>

                <small>Having trouble finding your password? Check this out <a href="#passwordinstructions" data-toggle="collapse" class="btn btn-outline-info btn-sm" role="button" aria-expanded="false" aria-controls="collapseExample">here</a>
                    <div class="collapse" id="passwordinstructions">
                        <div class="card card-body">
                            <ol>
                                <li> Sign out or JIRA or open a new incognito window </li>
                                <li> Visit <a href="https://id.atlassian.com">https://id.atlassian.com</a> </li>
                                <li> Click the "Can't log in?" link </li>
                                <li> Enter your email and hit the "Send Recovery Link" button </li>
                                <li> Atlassian email will offer to "Alternatively, you can reset your password for your Atlassian account.". Click the reset your password option </li>
                                <li> Don't forget to save your new password in lastpass. You should be able to use that password to authenticate.</li>
                            </ol>
                        </div>
                </small>
            </div>

        <!------------------End Password------------------>

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
                    <option>Development</option>
                    <option>Ops</option>
                    <option>Front-End</option>
                </select>
            </div>

        <!--Submit Button  -->

            <button type="submit" class="btn btn-primary">Magic Time</button>
        </form>
    </div>

<!--End Form-->

<!--Bootstrap js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>