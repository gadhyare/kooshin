 <?php
  /**
   * fileName: رئيسية الأقسام الأكاديمية
   */
  ?>
 <a href="<?php echo ROOT_URL; ?>/academics/add" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة القسم الأكاديمي جديد </a>

 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
   <table class="table tables  ">
     <thead>
       <tr>
         <th class="p-1 bg-dark"> المسلسل</th>
         <th class="p-1 bg-dark"> المستوى</th>
         <th class="p-1 bg-dark"> الكود</th>
         <th class="p-1 bg-dark"> الحالة</th>
         <th class="p-1 bg-dark" colspan="2">العمليات</th>
       </tr>
     </thead>
     <tbody>
       <?php $i = 1; ?>
       <?php foreach ($viewmodel as $itemss) : ?>
         <?php $status = ($itemss['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
         <tr>
           <td class="p-1"><?php echo $i++; ?></td>
           <td class="p-1"><?php echo $itemss['academics'];  ?></td>
           <td class="p-1"><?php echo $itemss['code'];  ?></td>
           <td class="p-1"><?php echo $status; ?> </td>
           <input type="hidden" name="edit_id" value="<?php echo $itemss['academics_id']; ?>">
           <td class="p-1">
             <a href="<?php echo ROOT_URL; ?>/academics/update/<?php echo $itemss['academics_id']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>

             <a href="<?php echo ROOT_URL; ?>/academics/delete/<?php echo $itemss['academics_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
           </td>
         </tr>
       <?php endforeach; ?>

     </tbody>
   </table>
 </form>