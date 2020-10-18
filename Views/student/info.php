<?php

/**
 * fileName:   معلومات   طالب
 */
?>
<?php $op = new Khas(); ?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('هل أنت متأكد من القيام بالعملية التالية؟');">
  <div class="container ">
    <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/register" class="btn primary-color-dark text-white  px-3 py-2   "> <i class="fa fa-plus" aria-hidden="true"></i> تسجيل طالب جديد </a>
    <button type="submit" name="multiDel" id="multiDel" class="btn danger-color-dark text-white px-3 py-2"> حذف متعدد </button>
    <button type="submit" name="multChange" id="multChange" class="btn danger-color-dark text-white px-3 py-2 float-left"> تحويل القسم </button>
    <select name="changeto" id="changeto" class="form-control border rounded-0 col-2 text-center float-left p-0 mt-1  ml-2" style="font-size:80%">
      <?php $op->get_section(); ?>
    </select>
    <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/searchstuinfo" class="btn unique-color-dark text-white px-3 py-2 "> <i class="fa fa-search"></i> البحث </a>
    <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/downloads/empty_sudents_list.xlsx" class="btn success-color-dark text-white  px-3 py-2   "> <i class="fa fa-download" aria-hidden="true"></i> قائمة طلبة </a>
  </div>

  <div class="table-responsive">
    <table class="table" id="myTable">
      <thead>
        <th class="p-2 stylish-color text-center" style="font-size:70%">ر الجامعي</th>
        <th class="py-2 px-4 stylish-color text-center">
          <input type="checkbox" name="chkall" id="chkall">
        </th>
        <th class="p-2 stylish-color text-center" style="font-size:90%"> الاسم </th>
        <th class="p-2 stylish-color text-center" style="font-size:90%"> الرقم الجامعي </th>
        <th class="p-2 stylish-color text-center" style="font-size:80%">الجنس</th>
        <th class="p-2 stylish-color text-center" style="font-size:80%">تاريخ الميلاد</th>
        <th class="p-2 stylish-color text-center" style="font-size:80%">مكان الميلاد</th>
        <th class="p-2 stylish-color text-center" style="font-size:70%"> الجنسية </th>
        <th class="p-2 stylish-color text-center" style="font-size:80%"> العنوان </th>
        <th class="p-2 stylish-color text-center" style="font-size:80%">تاريخ التسجيل</th>
        <th class="p-2 stylish-color text-center" style="font-size:80%">العمليات</th>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($viewmodel as $itemss) : ?>
          <?php $gender = ($itemss['gender'] == 2) ? "ذكر" : "أنثى"; ?>
          <t>
            <th class="p-2 text-center bg-white text-dark" style="font-size:70%" scope="row"> <?php echo $itemss['stu_id']; ?> </th>
            <td class="p-2 text-center" style="font-size:70%"> <input type="checkbox" name="chk[]" id="chkitem" value="<?php echo $itemss['stu_id']; ?>"> </td>
            <td class="p-2 text-right" style="font-size:80%"> <?php echo $itemss['StuName'];  ?> </td>
            <td class="p-2 text-center" style="font-size:80%"> <?php echo $itemss['stu_num'];  ?> </td>
            <td class="p-2 text-center" style="font-size:80%"> <?php echo $op->getSelesectionTxt($itemss['gender']);  ?> </td>
            <td class="p-2 text-center" style="font-size:80%"><?php echo $itemss['DOB'];  ?></td>
            <td class="p-2 text-center" style="font-size:80%"><?php echo $itemss['POB'];  ?></td>
            <td class="p-2 text-center" style="font-size:80%"><?php echo $itemss['Natinality'];  ?></td>
            <td class="p-2 text-center" style="font-size:80%"> <?php echo $itemss['StuAddress'];  ?> </td>
            <td class="p-2 text-center" style="font-size:80%"> <?php echo  $itemss['reg_date']; ?></td>
            <td class="p-2 text-center" style="font-size:70%">
              <button class="btn pink darken-3 text-white dropdown-toggle p-1 m-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                العمليات
              </button>
              <div class="dropdown-menu p-1 text-right" aria-labelledby="dropdownMenuButton">
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/update/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> تحديث </a>
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/stuInfoPrint/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> طباعة </a>
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/finance/feepaid/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> الرسوم </a>
              </div>
            </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>

</form>