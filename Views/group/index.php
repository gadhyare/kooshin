<?php

/**
 * fileName: رئيسية المجموعات
 */
?>
<div class="container col-xs-12 col-md-10 m-auto z-depth-2 text-right">
  <a href="<?php echo ROOT_URL; ?>/group/add" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white">
    <i class="fa fa-plus" aria-hidden="true"></i> اضافة مجموعة جديدة </a>
  <table class="table table-bordered table-striped" id="myTable">
    <thead>
      <th class="primary-color-dark  text-center"> المسلسل</th>
      <th class="primary-color-dark  text-center"> المجموعة </th>
      <th class="primary-color-dark  text-center"> الحالة</th>
      <th class="primary-color-dark  text-center">العمليات</th>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php $items = json_decode($viewmodel); ?>
      <?php foreach ($items as $dep_temes_edite) : ?>
        <?php $status = ($dep_temes_edite->active == 1) ? 'مفعل' : 'غير مفعل'; ?>
        <tr>
          <td class="p-1" style="font-size:80%"><?php echo $i++; ?></td>
          <td class="p-1" style="font-size:80%"><?php echo $dep_temes_edite->group_name;  ?></td>
          <td class="p-1" style="font-size:80%"><?php echo $status; ?> </td>
          <input type="hidden" name="edit_id" value="<?php echo $dep_temes_edite->grp_id; ?>">
          <td class="p-1" style="font-size:80%">
            <a href="<?php echo ROOT_URL; ?>/group/update/<?php echo $dep_temes_edite->grp_id; ?>" class="btn primary-color-dark text-white rounded-0 p-1 " style="font-size:80%"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
            <a href="<?php echo ROOT_URL; ?>/group/delete/<?php echo $dep_temes_edite->grp_id; ?>" class="btn danger-color-dark text-white rounded-0 p-1 " style="font-size:80%"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>