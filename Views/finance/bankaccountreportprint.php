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
    <h1 class="text-center"> تقرير حركة الحسابات </h1>
    <table class="print-table float-right w-50">
        <tr>
            <td colspan="2"> رقم الحساب: <?php echo $op->getSelBankInfoById($_GET['banacc'], 'Ban_name'); ?> | <?php echo $op->getSelBankInfoById($_GET['banacc'], 'Ban_num'); ?> </td>
        </tr>
        <tr>
            <td> من تاريخ: <?php echo  $_GET['DFrm']; ?></td>
            <td> إلى تاريخ: <?php echo  $_GET['Dto']; ?> </td>
        </tr>
        <tr>
            <td> الحساب الإفتتاحي: <?php echo $op->getBankOpingamount($_GET['banacc']); ?> $ </td>
            <td> الرصيد الحالي: <?php echo $op->getaccountCurrentBlance($_GET['banacc']); ?> $ </td>
        </tr>
    </table>
    <div class="clearfix"></div>
    <table class="print-table border">
        <thead>
            <th class="border  text-center p-1"> # </th>
            <th class=" border text-center p-1"> التاريخ </th>
            <th class=" border text-center p-1"> الودائع </th>
            <th class=" border text-center p-1"> السحب </th>
            <th class=" border text-center p-1"> المرجع </th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
                <tr>
                    <?php $Incoming = ($item['Incoming'] > 0) ? $item['Incoming'] : 0; ?>
                    <?php $Outbound = ($item['Outbound'] > 0) ? $item['Outbound'] : 0; ?>
                    <td class="border text-center"> <?php echo $no++; ?> </td>
                    <td class="border text-right"> <?php echo  $item['mov_date']; ?></td>
                    <td class="border text-center"> $<?php echo $Incoming; ?> </td>
                    <td class="border text-center"> $<?php echo $Outbound; ?> </td>
                    <td class="border text-center"> <?php echo $item['parem']; ?> </td>
                </tr>
            <?php endforeach; ?>
        <tfoot>
            <tr>
                <td class="border text-center"> </td>
                <td class="border text-right"> </td>
                <td class="border text-center"> $<?php echo $op->getaccountIncomingTotal($_GET['banacc'], $_GET['DFrm'], $_GET['Dto']); ?> </td>
                <td class="border text-center"> $<?php echo $op->getaccountOutboundTotal($_GET['banacc'], $_GET['DFrm'], $_GET['Dto']); ?> </td>
                <td class="border text-center"> </td>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>

<script>
    window.print();
    window.addEventListener('cnacelprint', (event) => {
        window.close();
    });
</script>