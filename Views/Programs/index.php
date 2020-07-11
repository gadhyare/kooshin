   <a href="<?php echo ROOT_URL; ?>/programs/add" class="btn btn-primary mt-2 float-left rounded-0 mb-2 py-1 px-3"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة برنامج دراسي جديد </a>
   
   <?php $op = new Khas(); ?>
   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
     <table class="table  table-striped table-bordered  " id="myTable">
       <thead>
           <th class="p-1   bg-dark" style="font-size:75% !important "> المسلسل</th>
           <th class="p-1   bg-dark" style="font-size:75% !important "> المرحلة الأكاديمية</th>
           <th class="p-1   bg-dark" style="font-size:75% !important "> الكلية </th>
           <th class="p-1   bg-dark" style="font-size:75% !important "> القسم الأكاديمي </th>
           <th class="p-1   bg-dark" style="font-size:75% !important "> الحالة</th>
           <th class="p-1   bg-dark" style="font-size:75% !important " >العمليات</th>
       </thead>
       <tbody>
         <?php $i = 1; ?>
         <?php foreach ($viewmodel as $itemss) : ?>
           <?php $status = ($itemss['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
           <tr>
             <td class="p-1 " style="font-size:75% !important "><?php echo $i++; ?></td>
             <td class="p-1 " style="font-size:75% !important ">
               <?php echo $op->GetSeleduleveltxt($itemss['edulev_id']);?>
              </td>
              <td class="p-1 " style="font-size:75% !important ">
                 <?php echo  $op->GetSelfacultytxt($itemss['fac_id']); ?>
             </td>
             <td class="p-1 " style="font-size:75% !important ">
                 <?php echo $op->GetSelacademicstxt($itemss['academics_id']); ?>
             </td>
             <td class="p-1 " style="font-size:75% !important "><?php echo $status; ?> </td>
             <td class="p-1 " style="font-size:75% !important ">
               <a href="<?php echo ROOT_URL; ?>/programs/update/<?php echo $itemss['prog_id']; ?>" class="btn success-color-dark    text-white rounded-0 py-1 px-3 py-1" style="font-size:75%"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
               <a href="<?php echo ROOT_URL; ?>/programs/delete/<?php echo $itemss['prog_id']; ?>" class="btn danger-color-dark    text-white rounded-0 py-1 px-3 py-1" style="font-size:75%"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
               <a href="<?php echo ROOT_URL; ?>/programs/prosub/?prog_id=<?php echo $itemss['prog_id']; ?>" class="btn unique-color-dark    text-white rounded-0 py-1 px-3 py-1" style="font-size:75%">  اضافة مادة </a>
               <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfacl?edulev_id=<?php echo $itemss['edulev_id']; ?>&pro_id=<?php echo $itemss['prog_id']; ?>" class="btn pink darken-3   text-white rounded-0 py-1 px-3 py-1" style="font-size:75%">  مواد البرنامج  </a>
               <a href="<?php echo ROOT_URL; ?>/subject/uploadsujectlist?edulev_id=<?php echo $itemss['edulev_id']; ?>&pro_id=<?php echo $itemss['prog_id']; ?>" class="btn brown darken-4   text-white rounded-0 py-1 px-3 py-1" style="font-size:75%"> رفع  مواد البرنامج   </a>
              </td>
           </tr>
         <?php endforeach; ?>

       </tbody>
     </table>
   </form>