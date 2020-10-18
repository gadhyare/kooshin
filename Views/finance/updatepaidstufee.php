<?php

/**
 * fileName:    معلومات الرسوم
 */
?>
<div class="container">
    <?php $op = new Khas(); ?>
    <div class="row">
        <?php foreach ((array) $viewmodel as $item) : ?>

            <div class="col-xs-12 col-md-6">
                <div class="card p-0 rounded-0 border-0 z-depth-1">
                    <?php $op = new Khas(); ?>
                    <div class="card-header text-center text-white danger-color-dark p-1">
                        معلومات الرسوم
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td class="p-2" style="font-size: 80%"> ر. الجامع </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $item['stu_id']; ?> </td>
                                <td class="p-2" style="font-size: 80%"> اسم الطالب </td>
                                <td class="p-2" style="font-size: 80%" colspan="3"> <?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%"> البرنامج</td>
                                <td class="p-2" colspan="5" style="font-size: 80%"> <?php echo $op->GetSelProgInfoTxt($item['prog_id']); ?></td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%"> الفترة </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%"> القسم </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%"> المستوى </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%"> المجموعة </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%" colspan="3"> جهة الدفع </td>
                                <td class="p-2" style="font-size: 80%"> <?php $op->getPayResoTxt($item['Pay_Res_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%" colspan="5"> إجمالي سابق </td>
                                <td class="p-2" style="font-size: 80%"> $<?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id']); ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php $row = $op->getstupaidfeetoupdate($_GET['sta_id']); ?>
        <?php foreach ((array) $row as $editItem) : ?>
            <div class="col-xs-12 col-md-6">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="card">
                        <div class="card-header text-center text-white unique-color-dark p-1 mb-0">
                            سند قبض الرسوم
                        </div>
                        <div class="card-body pt-0 pb-1">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    تاريخ الدفع
                                    <input type="date" name="payDate" min="2019-01-01" value="<?php echo $editItem['payDate']; ?>" id="payDate" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    إجمالي المطلوب
                                    <input type="number" name="want" id="want" value="<?php echo $editItem['want']; ?>" class="form-control rounded-0" min="0" disabled>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    الخصم
                                    <input type="number" name="Discount" id="Discount" value="<?php echo $editItem['Discount']; ?>" min="0" value="<?php echo  $op->setPosts('Discount'); ?>" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    المدفوع
                                    <input type="number" name="amount" id="amount" value="<?php echo $editItem['amount']; ?>" step="any" class="form-control rounded-0" min="0">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    رقم السند
                                    <input type="text" name="statment_num" id="statment_num" value="<?php echo $editItem['statment_num']; ?>" min="0" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    ملاحظات
                                    <input type="text" name="note" id="note" value="<?php echo  $editItem['note']; ?>" class="form-control rounded-0" min="0">
                                </div>
                            </div>
                            <button type="submit" name="stupaidfeeupdate" class="btn success-color-dark text-white px-3 py-2"> رفع الرسوم </button>
                            <a href="<?php echo ROOT_URL; ?>/finance/feepaid" class="btn danger-color-dark text-white float-left px-3 py-2"> إلغاء </a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <br>
</div>