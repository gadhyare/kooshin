 <?php
    /**
     * fileName:  تسجيل الدخول
     */
    ?>


 <?php if (isset($_GET['controller']) && $_GET['controller'] == "user" && isset($_GET['action']) && $_GET['action'] == "login") : ?>
     <style>
         body {
             background-color: #EEEEEE !important;
         }
     </style>
     <div class="container mt-3" id="login_body">
         <?php if (isset($_GET['resetpass']) && $_GET['resetpass'] == true) : ?>
             <hr class="mt-4">
             <div class="card col-xs-12 col-md-4 m-auto p-3 rounded-0 ">
                 <?php $op = new Khas(); ?>
                 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                     <div class="form-group">
                         <label for="user_email"> <?php echo $op->lang("user email"); ?> </label>
                         <input type="email" name="user_email" id="user_email" value="<?php echo $op->setPosts('user_email'); ?>" class="form-control rounded-0  ">
                     </div>
                     <button type="submit" name="resetPass" class="btn m-auto col-12 unique-color-dark text-white"> <?php echo $op->lang("reset user password"); ?> <i class="fa fa-reset"></i> </button>
                     <br>
                     <br>
                     <a href="<?php echo ROOT_URL; ?>/users/login" class="btn m-auto col-12 danger-color-dark text-white"> <i class="fa fa-back"></i> <?php echo $op->lang("cancel"); ?> <i class="fa fa-reset"></i> </a>
                 </form>
             </div>
         <?php elseif (isset($_GET['tokenid']) && $_GET['tokenid'] != "") : ?>
             <div class="card col-xs-12 col-md-4 m-auto  p-0 rounded-0 ">
                 <div class="card-header p-1 text-white text-center danger-color-dark">
                     <?php echo $op->lang("set new password"); ?>
                 </div>
                 <div class="card-body">
                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                         <div class="form-group">
                             <label for="user_password_edit"> <?php echo $op->lang("new password"); ?></label>
                             <input type="password" name="user_password_edit" id="user_password_edit" user_name class="form-control  ">
                         </div>
                         <div class="form-group">
                             <label for="user_password_confirm"> <?php echo $op->lang("confirma new password"); ?></label>
                             <input type="password" name="user_password_confirm" id="user_password_confirm" class="form-control   ">
                         </div>
                         <button type="submit" name="edit_usr_pass" class="btn col-12 py-2 m-auto unique-color-dark text-white"> <?php echo $op->lang("update password"); ?> </button>
                         <br>
                         <br>
                         <a href="<?php echo ROOT_URL; ?>/users/login" class="btn m-auto col-12 danger-color-dark text-white"> <i class="fa fa-back"></i> <?php echo $op->lang("cancel"); ?> <i class="fa fa-reset"></i> </a>
                     </form>
                 </div>
             </div>
         <?php else : ?>
             <?php $op = new Khas(); ?>
             <div class="card pb-3 pt-0 rounded-0  border col-xs-12 col-sm-12  col-md-4  m-auto mt-5 " id="s">
                 <?php if (isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
                 <div class="card-header bg-white text-center">

                     <img src="<?php echo ROOT_URL; ?>/assets/img/GollisGatelogo.png" style="height:70px; top:0 !important" class="p-0 m-auto w-100" alt="">
                 </div>
                 <div class="card-body p-2">
                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                         <div class="form-group">
                             <label for="user_name"> <?php echo $op->lang("user name"); ?> </label>
                             <input type="text" name="user_name" id="user_name" user_name class="form-control   rounded-0">
                         </div>
                         <div class="form-group">
                             <label for="password"> <?php echo $op->lang("password"); ?> </label>
                             <input type="password" name="password" id="password" class="form-control    rounded-0">
                         </div>
                         <button type="submit" name="login_submit" class="btn col-12 py-2 m-auto unique-color-dark text-white rounded-0"> <?php echo $op->lang("login"); ?> </button>
                         <hr>
                         <a href="<?php echo ROOT_URL; ?>/users/login?resetpass=true" class="btn  success-color-dark col-12 py-2 m-auto  text-white  rounded-0"> <?php echo  $op->lang("reset password"); ?> </a>
                     </form>
                 </div>
             </div>
         <?php endif; ?>
     </div>
 <?php else : ?>

     <div class="container text-center">

         <img src="<?php echo ROOT_URL; ?>/assets/img/load.gif" alt="" class="m-auto">
         <br>
         <h4 class=" text-center"> جارٍ التحميل </h4>

     </div>
 <?php endif; ?>