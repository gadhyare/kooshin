<?php

/**
 * fileName: البرامج العلمية للطالب
 */
?>
<?php $ops = new Khas(); ?>
<a href="<?php echo ROOT_URL; ?>/student/StudentacademicProadd/<?php echo $_GET['id']; ?>" target="_blank" class="btn success-color-dark text-white mt-2 float-left rounded-0 mb-2 p-2">
  <i class="fa fa-plus" aria-hidden="true"></i> اضافة مؤهل جديد </a>
<table class="table tables  ">


  <thead>
    <tr>
      <th class="p-1  bg-dark text-white"> المسلسل</th>
      <th class="p-1  bg-dark text-white"> البرنامج </th>
      <th class="p-1  bg-dark text-white"> المستوى </th>
      <th class="p-1  bg-dark text-white"> المجموعة </th>
      <th class="p-1  bg-dark text-white"> تاريخ التسجيل </th>
      <th class="p-1  bg-dark text-white"> خصم خاص </th>
      <th class="p-1  bg-dark text-white"> الحالة </th>
      <th class="p-1  bg-dark text-white"> العمليات </th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php $rt = $ops->getStudentacademicPro(); ?>
    <?php foreach ((array) $rt as $edu_eql_ifo) : ?>
      <tr>
        <td class="p-1"><?php echo $i; ?></td>
        <td class="p-1 ">

          <?php echo $ops->FulltextProgInfo($edu_eql_ifo['prog_id']); ?>

        <td class="p-1">

          <?php echo $ops->GetSellevelsTxt($edu_eql_ifo['lev_id']); ?>

        </td>
        <td class="p-1">

          <?php echo $ops->GetSelgroupsTxt($edu_eql_ifo['grp_id']); ?>

        </td>
        <td class="p-1"><?php echo $edu_eql_ifo['reg_date']; ?> </td>
        <td class="p-1"><?php echo $edu_eql_ifo['Prog_Discount']; ?> </td>
        <td class="p-1"><?php echo $edu_eql_ifo['statues']; ?> </td>
        <td class="p-1 text-center">
          <?php if ($op->chkSelProg($edu_eql_ifo['prog_id'])) : ?>
            <?php $urlFee = "prog_id=" . $edu_eql_ifo['prog_id'] . "&dep_id=" . $edu_eql_ifo['dep_id'] . "&lev_id=" . $edu_eql_ifo['lev_id'] . "&sec_id=" . $edu_eql_ifo['sec_id'] . "&grp_id=" . $edu_eql_ifo['grp_id']; ?>
            <a href="<?php echo ROOT_URL; ?>/student/StudentacademicProupdate/<?php echo $edu_eql_ifo['stu_ac_pro']; ?>" target="_blanck" class="px-1 success-color-dark text-white text-center ml-1" style="font-size:80%;"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
            <a href="<?php echo ROOT_URL; ?>/finance/stufeeclasstrando/<?php echo $edu_eql_ifo['stu_id']; ?>/s?<?php echo $urlFee; ?>" target="_blanck" class="px-1 primary-color-dark text-white text-center ml-1" style="font-size:80%;"> <i class="fa fa-dollar" aria-hidden="true"></i> </a>
            <a href="<?php echo ROOT_URL; ?>/student/StudentacademicProdel?pro_id=<?php echo $edu_eql_ifo['stu_ac_pro']; ?>&stu_id=<?php echo $edu_eql_ifo['stu_id']; ?>" target="_blanck" class="px-1 danger-color-dark text-white text-center ml-1" style="font-size:80%;"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
          <?php endif; ?>
        </td>
      </tr>
    <?php
      $i++;
    endforeach; ?>
  </tbody>
</table>