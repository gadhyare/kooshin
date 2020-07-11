<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <div class="header-section">
        <div class="logo-section">
            <img src="<?php echo $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $op->siteSetting('siteLogo'); ?>" style="height:80px; width:80px;" class="rounded-circle" alt="">
        </div>
        
            <div class="info-section">
                <?php echo $op->siteSetting('siteName'); ?>
                <br>
                <?php echo $op->siteSetting('siteDisc'); ?>
                <br>
                <?php echo $op->siteSetting('siteAddr'); ?>
                <br>
                <?php echo $op->siteSetting('sitePhones'); ?>
                <br>
                تاريخ الطباعة: <?php echo date("Y-M-d", time()); ?>
            </div>
    </div>

    <hr class="hr">
    <h1 class="text-center">   قائمة مواد التخصص </h1>
    <hr>
     <div class="container text-center"> <?php echo $op->FulltextProgInfo($_GET['pro_id']);?> </div>
     <hr>
    <table class="print-table">
        <thead>
            <tr>
                <td class="p-1  text-center"> المسلسل</td>
                <td class="p-1  text-center"> اسم المادة</td>
                <td class="p-1  text-center"> كود المادة</td>
                <td class="p-1  text-center"> الحالة</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php $json = json_decode($viewmodel); ?>
            <?php foreach ((array) $json   as $items => $key) : ?>
                <tr>
                    <td class="p-1"><?php echo $i++; ?></td>
                    <td class="p-1"><?php echo $key->subject_name;  ?></td>
                    <td class="p-1"><?php echo $key->subject_code;  ?></td>
                    <td class="p-1"><?php echo ($key->active == 1) ? 'مفعل' : 'غير مفعل'; ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>