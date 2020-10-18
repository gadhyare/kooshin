<?php

/**
 * fileName: اعدادات البريد الإلكتروني
 */
?>
<div class="container col-xs-12 col-md-6 m-auto txt-left">
    <div class="card-hader bg-dark text-white text-center p-2">
        اعدادات البريد الإلكتروني
    </div>
    <div class="card">
        <div class="card-body  ">
            <?php foreach ($viewmodel as $item) : ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <div class="col-xs-12 col-md-6">
                            <label for="em_Host"> الخادم </label>
                            <input type="text" name="em_Host" id="em_Host" class="form-control text-left" value="<?php echo $item["em_Host"]; ?>">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label for="em_userName"> اسم الأعضاء</label>
                            <input type="text" name="em_userName" id="em_userName" class="form-control text-left" value="<?php echo $item["em_userName"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-6">
                            <label for="em_userPass"> كلمة المرور </label>
                            <input type="password" name="em_userPass" id="em_userPass" class="form-control text-left" value="<?php echo $item["em_userPass"]; ?>">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label for="em_SmtpSecure"> نوع البروتكول </label>
                            <input type="text" name="em_SmtpSecure" id="em_SmtpSecure" class="form-control text-left" value="<?php echo $item["em_SmtpSecure"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-6">
                            <label for="em_Port"> المنفذ </label>
                            <input type="text" name="em_Port" id="em_Port" class="form-control text-left" value="<?php echo $item["em_Port"]; ?>">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label for="em_site"> البريد الإلكتروني </label>
                            <input type="email" name="em_site" id="em_site" class="form-control text-left" value="<?php echo $item["em_site"]; ?>">
                        </div>
                    </div>
                    <button type="submit" name="updateBtn" class="btn success-color-dark text-white float-right  px-3 py-1"> اضافة </button>
                    <a href="<?php echo ROOT_URL; ?>/settings" class="btn danger-color-dark text-white float-left  px-3 py-1"> تراجع </a>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>