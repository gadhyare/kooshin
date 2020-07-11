<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <div class="header-section">
        <div class="logo-section">
            <img src="<?php echo $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $op->siteSetting('siteLogo'); ?>" style="height:150px; width:150px;" class="rounded-circle p-0" alt="">
        </div>
        <?php foreach ((array) $viewmodel as $item) : ?>
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
    <h1 class="text-center"> قائمة الطلبة </h1>
<?php endforeach; ?>
<table class="print-table">
    <tr>
        <td class="p-0" colspan="4">
            <label> البرنامج </label>
            <?php echo  $op->GetSelProgInfoTxt($_GET['prog']); ?>
        </td>
    </tr>
    <tr>
        <td class="p-0">
            <label> الفترة </label>
            <?php echo $op->getSelDepartmenttxt($_GET['dep']); ?>
        </td>
        <td class="p-0">
            <label> القسم </label>
            <?php echo $op->getSelesectiontxt($_GET['sec']); ?>
        </td>
        <td class="p-0">
            <label> المستوى </label>
            <?php echo $op->GetSellevelstxt($_GET['lev']); ?>
        </td>
        <td class="p-0">
            <label> المجموعة </label>
            <?php echo  $op->GetSelgroupsTxt($_GET['grp']); ?>
        </td>
    </tr>
</table>
 
    <hr>
    <div id="idCount"></div>
 
        <table class="print-table">
            <thead>
                <th class="p-1  text-center"> م</th>
                <th class="p-1  text-center"> الاسم </th>
                <th class="p-1  text-center"> الرقم الجامعي </th>
                <th class="p-1  text-center"> تاريخ التسجيل </th>
                <th class="p-1  text-center"> الهاتف </th>
                <th class="p-1  text-center"> الحالة</th>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $items = json_decode($viewmodel); ?>
                <?php if (count((array) $items) > 0) : ?>
                    <?php foreach ($items as $SearchResultShow => $val) : ?>
                        <tr>
                            <td class="p-0 text-center"> <i id="no"> <?php echo $no++; ?></i> </td>
                            <td class="p-0 text-right"> <?php echo $op->getStuNameById($val->stu_id); ?></td>
                            <td class="p-0 text-center"> <?php echo $op->getStuInfoById($val->stu_id, 'stu_num'); ?></td>
                            <td class="p-0 text-center"> <?php echo $val->reg_date; ?></td>
                            <td class="p-0 text-left"> <?php echo $op->getStuInfoById($val->stu_id, 'Phones'); ?></td>
                            <td class="p-0 text-center"> <?php echo $val->statues; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($no == 1) {
                    echo '<tr class="alert alert-danger " > <td colspan="13" class="text-center"> عفواً ولكن لا توجد بيانات لعرضها  </td></tr>';
                } ?>
                <div class="alert alert-info float-left text-dark rounded-0 py-1 ml-1"> <?php if ($no > 1) echo 'عدد الطلبة هو: ' . ($no - 1); ?> </div>
                </tr>
        </table>
 

    <script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>