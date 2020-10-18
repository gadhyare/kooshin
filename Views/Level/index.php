<?php

/**
 * fileName: رئيسية المستويات
 */
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <div class="container colxs-12 col-md-8 m-auto">
    <a href="<?php echo ROOT_URL; ?>/level/add" class="btn  primary-color-dark text-white   rounded-0  py-1 px-3"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مستوى جديد </a>

    <button type="submit" name="btns" class="btn danger-color-dark text-white px-3 py-1"> حذف متعدد </button>
  </div>
  <br>
  <div class="container colxs-12 col-md-8 m-auto">


    <br>
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr>
          <th class="p-1 bg-dark text-center"> المسلسل</th>
          <th class="p-1 bg-dark text-center"> المستوى</th>
          <th class="p-1 bg-dark text-center"> الحالة</th>
          <th class="p-1 bg-dark text-center">العمليات</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($viewmodel as $itemss) : ?>
          <?php $status = ($itemss['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
          <tr>
            <td class="p-1">
              <?php echo $i++; ?>
              <input type="checkbox" name="chid[]" id="chid" value="<?php echo $itemss['lev_id']; ?>">

            </td>
            <td class="p-1"><?php echo $itemss['level_name'];  ?></td>
            <td class="p-1"><?php echo $status; ?> </td>

            <td class="p-1">
              <a href="<?php echo ROOT_URL; ?>/level/update/<?php echo $itemss['lev_id']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>

              <a href="<?php echo ROOT_URL; ?>/level/delete/<?php echo $itemss['lev_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</form>