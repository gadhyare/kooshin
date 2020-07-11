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
    <h1 class="text-center"> سند قبض مرتب موظف </h1>
    <table class="print-table">
        <tbody>
            <?php if ($viewmodel) : ?>
                <?php foreach ($viewmodel as $paiditem) : ?>
                    <tr>
                        <td class="border p-1"> اسم الموظف: <?php echo $op->getempinfoById($paiditem['emp_id'], "emp_name"); ?> </td>
                        <td class="border p-1"> القسم الوظيفي: <?php echo $op->getJobsSecByempId($op->getempjobsInfo($paiditem['emp_id'], "em_sec_id")); ?> </td>
                        <td class="border p-1"> الدرجة الوظيفية : <?php echo $op->getJobsLevByempId($op->getempjobsInfo($paiditem['emp_id'], "em_lev_id")); ?> </td>
                        <td class="border p-1  "> الشهر المالي الحالي :
                            <input type="hidden" name="action_month" id="action_month" value="<?php echo (isset($_GET['action_month'])) ? $_GET['action_month'] : ''; ?>">
                            <span class="float-left px-2 py-1"><?php echo (isset($_GET['action_month'])) ? $_GET['action_month'] : ''; ?> </span> </td>
                    </tr>
                    <tr>
                        <td class="border p-1  "> ديون للشهر المالي الحالي : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_debt']; ?> </span> </td>
                        <td class="border p-1  "> العلاوات للشهر المالي الحالي: : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_allowance']; ?> </span> </td>
                        <td class="border p-1  "> الخصم المالي للشهر المالي الحالي : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_deductiont']; ?> </span> </td>
                        <td class="border p-1  "> المرتب للشهر المالي الحالي : <span class="float-left px-2 py-1">$<?php echo  $paiditem['empSellary']; ?> </span> </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <?php echo Data_Not_Founded; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <hr>


    <?php $getempsellarypaidprint = $op->getempsellarypaidprint($_GET['id']); ?>
    <table class="print-table table-bordered">
        <tr>
            <td class="text-center">
                سند الدفع
            </td>
            <td class="text-center">
                الشهر المالي
            </td>
            <td class="text-center">
                تاريخ الدفع
            </td>

            <td class="text-center">
                المبلغ المدفوع
            </td>
        </tr>
        <?php foreach ((array) $getempsellarypaidprint as $getempsellarypaidprintItem) : ?>
            <tr>
                <td class="text-center">
                    <?php echo $getempsellarypaidprintItem['emp_sellary_paid_id']; ?>
                </td>

                <td class="text-center">
                    <?php echo $getempsellarypaidprintItem['action_month']; ?>
                </td>
                <td class="text-center">
                    <?php echo $getempsellarypaidprintItem['emp_sellary_paid_date']; ?>
                </td>
                <td class="text-center">
                    $<?php echo $getempsellarypaidprintItem['emp_sellary_paid_ampount']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                الإجمالي: <?php echo $op->getSumempsellarypaidprint($_GET['id']); ?>$
            </td>
        </tr>
    </table>
    <hr>

    <table class="print-table table-bordered">
        <tr>
            <td colspan="3">
                أقر أن االمذكور أعلاه أني استملت المبالغ المالية المقررة في هذا السند
            </td>
            <td>
                توقيع الموظف: ____________
            </td>

        </tr>

    </table>


    <hr>
    <table class="print-table table-bordered">
        <tr>
            <td>
                توقيع الموظف المختص
            </td>
            <td>
                ____________
            </td>
            <td>
                توقيع المدير
            </td>
            <td>
                ____________
            </td>
        </tr>

    </table>

</div>
</div>
<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>