<br>
<br>
<div class="container print-page">
    <?php   $op = new Khas(); ?>
    <div class="header-section">
        <div class="logo-section">
            <img src="<?php echo $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $op->siteSetting('siteLogo'); ?>" style="height:150px; width:150px;" class="rounded-circle p-0" alt="">
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
    <h1 class="text-center"> تقرير مالية طالب/طالبة </h1>
    <table class="print-table">
        <tr>
            <td class="p-0" colspan="2">
                <label> البرنامج </label>
                <?php echo  $op->GetSelProgInfoTxt($_GET['stu_prog']); ?>
            </td>
            <td class="p-0" colspan="2">
                <label> جهة الدفع </label>
                <?php echo  $op->getSelpaymentrestxt($_GET['stu_Pay_Res_id']); ?>
            </td>
        </tr>
        <tr>
            <td class="p-0" colspan="2">
                <label> الإسم </label>
                <?php echo  $op->getStuInfoByStunm($_GET['id'], 'StuName'); ?>
            </td>
            <td class="p-0" colspan="2">
                <label> الرقم الجامعي </label>
                <?php echo   $_GET['id']; ?>
            </td>
        </tr>
    </table>

    <hr>
    <div id="idCount"></div>
    <?php $count =   $viewmodel; ?>
    <?php if (count((array) $viewmodel) > 0) : ?>
        <table class="print-table">
            <?php $no = 1; ?>
            <?php foreach ($viewmodel as $item) : ?>
                <thead>

                    <th class="p-0" colspan="2">
                        الفترة
                        <?php echo $op->getSelDepartmenttxt($item['dep_id']); ?>
                    </th>
                    <th class="p-0">
                        القسم
                        <?php echo $op->getSelesectiontxt($item['sec_id']); ?>
                    </th>
                    <th class="p-0">
                        المستوى
                        <?php echo $op->GetSellevelstxt($item['lev_id']); ?>
                    </th>
                    <th class="p-0">
                        المجموعة
                        <?php echo  $op->GetSelgroupsTxt($item['grp_id']); ?>
                    </th>
                    <th class="p-1  text-center" colspan="2">$ <?php echo $item['want']; ?> </th>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-1  text-center"> # </td>
                        <td class="p-1  text-center"> تاريخ الدفع </td>
                        <td class="p-1  text-center"> المبلغ المدفوع </td>
                        <td class="p-1  text-center"> الخصم </td>
                        <td class="p-1  text-center"> رقم السند </td>
                        <td class="p-1  text-center"> ملاحظات </td>
                    </tr>
                    <?php $getSubData = $op->getFeeTansByInvoiceId($item['Invoice_id']); ?>
                    <?php foreach ((array) $getSubData as $getSubDataItems) : ?>
                        <tr>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['sta_id'] ?> </td>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['payDate']; ?> </td>
                            <td class="p-1  text-center"> $<?php echo $getSubDataItems['amount']; ?> </td>
                            <td class="p-1  text-center"> $<?php echo $getSubDataItems['Discount']; ?> </td>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['statment_num']; ?> </td>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['note']; ?></td>
                        </tr>
                </tbody>
            <?php endforeach; ?>
            <tr>
                <td class="p-1  text-center grey" colspan="2"> الإجمالي </td>
                <td class="p-1  text-center grey"> $<?php echo $op->getallstupaidFeeCuLev($item['Invoice_id'], 'amount'); ?> </td>
                <td class="p-1  text-center grey"> $<?php echo $op->getallstupaidFeeCuLev($item['Invoice_id'], 'Discount') ?> </td>
                <td class="p-1  text-center grey" colspan="2"> المتبقي: <span id="totblance<?php echo $no++; ?>"> <?php echo $item['want'] -  $op->getallstupaidFeeCuLev($item['Invoice_id'], 'Discount') - $op->getallstupaidFeeCuLev($item['Invoice_id'], 'amount'); ?> </span> $ </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td class="p-1  text-left " colspan="6"> كامل المتبقي لجهة الدفع الحالية: <?php echo $op->getAllStuBlnace($_GET['id'], 'stu_id'); ?>$ </td>
        </tr>
        </table>
    <?php else : ?>
        <?php echo  Data_Not_Founded; ?>
    <?php endif; ?>

    <br>

    <span class="sing-section"> المدير المالي </span>
</div>




<script>

window.print();
         
   
         window.addEventListener('afterprint', (event) => {
             window.close();
         });
</script>