<?php

/**
 * fileName: اضافة مرحلة دراسية
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">

    <?php $op = new khas(); ?>

    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> اضافة المرحلة الدراسية جديدة </div>
        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label> اسم المرحلة الدراسية</label>
                    <input type="text" name="edulev_name" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('edulev_name'); ?>" placeholder="أدخل هنا اسم المرحلة الدراسية الجديدة">
                </div>
                <div class="form-group">
                    <label> الكود  </label>
                    <input type="text" name="code" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('code'); ?>"  >
                </div>
                <div class="form-group">
                    <label>حالة المرحلة الدراسية</label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
                </div>

                <input type="submit" name="submitAdd" value="اضافة" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/edulevel" class="btn danger-color-dark text-white p-2">إلغاء</a>
            </form>
        </div>
    </div>


</div>