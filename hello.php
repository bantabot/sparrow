<?php
$header = "All Aboard, a tool to make onboarding a little bit lighter";
include 'view/header.php';

?>



<!------------------Begin Form---------------------->
    <div class="container">
        <form action="successController.php" method="post">

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

<?php
include 'view/footer.html';?>