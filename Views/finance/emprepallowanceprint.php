<?php

/**
 * fileName: طباعة علاوات المدرسين
 */
?>

<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header("تقرير علاوات الموظفين"); ?>
 
    <h6 class="text-center border-top"> من تاريخ: <?php echo  $_GET['DFrm']; ?> حتى تاريخ: <?php echo  $_GET['Dto']; ?> </h6>
    <table class="print-table">
        <thead>
            <th class="border text-center p-1"> # </th>
            <th class="border text-center p-1"> اسم الموظف </th>
            <th class="border text-center p-1"> سبب العلاوة </th>
            <th class="border text-center p-1"> التاريخ </th>
            <th class="border text-center p-1"> الشهر المالي </th>
            <th class="border text-center p-1"> المبلغ </th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
                <tr>
                    <td class="text-center"> <?php echo $no++; ?> </td>
                    <td class="text-right"> <?php echo $op->getempinfoById($item['emp_id'], "emp_name"); ?> </td>
                    <td class="text-center"> <?php echo $op->getSeltallowancetypetxt($item['allowancetype_id']); ?> </td>
                    <td class="text-center"> <?php echo $item['emp_allowance_date']; ?> </td>
                    <td class="text-center"> <?php echo $item['action_month']; ?> </td>
                    <td class="text-center"> $<?php echo $item['emp_allowance_amount']; ?> </td>
                </tr>
            <?php endforeach; ?>
        <tfoot>
            <tr>
                <td class="border text-center" colspan="5"> المجموع </td>
                <td class="border text-center"> $<?php echo $op->getSumempallowanceprint($_GET['DFrm'], $_GET['Dto']); ?> </td>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
<?php $op->get_report_footer(); ?>
<script>
    window.print();
    window.addEventListener('cnacelprint', (event) => {
        window.close();
    });
</script>