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
    <h1 class="text-center"> سند قبض </h1>
    <table class="print-table">
        <tr>
            <td> الاسم:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
            <td> الرقم الجامعي: <?php echo $item['stu_id']; ?> </td>
            <td colspan="3"> البرنامج: <?php echo $op->GetSelProgInfoTxt($item['prog_id']); ?> </td>
        </tr>
        <tr>
            <td> القسم :<?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
            <td> الفترة: <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
            <td> المستوى: <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
            <td> المجموعة: <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
            <td> جهة الدفع: <?php $op->getPayResoTxt($item['Pay_Res_id']); ?> </td>
        </tr>
        <tr>
            <td> مطلوب حالي: <?php echo  $item['want']; ?>$ </td>
            <td colspan="2"> متبقي سابق: <?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id']); ?>$ </td>
            <td colspan="2"> إجمالي المطلوب: <span id="totWant"><?php echo $item['want'] + $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id']); ?></span>$ </td>
        </tr>
    </table>
    <br>
<?php endforeach; ?>
<table class="print-table">
    <thead>
        <td> # </td>
        <td> ترقيم السند </td>
        <td> التاريخ </td>
        <td> الخصم </td>
        <td> المدفوع </td>
        <td> ملاحظات </td>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $row =  $op->getstuFeetranstion($_GET['id']); ?>
        <?php foreach ((array) $row as $item) : ?>
            <tr>
                <td style="width:5%"> <?php echo $i++; ?> </td>
                <td style="width:15%"> <?php echo $item['statment_num']; ?> </td>
                <td style="width:10%"> <?php echo $item['payDate']; ?> </td>
                <td style="width:10%"> $<?php echo $item['Discount']; ?> </td>
                <td style="width:5%"> $<?php echo $item['amount']; ?> </td>
                <td style="width:40%"> <?php echo $item['note']; ?> </td>
            </tr>
        <?php endforeach; ?>
    <tfoot>
        <tr>
            <td colspan="3"> الإجمالي </td>
            <td style="width:15%"> $<?php echo $op->getallstupaidFeeCuLev($_GET['id'], 'Discount'); ?> </td>
            <td style="width:10%"> <span id="totPaid"> <?php echo $op->getallstupaidFeeCuLev($_GET['id'], 'amount') ?> </span>$ </td>
            <td style="width:10%"> إجمالي المتقي: <span id="totPlance"> </span> $ </td>
        </tr>
    </tfoot>

    </tbody>
</table>
<br>
<span class="sing-section"> المدير المالي </span>
</div>

<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
    var totPlance = document.getElementById("totPlance");
    var totWant = document.getElementById("totWant");
    var totPaid = document.getElementById("totPaid");

    totPlance.innerHTML = totWant.innerHTML - totPaid.innerHTML;
</script>