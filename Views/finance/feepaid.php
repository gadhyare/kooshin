<?php

/**
 * fileName: دفع رسوم
 */
?>
<div class="container ">
    <div class="card-header p-1 text-center unique-color-dark text-white rounded-0"> معلومات الرسوم على الطالب </div>
    <?php $op = new Khas(); ?>
    <div class="card-bod   table-responsive  table-sm ">
        <table class="table  " id="myTable">
            <thead>
                <tr>
                    <th style="font-size: 70%;" class="p-1 text-center">#</th>
                    <th style="font-size: 70%;" class="p-1 text-center">اسم الطالب</th>
                    <th style="font-size: 70%;" class="p-1 text-center">الرقم الجامعي</th>
                    <th style="font-size: 70%;" class="p-1 text-center">المستوى</th>
                    <th style="font-size: 70%;" class="p-1 text-center">المجموعة</th>
                    <th style="font-size: 70%;" class="p-1 text-center">القسم</th>
                    <th style="font-size: 70%;" class="p-1 text-center">الفترة</th>
                    <th style="font-size: 70%;" class="p-1 text-center">البرنامج</th>
                    <th style="font-size: 70%;" class="p-1 text-center">جهة الدفع</th>
                    <th style="font-size: 70%;" class="p-1 text-center">المطلوب</th>
                    <th style="font-size: 70%;" class="p-1 text-center">حالة الرسوم</th>
                    <th style="font-size: 70%;" class="p-1 text-center"> العمليات </th>
                </tr>
            </thead>
            <tbody>
                <?php $row = json_decode($viewmodel); ?>
                <?php foreach ((array) $row as $item) : ?>
                    <tr>
                        <td>#</td>
                        <td style="font-size: 70%;"> <?php echo $op->getStuInfoById($item->stu_id, "StuName"); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->getStuInfoById($item->stu_id, "stu_num"); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->GetSellevelsTxt($item->lev_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->GetSelgroupsTxt($item->grp_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->getSelesectionTxt($item->sec_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->getSelDepartmentTxt($item->dep_id); ?> </td>
                        <td style="font-size: 70%;"> <?php echo $op->FullSelProgInfotxt($item->prog_id); ?> </td>
                        <td style="font-size: 70%;"><?php echo $op->getSelpaymentrestxt($item->Pay_Res_id); ?></td>
                        <td>$<?php echo $item->want; ?></td>
                        <td style="font-size: 70%;"> <?php echo ($item->AccountStatuse == 1) ? "قيد الإجراء" : ""; ?> </td>
                        <td style="font-size: 70%;">
                            <?php if ($op->chkSelProg($item->prog_id)) : ?>
                                <button class="btn primary-color-dark dropdown-toggle text-white p-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:70% !important">
                                    العمليات
                                </button>

                                <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                                    <?php $editFee = "تعديل الرسم"; ?>
                                    <?php $paidFee = "دفع الرسم"; ?>
                                    <?php $deleteFee = "حذف الرسم"; ?>
                                    <a href="<?php echo ROOT_URL; ?>/finance/updatestuFee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1   text-right     " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="تعديل الرسوم"> <?php echo  $editFee; ?> </a>
                                    <a href="<?php echo ROOT_URL; ?>/finance/paidstufee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1   text-right     " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="دفع الرسوم"> <?php echo  $paidFee; ?> </a>
                                    <a href="<?php echo ROOT_URL; ?>/finance/deletestuFee/<?php echo $item->Invoice_id; ?>" class="dropdown-item px-2 py-1   text-right     " style="color:#000 !important; font-size:12px;  " data-toggle="tooltip" title="حذف الرسوم"> <?php echo  $deleteFee; ?> </a>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>