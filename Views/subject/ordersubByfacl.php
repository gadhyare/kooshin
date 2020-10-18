 <?php
    /**
     * fileName: المواد والبرامج
     */
    ?>
 <?php $op = new Khas(); ?>
 <?php if (isset($_GET['pro_id'])) : ?>
     <?php $op->chkSelProgtxt($_GET['pro_id']); ?>
 <?php endif; ?>
 <div class="container">
     <a href="<?php echo ROOT_URL; ?>/subject/add" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مادة جديدة </a>

     <br>
     <hr>
     <div class="container">
         <div class="row">
             <div class="col-xs-12 col-md-4 ">
                 <div class="card rounded-0 p-1 border z-depth-0">
                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="selecteduLev"> اختر المرحلة </label>
                                 <select name="edulev_id" id="edulev_id" class="form-control rounded-0">
                                     <?php $op->GetSeledulevel($_GET['edulev_id']); ?>
                                 </select>
                                 <br>
                                 <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> اختر </button>
                             </div>
                         </div>
                     </form>
                 </div>
                 <br>
                 <?php if (isset($_GET['edulev_id'])) : ?>
                     <div class="card rounded-0 p-1 border z-depth-0">
                         <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-2">
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="selecteduLev"> اختر البرنامح </label>
                                     <select name="pro_id" id="pro_id" class="form-control rounded-0 p-0">
                                         <?php $op->FullSelProgInfoByLev($_GET['edulev_id']); ?>
                                     </select>
                                     <br>
                                     <button type="submit" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> اختر </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 <?php endif; ?>
             </div>
             <div class="col-xs-12 col-md-8 ">
                 <?php if (isset($_GET['edulev_id']) && isset($_GET['pro_id'])) : ?>

                     <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfaclprint?edulev_id=<?php echo $_GET['edulev_id']; ?>&pro_id=<?php echo $_GET['pro_id']; ?>" target="_blank" class="btn danger-color-dark  text-white float-left rounded-0 mb-2 py-1 px-3"> <i class="fa fa-print" aria-hidden="true"></i></a>
                     <a href="javascript:;" id="myLink" class="btn danger-color-dark text-white  py-1 px-3 waves-effect waves-light" onclick="this.href='<?php echo ROOT_URL; ?>/subject/ordersubByfacldel?edulev_id=<?php echo $_GET['edulev_id']; ?>&pro_id=<?php echo $_GET['pro_id']; ?>&sub_id=' + document.getElementById('services').value"> حذف متعدد </a>
                     <input type="hidden" name="services" id="services" class="b form-contolr">
                     <table class="table table-striped table-bordered" id="myTable">
                         <thead>
                             <tr>
                                 <th class="p-1 bg-dark text-center"> المسلسل</th>
                                 <th class="py-2 px-4 bg-dark text-center">
                                     <input type="checkbox" name="chkGrp" id="chkGrp" onclick="selectall(this);">
                                 </th>
                                 <th class="p-1 bg-dark text-center"> اسم المادة</th>
                                 <th class="p-1 bg-dark text-center"> كود المادة</th>
                                 <th class="p-1 bg-dark text-center"> الحالة</th>
                                 <th class="p-1 bg-dark text-center">العمليات</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $i = 1; ?>
                             <?php $json = json_decode($viewmodel); ?>
                             <?php foreach ((array) $json   as $items => $key) : ?>
                                 <tr>
                                     <td class="p-1"><?php echo $i++; ?></td>
                                     <td class="p-2 text-center" style="font-size:70%"> <input type="checkbox" name="selectServices" id="chk" value="<?php echo $key->sub_id; ?>"> </td>
                                     <td class="p-1"><?php echo $key->subject_name;  ?></td>
                                     <td class="p-1"><?php echo $key->subject_code;  ?></td>

                                     <td class="p-1"><?php echo ($key->active == 1) ? 'مفعل' : 'غير مفعل'; ?> </td>
                                     <td class="p-1">
                                         <a href="<?php echo ROOT_URL; ?>/subject/update/<?php echo $key->sub_id; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                                         <a href="<?php echo ROOT_URL; ?>/subject/delete/<?php echo $key->sub_id; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                     </td>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>

                 <?php endif; ?>
             </div>
         </div>
     </div>
 </div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <script>
     function getinfo() {
         let y = document.querySelector("b");
         if (y.value !== '') {
             alert('on');
         }
     }

     function selectall(source) {
         let checkboxes = document.getElementsByName('selectServices'),
             services = document.getElementById('services'),
             count = 0;
         for (var i = 0, n = checkboxes.length; i < n; i++) {
             checkboxes[i].checked = source.checked;

         }

     }

     $(function() {
         $('input[name=chkGrp],input[name=selectServices]').on('change', function() {
             $('#services').val($('input[name=selectServices]:checked').map(function() {
                 return this.value;
             }).get());
         });

     });
 </script>