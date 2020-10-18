    <?php
    /**
     * fileName: رئيسية الأعضاء
     */
    ?>
    <a href="<?php echo ROOT_URL; ?>/user/register" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة عضو جديد </a>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <table class="table tables ">
        <thead>
          <tr>
            <th class="p-1 bg-dark"> المسلسل</th>
            <th class="p-1 bg-dark"> الصورة</th>
            <th class="p-1 bg-dark"> اسم العضو</th>
            <th class="p-1 bg-dark"> درجة العضو</th>
            <th class="p-1 bg-dark"> البريد الإلكتروني</th>
            <th class="p-1 bg-dark">تاريخ التسجيل</th>
            <th class="p-1 bg-dark"> الحالة </th>
            <th class="p-1 bg-dark" colspan="2">العمليات</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($viewmodel as $itemss) : ?>
            <?php $status = ($itemss['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
            <tr>
              <td class="p-1"><?php echo $i++; ?></td>
              <td class="p-1"> <img src="<?php echo $op->get_gravatar($itemss['email']); ?>" class="rounded-circle" style="height: 50px;" alt=""> </td>
              <td class="p-1"><?php echo $itemss['user_name'];  ?></td>
              <td class="p-1"><?php echo  $op->tran_user_role($op->get_user_info($itemss['usrid'], 'role'));   ?></td>

              <td class="p-1"><?php echo $itemss['email'];  ?></td>
              <td class="p-1"><?php echo $itemss['reg_date'];  ?></td>
              <td class="p-1"><?php echo $status; ?> </td>
              <input type="hidden" name="edit_id" value="<?php echo $itemss['usrid']; ?>">
              <td class="p-1">
                <a href="<?php echo ROOT_URL; ?>/user/update/<?php echo $itemss['usrid']; ?>" class="btn  primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/user/delete/<?php echo $itemss['usrid']; ?>" class="btn  danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/user/userrols?userid=<?php echo $itemss['usrid']; ?>" class="btn  success-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-user p-0" aria-hidden="true"></i> </a>
                <a href="<?php echo ROOT_URL; ?>/user/usrsectanddep?userid=<?php echo $itemss['usrid']; ?>" class="btn  bg-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-eye p-0" aria-hidden="true"></i> </a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </form>