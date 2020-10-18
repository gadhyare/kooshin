<?php

/**
 * fileName: اضافة مادة لبرنامج دارسي
 */
?>
<?php $op = new Khas(); ?>
<?php $op->chkSelProgtxt($_GET['prog_id']); ?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <div class="card-header col-12 m-auto py-1 pink darken-3 text-center text-white "> <?php echo $op->FulltextProgInfo($_GET['prog_id']); ?> </div>
    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> اضافة مادة جديدة </div>
        <div class="card-body">

            <div class="d-none alert alert-danger p-1" id="lblAlert"> <i> أقل عدد للأحرف هو 3 </i> </div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label> اسم المادة</label>
                    <input type="text" name="subject_name" id="subject_name" value="<?php echo $op->setPosts("subject_name"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المادة الجديدة">
                </div>
                <div class="form-group">
                    <label> حالة المادة</label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
                </div>
                <input type="submit" name="submit" id="submit" value="اضافة" class="btn primary-color-dark text-white px-3 py-2  ">
                <a href="<?php echo ROOT_URL; ?>/subject" class="btn danger-color-dark text-white p-2 float-left">إلغاء</a>
            </form>
        </div>
    </div>
</div>