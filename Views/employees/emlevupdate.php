 <?php
    /**
     * fileName: تعديل  درجة  وظيفية
     */
    ?>
 <div class="container ">
     <?php foreach ($viewmodel as $item) : ?>
         <div class="card m-auto col-xs-12 col-md-4 z-depth-0 border rounded-0 p-0">
             <div class="card-header unique-color-dark text-center text-white p-1"> اضافة درجة وظيفية جديدة </div>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                 <div class="card-body p-2">
                     <div class="form-group">
                         <label for="em_sec_name"> الدرجة الوظيفية </label>
                         <input type="text" name="em_sec_name" id="em_sec_name" value="<?php echo $item['em_sec_name']; ?>" class="form-control rounded-0 p-1">
                     </div>
                     <div class="form-group">
                         <label for="active"> الدرجة الوظيفية </label>
                         <select name="active" id="active" class="form-control rounded-0 p-1">
                             <?php echo ($item['active'] == 1) ? '<option value="1"> مفعل </option><option value="2"> غير مفعل </option>' : '<option value="2"> غير مفعل </option><option value="1"> مفعل </option>'; ?>
                         </select>
                     </div>
                     <button type="submit" name="btn_submit_update" id="btn_submit_update" class="btn success-color-dark text-white px-4 py-2"> <i class="fa fa-send"></i> </button>
                     <a href="<?php echo ROOT_URL; ?>/employees/emlev" class="btn danger-color-dark text-white px-4 py-2 float-left"> <i class="fa fa-times"></i> </a>
                 </div>
             </form>
         </div>
     <?php endforeach; ?>
 </div>