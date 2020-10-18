<?php

/**
 * fileName: رئيسية المهام
 */
?>
<div class="container">
    <a href="<?php echo ROOT_URL; ?>/todolist/add" class="btn primary-color-dark mt-2 rounded-0 float-left"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مهمة جديدة </a>



    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class='mt-2 pt-5 forms'>
        <div class="row">
            <?php foreach ($viewmodel as $doit) { ?>
                <?php $ch = ($doit['status'] == 1) ? 'عادية' : (($doit['status'] == 2) ? 'مستعجلة' : 'مستعجلة جداً'); ?>
                <?php $bg = ($doit['status'] == 1) ? 'primary-color-dark text-white' : (($doit['status'] == 2) ? 'bg-warning text-white' : 'danger-color-dark text-white'); ?>
                <div class="col-xs-12 col-md-12 col-md-3 col-lg-3 ">
                    <div class="card mb-1">
                        <div class="card-header <?php echo $bg; ?> ">
                            <?php echo  $ch;  ?>
                        </div>
                        <div class="card-body">
                            <a class="text-dark font-weight-bold" href="<?php echo ROOT_URL; ?>/todolist/show/<?php echo $doit['id'] ?>"> <?php echo $doit['title']; ?> </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>

</div>