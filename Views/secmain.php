<?php
$op = new Khas();
if (!isset($_SESSION["loged_in"]) || !isset($_SESSION['log_user']) ) { ?>
    <?php require_once('tmp/header.php'); ?>
    <?php require('Views/user/login.php'); ?>
<?php } else { ?>
    <?php require_once('tmp/nofram/header.php'); ?>
    <?php require($view); ?>
    <?php require_once('tmp/nofram/footer.php'); ?>
<?php }
