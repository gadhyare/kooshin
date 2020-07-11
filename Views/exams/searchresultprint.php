<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <div class="header-section">
        <div class="logo-section">
            <img src="<?php echo $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $op->siteSetting('siteLogo'); ?>" style="height:80px; width:80px;" class="rounded-circle" alt="">
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
    <h1 class="text-center"> تقرير اختبار مادة </h1>
     
    <table class="print-table">
        <tr>
            <td colspan="5"> البرنامج: <?php echo $op->GetSelProgInfoTxt($_GET['prog_id']); ?> </td>
        </tr>
        <tr>
            <td> القسم :<?php echo $op->getSelesectionTxt($_GET['sec_id']); ?> </td>
            <td> الفترة: <?php echo $op->getSelDepartmentTxt($_GET['dep_id']); ?> </td>
            <td> المستوى: <?php echo $op->GetSellevelsTxt($_GET['lev_id']); ?> </td>
            <td> المجموعة: <?php echo $op->GetSelgroupsTxt($_GET['grp_id']); ?> </td>
            <td> المادة: <?php echo $op->getSelExsubTxt($_GET['sub_id']); ?> </td>
        </tr>
    </table>
    <hr class="hr">
    <table class="print-table  ">
            <tr>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> م</td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2">الرقم الجامعي </td>
                <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                    الفترة الأولى
                </td>
                <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                    الفترة الثاني
                </td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> الحضور </td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> المجموع</td>
                <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> التقدير</td>
             
            </tr>
            <tr>
                <td class="p-1 purple darken-4 text-white text-center"> الأسئلة</td>
                <td class="p-1 purple darken-4 text-white text-center"> البحث</td>
                <td class="p-1 purple darken-4 text-white text-center"> الإختبار</td>
                <td class="p-1 purple darken-4 text-white text-center"> الأسئلة</td>
                <td class="p-1 purple darken-4 text-white text-center"> البحث</td>
                <td class="p-1 purple darken-4 text-white text-center"> الإختبار </td>
            </tr>

            <tbody>
                <?php $no = 1; ?>
                <?php $items = json_decode($viewmodel); ?>
                <?php if (count((array) $items) > 0) : ?>
                    <?php foreach ($items as $SearchResultShow => $val  ) : ?>
                        <tr>
                            <td class="p-0 text-center"> <i id="no"> <?php echo $no++; ?></i> </td>
                            <td class="p-0 text-center"> <?php echo $val->stu_id; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->qu1; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->as1; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->ex1; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->qu2; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->as2; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->ex2; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->att; ?></td>
                            <td class="p-0 text-center"> <?php echo $val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att; ?></td>
                            <td class="p-0 text-center"> <?php echo $op->get_gpa($val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att); ?></td>
                     >
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($no == 1) {
                    echo '<tr class="alert alert-danger " > <td colspan="13" class="text-center"> عفواً ولكن لا توجد بيانات لعرضها  </td></tr>';
                } ?>
                <div class="alert alert-info float-left text-dark rounded-0 py-1 ml-1"> <?php if ($no > 1) echo 'عدد الطلبة هو: ' . ($no - 1); ?> </div>
                </tr>
        </table>
    


</div>
<script>
    window.onload = function() {
        window.print();
         
    }
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>

 