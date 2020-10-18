<?php

/**
 * fileName: رفع رسوم على الطلبة
 */
?>
<div class="container p-2">
    
    <?php $op = new Khas(); ?>
    <?php $item = json_decode($viewmodel); ?>
    <table class="table w-100" id="myTable">
        <thead class="unique-color-dark text-white">
            <tr>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    م
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    البرنامج
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    الفترة
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    المستوى
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    القسم
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    المجموعة
                </th>
                <th class="p-2 text-center info-color-dark" style="font-size:80%">
                    العمليات
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ((array) $item as $titem) : ?>
                <tr>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $i++; ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">

                        <?php echo $op->FullSelProgInfotxt($titem->prog_id); ?>

                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->getSelDepartmentTxt($titem->dep_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->GetSellevelsTxt($titem->lev_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->getSelesectionTxt($titem->sec_id); ?>
                    </td>
                    <td class="p-2 text-center" style="font-size:80%">
                        <?php echo $op->GetSelgroupsTxt($titem->grp_id); ?>
                    </td>
                    <?php $UrlVal = "prog_id=$titem->prog_id&dep_id=$titem->dep_id&lev_id=$titem->lev_id&sec_id=$titem->sec_id&grp_id=$titem->grp_id"; ?>
                    <td class="p-2 text-center" style="font-size:80%">
                    <?php if ($op->chkSelProg($titem->prog_id)) : ?>
                        <a href="<?php echo ROOT_URL; ?>/finance/feeclasstrando/s?<?php echo $UrlVal; ?>" class="btn purple darken-4 text-white p-1 rounded"> ترحيل الرسوم </a>
                    <?php endif;?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>