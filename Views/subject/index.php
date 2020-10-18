 <?php
  /**
   * fileName: الرئيسية
   */
  ?>
 <div class="container">
   <a href="<?php echo ROOT_URL; ?>/subject/add" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مادة جديدة </a>
   <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfacl" class="btn danger-color-dark text-white px-3 py-1"> المواد حسب التخصصات </a>

   <?php $op = new Khas(); ?>
   <table class="table table-striped" id="myTable">
     <thead>
       <tr>
         <th class="p-1 bg-dark text-center"> المسلسل</th>
         <th class="p-1 bg-dark text-center"> اسم المادة</th>
         <th class="p-1 bg-dark text-center"> كود المادة</th>
         <th class="p-1 bg-dark text-center"> البرنامج </th>
         <th class="p-1 bg-dark text-center"> الحالة</th>
         <th class="p-1 bg-dark text-center">العمليات</th>
       </tr>
     </thead>
     <tbody>
       <?php $i = 1; ?>
       <?php $json = json_decode($viewmodel); ?>
       <?php foreach ($json   as $items => $key) : ?>
         <tr>
           <td class="p-1"><?php echo $i++; ?></td>
           <td class="p-1"><?php echo $key->subject_name;  ?></td>
           <td class="p-1"><?php echo $key->subject_code;  ?></td>
           <td class="p-1">
             <?php echo $op->FulltextProgInfo($key->prog_id); ?>
           </td>
           <td class="p-1"><?php echo ($key->active == 1) ? 'مفعل' : 'غير مفعل'; ?> </td>
           <input type="hidden" name="edit_id" value="<?php echo $key->sub_id; ?>">
           <td class="p-1">
             <?php if ($op->chk_prog_rols($op->stringify($_SESSION['log_id']), $key->prog_id)) : ?>
               <a href="<?php echo ROOT_URL; ?>/subject/update/<?php echo $key->sub_id; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
               <a href="<?php echo ROOT_URL; ?>/subject/delete/<?php echo $key->sub_id; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
             <?php endif; ?>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
 </div>