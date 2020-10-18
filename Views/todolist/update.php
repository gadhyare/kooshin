<?php

/**
 * fileName: عرض مهمة
 */
?>

<div class="container">
    <?php if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    } ?>
    <?php foreach ($viewmodel as $ite) { ?>
        <?php $status = ($ite['status'] == 1) ? '<option value="1"> Normal </option><option value="2"> important </option><option value="3"> V-Important </option>' : (($ite['status'] == 2) ? '<option value="2"> important </option><option value="1"> Normal </option><option value="3"> V-Important </option>' : '<option value="3"> V-Important </option><option value="1"> Normal </option><option value="2"> important </option>'); ?>
        <?php $act1 = '<option value="1"> تمت المهمة </option><option value="2"> جاري العمل عليها </option><option value="3"> تم تأجيلها </option><option value="4"> تم إلغاؤها </option><option value="5"> تم تحويلها </option>';
        $act2 = '<option value="2"> جاري العمل عليها </option><option value="1"> تمت المهمة </option> <option value="3"> تم تأجيلها </option><option value="4"> تم إلغاؤها </option><option value="5"> تم تحويلها </option>';
        $act3 = '<option value="3"> تم تأجيلها </option><option value="1"> تمت المهمة </option><option value="2"> جاري العمل عليها </option><option value="4"> تم إلغاؤها </option><option value="5"> تم تحويلها </option>';
        $act4 = '<option value="4"> تم إلغاؤها </option><option value="1"> تمت المهمة </option><option value="2"> جاري العمل عليها </option><option value="3"> تم تأجيلها </option><option value="5"> تم تحويلها </option>';
        $act5 = '<option value="5"> تم تحويلها </option><option value="1"> تمت المهمة </option><option value="2"> جاري العمل عليها </option><option value="3"> تم تأجيلها </option><option value="4"> تم إلغاؤها </option>';
        ?>
        <?php $active = ($ite['active'] == 1) ? $act1 : (($ite['active'] == 2) ? $act2 : (($ite['active'] == 3) ? $act3 : (($ite['active'] == 4) ? $act4 : (($ite['active'] == 4) ? $act4 : $act5)))); ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 p-3 forms">
            <div class="form-group">
                <label> الموضوع </label>
                <input type="text" name="title_edit" value="<?php echo $ite['title']; ?>" id="" class="form-control rounded-0">
            </div>
            <div class="form-group">
                <label> درجة العمل </label> <span class="float-left"> </span>
                <select name="status_edit" class="form-control rounded-0">
                    <?php echo $status; ?>
                </select>
            </div>

            <div class="form-group">
                <label> الحالة</label>
                <select name="active_edit" class="form-control rounded-0">
                    <?php echo $active; ?>
                </select>
            </div>

            <div class="form-group">
                <label> الموضوع </label>
                <textarea name="topic_edit" id="" class="form-control rounded-0" cols="30" rows="5"><?php echo $ite['topic']; ?></textarea>
            </div>
            <input type="submit" name="edit_submit" value="اضافة العمل" class="btn btn-success">
            <a href="<?php echo ROOT_URL; ?>/todolist" class="btn danger-color-dark"> تراجع </a>
        </form>
    <?php } ?>
</div>