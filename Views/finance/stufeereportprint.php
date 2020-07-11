<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
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
    <h1 class="text-center"> تقرير مالية الفصل </h1>
    <table class="print-table">
        <tr>
            <td class="p-0" colspan="2">
                <label> البرنامج </label>
                <?php echo  $op->GetSelProgInfoTxt($_GET['prog']); ?>
            </td>
            <td class="p-0" colspan="2">
                <label> جهة الدفع </label>
                <?php echo  $op->getSelpaymentrestxt($_GET['Pay_Res_id']); ?>
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
    <?php $count =   $viewmodel ;?>
            <?php if( count((array) $viewmodel ) > 0 ):?>
    <table class="print-table">
        <thead>
            <th class="p-1  text-center"> م</th>
            <th class="p-1  text-center"> الاسم </th>
            <th class="p-1  text-center"> الرقم الجامعي </th>
            <th class="p-1  text-center"> الرسوم المطلوبة </th>
            <th class="p-1  text-center"> متبقي سابق </th>
            <th class="p-1  text-center"> الخصم </th>
            <th class="p-1  text-center"> المدفوع </th>
            <th class="p-1  text-center"> المتبقي </th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            
            <?php foreach ($viewmodel as $item) : ?>
                <tr>
                    <td class="p-1  text-center"> <?php echo $no++; ?> </td>
                    <td class="p-1  text-center"> <?php $op->getStuNameById($item['stu_id']); ?> </td>
                    <td class="p-1  text-center"> <?php echo $op->getStuInfoById($item['stu_id'],'stu_num'); ?> </td>
                    <td class="p-1  text-center">  <span id="want"><?php echo $op->GetSelFeeinfo($item['Invoice_id'],'want');?></span> $</td>
                    <td class="p-1  text-center">  <span id="pastPla"><?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id']); ?></span> $ </td>
                    <td class="p-1  text-center"> $<span id="discont"><?php echo $item['Discount'] ;?></span>   </td>
                    <td class="p-1  text-center"> <span id="amount"><?php echo $item['amount'] ;?></span> $</td>
                    <td class="p-1  text-center">  $<span id="allPlance"></span> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot style="border-top: 1px solid #333 !important;">
            <tr  class="border-dark">
                    <td class="p-1  text-center border-dark" colspan="3"> الإجماليات   </td>
                    <td class="p-1  text-center border-dark">  <span id="want"><?php echo $op->GetSelFeeinfo($item['Invoice_id'],'want');?></span> $</td>
                    <td class="p-1  text-center border-dark">  <span id="pastPla"><?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id']); ?></span> $ </td>
                    <td class="p-1  text-center border-dark"> $<span id="discont"><?php echo $item['Discount'] ;?></span>   </td>
                    <td class="p-1  text-center border-dark"> <span id="amount"><?php echo $item['amount'] ;?></span> $</td>
                    <td class="p-1  text-center border-dark">  $<span id="allPlance"></span> </td>
                </tr>
            </tfoot>
        
    </table>
            <?php else:?>
                <?php echo  Data_Not_Founded;?>
            <?php endif;?>

    <br>
    <span class="sing-section"> المدير المالي </span>
</div>




<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });


    var want = document.getElementById("want");
    var pastPla = document.getElementById("pastPla");
    var discont = document.getElementById("discont");
    var amount = document.getElementById("amount");
    var allPlance = document.getElementById("allPlance");

    allPlance.innerHTML =     (parseInt(want.innerHTML) + parseInt(pastPla.innerHTML))   -   (parseInt(discont.innerHTML) + parseInt(amount.innerHTML))  ;
</script>