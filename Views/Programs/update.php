<?php

/**
 * fileName:  تعديل برنامج دارسي
 */
?>
<?php $op = new Khas(); ?>
<?php $op->chkSelProgtxt($_GET['id']); ?>
<?php if ($op->chk_prog_rols($op->stringify($_SESSION['log_id']), $_GET['id'])) : ?>
    <div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
        <?php $fac_id = (isset($_POST['fac_id'])) ? $_POST['fac_id'] : ''; ?>
        <?php $academics_id = (isset($_POST['academics_id'])) ? $_POST['academics_id'] : ''; ?>
        <?php foreach ($viewmodel as $edit_items) : ?>
            <div class="card  ">
                <div class="card-header  text-dark font-weight-bold text-center p-1"> تعديل البرنامج </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label> المرحلة الأكاديمية </label>
                            <select name="edulev_id" id="edulev_id" class="form-control p-1  rounded-0">
                                <?php $op->GetSeledulevel($itemss['edulev_id']); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> الكلية </label>
                            <select name="fac_id" id="fac_id" class="form-control p-1  rounded-0">
                                <?php $op->GetSelfaculty($edit_items['fac_id']); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> القسم الأكاديمي </label>
                            <select name="academics_id" id="academics_id" class="form-control p-1  rounded-0">
                                <?php $op->GetSelacademics($edit_items['academics_id']); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>حالة القسم</label>
                            <select name="active" id="active" class="form-control p-1  rounded-0">
                                <?php echo ($edit_items['active'] == 1) ?  '<option value="1">مفعل</option><option value="2">غير مفعل</option>' : '<option value="2">غير مفعل</option><option value="1">مفعل</option>'; ?>
                            </select>
                        </div>
                        <input type="submit" name="submit_update" value="تعديل" class="btn primary-color-dark text-white px-3 py-2">
                        <a href="<?php echo ROOT_URL; ?>/programs" class="btn danger-color-dark text-white p-2">إلغاء</a>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>