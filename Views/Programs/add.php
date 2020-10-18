<?php

/**
 * fileName: اضافة برنامج دارسي
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-8">
    <?php $op = new Khas(); ?>
    <?php $fac_id = (isset($_POST['fac_id'])) ? $_POST['fac_id'] : ''; ?>
    <?php $edulev_id = (isset($_POST['edulev_id'])) ? $_POST['edulev_id'] : ''; ?>
    <?php $academics_id = (isset($_POST['academics_id'])) ? $_POST['academics_id'] : ''; ?>

    <div class="card  z-depth-2">
        <div class="card-header  text-white indigo darken-4 font-weight-bold text-center p-1"> اضافة برنامج جديد </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> الكلية </label>
                            <select name="fac_id" id="fac_id" class="form-control p-1  rounded-0">
                                <?php $op->GetSelfaculty($fac_id); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> المرحلة الأكاديمية </label>
                            <select name="edulev_id" id="edulev_id" class="form-control p-1  rounded-0">
                                <?php $op->Getedulevel($edulev_id); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> القسم الأكاديمي </label>
                            <select name="academics_id" id="academics_id" class="form-control p-1  rounded-0">
                                <?php $op->GetSelacademics($academics_id); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>حالة البرنامج</label>
                            <select name="active" id="active" class="form-control p-1  rounded-0">
                                <option value="1">مفعل</option>
                                <option value="2">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                </div>







                <input type="submit" name="submit" value="اضافة" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/programs" class="btn danger-color-dark text-white p-2">إلغاء</a>
            </form>
        </div>
    </div>


</div>