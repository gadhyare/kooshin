  <?php
  /**
   * fileName: معلومات الموظفين
   */
  ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="container ">
      <a href="<?php echo ROOT_URL; ?>/employees/empinfoadd" class="btn primary-color-dark text-white  px-3 py-1   "> <i class="fa fa-plus" aria-hidden="true"></i> تسجيل موظف جديد </a>
      <button type="submit" name="multiDel" id="multiDel" class="btn danger-color-dark text-white px-3 py-1"> حذف متعدد </button>
    </div>
    <div class="container">
      <div>
        <br>
        <?php $i = 1; ?>
        <table class="table table-bordered table-striped  " id="myTable">
          <thead>
            <tr>
              <th class="p-1 bg-dark text-center"> المسلسل</th>
              <th class="p-1 bg-dark text-center"> اختيار</th>
              <th class="p-1 bg-dark text-center"> صورة الموظف </th>
              <th class="p-1 bg-dark text-center"> الاسم</th>
              <th class="p-1 bg-dark text-center"> الجنس </th>
              <th class="p-1 bg-dark text-center"> الهاتف </th>
              <th class="p-1 bg-dark text-center"> تاريخ التسجيل </th>
              <th class="p-1 bg-dark text-center"> الحالة</th>
              <th class="p-1 bg-dark text-center">العمليات</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php $op = new Khas(); ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
              <tr>
                <td class="p-1"> <?php echo $i++; ?></td>
                <td class="p-1"> <input type="checkbox" name="chk[]" id="chk" value="<?php echo $item['emp_id']; ?>"> </td>
                <td class="p-1 text-center">
                  <img src="<?php echo ROOT_URL; ?>/uplouds/<?php echo ($item['emp_pic'] != "") ? $item['emp_pic'] : $op->siteSetting('siteLogo'); ?>" class="border " style="height:50px; width:50px;" alt="">
                </td>
                <td class="p-1"> <?php echo $item['emp_name']; ?></td>
                <td class="p-1"> <?php echo ($item['emp_gender'] == 1) ? 'ذكر' : 'أنثى'; ?></td>
                <td class="p-1"> <?php echo  $item['emp_phones']; ?> </td>
                <td class="p-1"> <?php echo  $item['emp_regDate']; ?> </td>
                <td class="p-1"> <?php echo ($item['emp_stustatus'] == 1) ? 'مفعل' : 'غير مفعل'; ?></td>
                <td class="p-1">
                  <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $item['emp_id']; ?>" class="btn success-color-dark p-1 text-white"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo ROOT_URL; ?>/employees/empinfodelete/<?php echo $item['emp_id']; ?>" class="btn danger-color-dark p-1 text-white"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </form>