 <?php
    /**
     * fileName: تحديث عضو
     */
    ?>
 <div class="container mt-5 col-xs-12 col-md-8">
     <?php $op = new khas(); ?>
     <?php foreach ($viewmodel as $edit_items) : ?>
         <div class="card  ">
             <div class="card-header unique-color-dark text-white text-center p-1"> معلومات العضو الحالي </div>
             <div class="card-body">
                 <div class="row">
                     <div class="col-md-12">
                         <ul id="tabs" class="nav nav-tabs">
                             <li class="nav-item"><a href="" data-target="#profile" data-toggle="tab" class="nav-link small text-uppercase active"> المعلومات الأساسية </a></li>
                             <li class="nav-item"><a href="" data-target="#usrlev" data-toggle="tab" class="nav-link small text-uppercase "> معلومات العضوية </a></li>
                             <li class="nav-item"><a href="" data-target="#pass" data-toggle="tab" class="nav-link small text-uppercase "> كلمة المرور </a></li>
                         </ul>
                         <br>
                         <div id="tabsContent" class="tab-content">
                             <div id="profile" class="tab-pane show  active fade">
                                 <form action="" method="post">
                                     <div class="row">
                                         <div class="form-group col-xs-12 col-md-6">
                                             <label>اسم العضو</label>
                                             <input type="text" name="user_name_edit" value="<?php echo $edit_items['user_name'] ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم العضو ">
                                         </div>
                                         <div class="form-group col-xs-12 col-md-6">
                                             <label>اميل العضو</label>
                                             <input type="email" name="user_email_edit" value="<?php echo $edit_items['email'] ?>" class="form-control p-1  rounded-0" placeholder="example@somthing.com ">
                                         </div>
                                     </div>
                                     <input type="submit" name="edit_usr_info" value="تعديل" class="btn primary-color-dark text-white px-3 py-2">
                                     <a href="<?php echo ROOT_URL; ?>/user" class="btn danger-color-dark text-white p-2">إلغاء</a>
                                 </form>
                             </div>
                             <div id="usrlev" class="tab-pane fade   ">
                                 <form action="" method="post">
                                     <div class="row">
                                         <div class="form-group col-xs-12 col-md-6">
                                             <label> الدرجة </label>
                                             <select name="role" id="role" class="form-control p-1  rounded-0">
                                                 <?php $op->tran_user_role_list($edit_items['role'] ?? ""); ?>
                                             </select>
                                         </div>
                                         <div class="form-group col-xs-12 col-md-6">
                                             <label> حالة العضو</label>
                                             <select name="active" id="active" class="form-control p-1  rounded-0">
                                                 <?php echo ($edit_items['active'] == 1) ? '<option value="1">مفعل</option><option value="2">غير مفعل</option>' : '<option value="2">غير مفعل</option><option value="1">مفعل</option>'; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <input type="submit" name="edit_usr_lev" value="تعديل" class="btn primary-color-dark text-white px-3 py-2">
                                     <a href="<?php echo ROOT_URL; ?>/user" class="btn danger-color-dark text-white p-2">إلغاء</a>
                                 </form>
                             </div>
                             <div id="pass" class="tab-pane fade   ">
                                 <form action="" method="post">
                                     <div class="row">
                                         <div class="form-group col-xs-12 col-md-6">
                                             <label>كلمة السر </label>
                                             <input type="password" name="user_password_edit" class="form-control p-1  rounded-0" placeholder="******** ">
                                         </div>
                                         <div class="form-group col-xs-12 col-md-6">
                                             <label> اعادة كلمة السر </label>
                                             <input type="password" name="user_password_confirm" class="form-control p-1  rounded-0" placeholder="******** ">
                                         </div>
                                     </div>
                                     <input type="submit" name="edit_usr_pass" value="تعديل" class="btn primary-color-dark text-white px-3 py-2">
                                     <a href="<?php echo ROOT_URL; ?>/user" class="btn danger-color-dark text-white p-2">إلغاء</a>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     <?php endforeach; ?>
 </div>