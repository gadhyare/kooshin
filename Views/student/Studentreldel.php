<?php

/**
 * fileName: حذف قريب طالب
 */
?>
<?php $count[] = $viewmodel; ?>
<?php if ($_GET['id'] != "" && count($count)) : ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <?php foreach ($viewmodel as $delete_items) : ?>
            <div class="container p-2 mt-2 alert alert-danger text-dark text-center font-weight-bold col-xs-12 col-sm-10 col-md-8  m-auto">
                <p class="lead p-2 mt-2   text-center">
                    هل أنت متأكد من حذف السجل [ <?php echo $delete_items['rel_name']; ?> ] ؟
                </p>
                <input name="delete_items" type="submit" class="btn btn-success text-white px-3 py-2  a-light py-2 text-weight-bold" value="نعم">
                <a href="<?php echo ROOT_URL; ?>/student/update/<?php echo $delete_items['stu_id']; ?>" class="btn danger-color-dark   py-2 text-weight-bold">إلغاء</a>
            </div>
            <input type="hidden" name="stu_id" value="<?php echo $delete_items['stu_id']; ?>">
        <?php endforeach; ?>
    </form>
<?php else : ?>
    <?php printf(SELECT_ID, "رقم الطالب"); ?>
<?php endif; ?>