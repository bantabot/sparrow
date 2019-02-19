
<?php

include '../controller/successController.php';
include '../view/header.php';

$epicLink = "https://jira.mailchimp.com/browse/".$epicKey;

?>


<!------------------Success Response with Epic Link------------------>
    <div class="container text-center">

        <?php echo '<p class="text-center">Awesome '.$managerName.'! </p>';
              echo '<p> Next step is to check out what tasks await</p>';
              echo '<p>Here is your brand new shiny epic: <a href="' . $epicLink . '">'.$epicLink.'</a> </p>';

              ?>

        <iframe src="https://giphy.com/embed/3o6fJ2bdNfhd6e144w" width="480" height="270" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/mailchimp-high-five-3o6fJ2bdNfhd6e144w"></a></p>

    </div>
<?php
include '../view/footer.html';?>
