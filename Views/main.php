<?php
$op = new Khas();
if (!isset($_SESSION["loged_in"]) || !isset($_SESSION['log_user']) ) { ?>
<?php if( $_GET['action'] != 'login'):?>
    <?php header("refresh:0;url=".ROOT_URL."/user/login/");?>
<?php endif;?>
    <?php require_once('tmp/nofram/header.php'); ?>
    <?php require('Views/user/login.php'); ?>
<?php } else { ?>
    <?php require_once('tmp/header.php'); ?>
    <div class="container-fluid  ">
        <div class="row mr-0 p-0">
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 p-0">
                <div class="container  mr-0 p-0    d-none  d-md-block">
                    <?php require_once('tmp/sidebar.php'); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 bg-white p-2 pl-3">
                <?php Messages::display(); ?>
                <div class="container   text-left   m-auto px-2 py-0" style="direction:ltr !important; border-bottom:1px solid #eee;"><?php echo $_SESSION['link']; ?></div>
                <?php if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                    } ?>
                <?php require($view); ?>
            </div>
        </div>
        <?php require_once('tmp/footer.php'); ?>
    <?php }

 