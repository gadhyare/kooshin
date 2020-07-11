<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <div class="col-md-8   mx-auto">
        <?php if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
        } ?>
    </div>
    <?php $arr = array(1 => 'مفعل', 2 => 'غير مفعل'); ?>
    <div class="card  ">
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php foreach ($viewmodel as $edit_items) : ?>
                    <div class="form-group">
                        <label>اسم المادة</label>
                        <input type="text" name="subject_name_edit" value="<?php echo $edit_items['subject_name'] ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المادة ">
                    </div>
                    <div class="form-group">
                        <label>كود المادة</label>
                        <input type="text" name="subject_code_edit" value="<?php echo $edit_items['subject_code'] ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا كود المادة ">
                    </div>
                    <div class="form-group">
                        <label> البرنامج </label>
                        <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0">
                            <?php echo $op->FullProgInfo(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>حالة المادة</label>
                        <select name="active" id="" class="form-control p-1  rounded-0" onclick="showhidden()">
                            <?php echo ($edit_items['active'] == 1) ? '<option value="1"> مفعل </option><option value="2"> غير مفعل </option>' : '<option value="2"> غير مفعل </option><option value="1"> مفعل </option>'; ?>
                        </select>
                        <input type="hidden" name="selected_value" value="<?php echo $edit_items['active']; ?>">
                    </div>
                <?php endforeach; ?>
                <input type="submit" name="edit_submit" value="تعديل" class="btn btn-primary text-light px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/subject" class="btn btn-danger text-light p-2">إلغاء</a>
            </form>
        </div>
    </div>
</div>