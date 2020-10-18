<?php

/**
 * fileName: تعديل البرامج العلمية للطالب
 */
?>
<?php if (count((array) $viewmodel)) : ?>
    <?php foreach ($viewmodel as $items) : ?>
        <?php $op = new Khas(); ?>
        <?php $op->chkSelProgtxt($items['prog_id']); ?>
        <div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
            <div class="card  ">
                <div class="card-header  blue-grey darken-4 text-white font-weight-bold text-center p-1"> اضافة برنامج دراسي للطالب </div>
                <div class="card-body teal lighten-5">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> تاريخ التسجيل </label>
                                    <input type="date" name="UpDate_reg_date" value="<?php echo $items['reg_date']; ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المادة الجديدة">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label> البرنامج </label>
                                    <select name="UpDate_prog_id" id="prog_id" class="form-control p-1  rounded-0">
                                        <?php echo $op->FullSelProgInfo($items['prog_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> الفترة </label>
                                    <select name="UpDate_dep_id" id="UpDate_dep_id" class="form-control p-1  rounded-0">
                                        <?php echo $op->getSelDepartment($items['UpDate_dep_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> القسم </label>
                                    <select name="UpDate_sec_id" id="UpDate_sec_id" class="form-control p-1  rounded-0">
                                        <?php echo $op->getSelesection($items['UpDate_sec_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> المستوى </label>
                                    <select name="UpDate_lev_id" id="lev_id" class="form-control p-1  rounded-0">
                                        <?php echo $op->GetSellevels($items['lev_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> المجموعة </label>
                                    <select name="UpDate_grp_id" id="grp_id" class="form-control p-1  rounded-0">
                                        <?php echo $op->GetSelgroups($items['grp_id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> الحالة </label>
                                    <select name="UpDate_statues" id="statues" class="form-control p-1  rounded-0">
                                        <option value="مستمر">مستمر</option>
                                        <option value="تم قيد السجل"> تم قيد السجل </option>
                                        <option value="تم تراجع الطالب"> تم تراجع الطالب </option>
                                        <option value="متخرج">متخرج </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label> خصم خاص للطالب للبرنامج </label>
                                    <input type="number" name="UpDate_Prog_Discount" value="<?php echo $items['Prog_Discount']; ?>" class="form-control p-1  rounded-0" value="0">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="update_stu_prog" value="اضافة" class="btn primary-color-dark text-white px-3 py-2">
                        <a href="<?php echo ROOT_URL; ?>/subject" class="btn danger-color-dark text-white p-2">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>