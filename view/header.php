<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        h1, a {
            font-family: Georgia, "Times New Roman", Times, serif;
            color: black;
        }
        .nav{
            margin:0; /*add this*/
        }


    </style>

    <title>Sparrow</title>
</head>

<body>
<!------------------Begin Header------------------->

<div class="jumbotron jumbotron-fluid" style="background-color: #ffe01b;">
    <div class="container-fluid text-center">
        <h1>Sparrow</h1>
        <p class="lead"><?php if(isset($header)) {echo $header;} else{echo "All Aboard, your first mate to make onboarding a little bit lighter";}?></p>
    </div>
<div class="container-fluid">
    <ul class="nav nav-pills justify-content-center align-text-bottom">
        <li class="nav-item">
            <a class="nav-link" href="hello.php">Make an Epic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="templateView.php">View tickets</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addTicket.php">Add a ticket</a>
        </li>
    </ul>
</div>
</div>

<!-------------------End Header--------------------->


