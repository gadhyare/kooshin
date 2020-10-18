<?php

/**
 * fileName: طباعة معلومات الطالب  
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header("معلومات الطالب"); ?>


    <?php
    $data  = json_decode($viewmodel); ?>
    <table class="print-table mt-2">
        <?php foreach ((array) $data as $ta => $item) : ?>
            <img src="<?php echo  $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $item->stu_pic; ?>" class="float-left" alt="">
            <tr>
                <td colspan="5" class="text-center"> المعلومات الشخصية </td>
            </tr>
            <tr>

                <td> مسلسل : <?php echo $item->stu_id; ?> </td>
                <td colspan="2"> الاسم : <?php echo $item->StuName; ?> </td>
                <td> الرقم الجامعي : <?php echo $item->stu_num; ?> </td>
                <td> تاريخ التسجيل: <?php echo $item->reg_date; ?> </td>

            </tr>
            <tr>
                <td colspan="2"> اسم الأم : <?php echo $item->mothername; ?> </td>
                <td> تاريخ الميلاد : <?php echo $item->DOB; ?> </td>
                <td> مكان الميلاد : <?php echo $item->POB; ?> </td>
                <td> الجنس : <?php echo ($item->gender  == 1) ? "ذكر" : "أنثى"; ?> </td>
            </tr>
            <tr>
                <td> الجنسية : <?php echo $item->Natinality; ?> </td>
                <td> العنوان: <?php echo $item->StuAddress; ?> </td>
                <td> المدينة : <?php echo $item->city; ?> </td>
                <td> الدولة : <?php echo $item->contry; ?> </td>
                <td> الهواتف : <?php echo $item->Phones; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!--=====================================================================================================-->
    <br>
    <br>

    <table class="print-table mt-2">

        <tr>
            <td colspan="8" class="text-center"> معلومات قريب الطالب</td>
        </tr>
        <tr>
            <td class="p-1 " style="color: #000;"> المسلسل</td>
            <td class="p-1 " style="color: #000;"> اسم القريب </td>
            <td class="p-1 " style="color: #000;"> صلة القرابة </td>
            <td class="p-1 " style="color: #000;"> درجة القرابة</td>
            <td class="p-1 " style="color: #000;"> العنوان </td>
            <td class="p-1 " style="color: #000;"> الإيميل </td>
            <td class="p-1 " style="color: #000;"> العنوان </td>
            <td class="p-1 " style="color: #000;">الهواتف</td>
        </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php $rt = $op->getStuRelInfo(); ?>
            <?php foreach ((array) $rt as $relInfo) : ?>
                <tr>
                    <td class="p-1"><?php echo $i; ?></td>
                    <td class="p-1" style="font-size:90%;"><?php echo $relInfo['rel_name'];  ?></td>
                    <td class="p-1">
                        <?php echo   $op->get_Rel_type($relInfo['rel_type']); ?> </td>
                    <td class="p-1"><?php echo $op->getrel_lev($relInfo['rel_lev']); ?> </td>
                    <td class="p-1"><?php echo $relInfo['rel_Address']; ?> </td>
                    <td class="p-1"><?php echo $relInfo['rel_email']; ?> </td>
                    <td class="p-1"><?php echo $relInfo['rel_Address']; ?> </td>
                    <td class="p-1"><?php echo $relInfo['rel_phones'];; ?> </td>
                </tr>
            <?php
                $i++;
            endforeach; ?>
        </tbody>
    </table>
    <!--=====================================================================================================-->
    <br>
    <br>
    <table class="print-table mt-2">
        <tr>
            <td colspan="5" class="text-center"> المؤهلات العلمية للطالب </td>
        </tr>
        <tr>
            <td class="p-1 " style="color: #000;"> المسلسل</td>
            <td class="p-1 " style="color: #000;"> درجة المؤهل </td>
            <td class="p-1 " style="color: #000;"> تاريخ المؤهل </td>
            <td class="p-1 " style="color: #000;"> جهة المؤهل </td>
            <td class="p-1 " style="color: #000;"> لغة المؤهل </td>
        </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php $rt = $op->getStuRelIquali(); ?>
            <?php foreach ((array) $rt as $edu_eql_ifo) : ?>
                <tr>
                    <td class="p-1"><?php echo $i; ?></td>
                    <td class="p-1" style="font-size:90%;color:#000"><?php echo $edu_eql_ifo['Edu_quali'];  ?></td>
                    <td class="p-1"> <?php echo $edu_eql_ifo['Edu_year']; ?> </td>
                    <td class="p-1"><?php echo $edu_eql_ifo['Edu_Issuer']; ?> </td>
                    <td class="p-1"><?php echo $edu_eql_ifo['Edu_lang']; ?> </td>

                </tr>
            <?php
                $i++;
            endforeach; ?>
        </tbody>
    </table>
    <!--=====================================================================================================-->
    <br>
    <br>
    <table class="print-table mt-2">
        <tr>
            <td colspan="7" class="text-center"> المعلومات الأكاديمية </td>
        </tr>
        <tr>
            <td class="p-1" style="color: #000;"> المسلسل</td>
            <td class="p-1" style="color: #000;"> البرنامج </td>
            <td class="p-1" style="color: #000;"> المستوى </td>
            <td class="p-1" style="color: #000;"> المجموعة </td>
            <td class="p-1" style="color: #000;"> تاريخ التسجيل </td>
            <td class="p-1" style="color: #000;"> خصم خاص </td>
            <td class="p-1" style="color: #000;"> الحالة </td>
        </tr>

        <tbody>
            <?php $i = 1; ?>
            <?php $rt = $op->getStudentacademicPro(); ?>
            <?php foreach ((array) $rt as $edu_eql_ifo) : ?>
                <tr>
                    <td class="p-1"><?php echo $i; ?></td>
                    <td class="p-1 ">
                        <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0 bg-white text-dark border-0 col-12" style="font-size:70% ; width: auto" disabled>
                            <?php echo $op->FullSelProgInfo($edu_eql_ifo['prog_id']); ?>
                        </select>
                    <td class="p-1">
                        <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0 bg-white text-dark border-0 col-12" style="font-size: 70%;" disabled>
                            <?php echo $op->GetSellevels($edu_eql_ifo['lev_id']); ?>
                        </select>
                    </td>
                    <td class="p-1">
                        <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0 bg-white text-dark border-0 col-12" style="font-size: 70%;" disabled>
                            <?php echo $op->GetSelgroups($edu_eql_ifo['grp_id']); ?>
                        </select>
                    </td>
                    <td class="p-1"><?php echo $edu_eql_ifo['reg_date']; ?> </td>
                    <td class="p-1"><?php echo $edu_eql_ifo['Prog_Discount']; ?> </td>
                    <td class="p-1"><?php echo $edu_eql_ifo['statues']; ?> </td>
                </tr>
            <?php
                $i++;
            endforeach; ?>
        </tbody>
    </table>

    <br>
    <br>


</div>

<?php $op->get_report_footer();?>
<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>