  <?php
    /**
     * fileName:   معلومات  الموظف  
     */
    ?>
  <?php foreach ($viewmodel as $item) : ?>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="container  m-auto bg-white text-right">

              <div class="clearfix"></div>
              <div class="card border z-depth-0">
                  <?php $op = new Khas(); ?>
                  <div class="card-header unique-color-dark text-white p-1"> معلومات شخصية للموظف </div>
                  <div class="card-body">
                      <div class="container">
                          <div class="row">
                              <div class="col-xs-12 col-md-10">
                                  <table class="table ">
                                      <tr>
                                          <td class="p-1">
                                              <label for="emp_name"> اسم الموظف </label>
                                              <input type="text" name="emp_name" id="emp_name" value="<?php echo $item['emp_name']; ?>" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>
                                          <td class="p-1">
                                              <label for="emp_name"> الجنس </label>
                                              <select name="emp_gender" id="emp_gender" class="form-control  alert-info rounded-0 p-0">
                                                  <option value="1">ذكر</option>
                                                  <option value="2">أنثى</option>
                                              </select>
                                          </td>
                                          <td class="p-1">
                                              <label for="emp_DOB"> تاريخ الميلاد </label>
                                              <input type="date" name="emp_DOB" id="emp_DOB" value="<?php echo  $item['emp_DOB']; ?>" min="1-1-1999" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="p-1">
                                              <label for="emp_POB"> مكان الميلاد </label>
                                              <input type="text" name="emp_POB" id="emp_POB" value="<?php echo  $item['emp_POB']; ?>" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>


                                          <td class="p-1">
                                              <label for="emp_nationality"> الجنسية </label>
                                              <input type="text" name="emp_nationality" value="<?php echo  $item['emp_nationality']; ?>" id="emp_nationality" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>
                                          <td class="p-1">
                                              <label for="emp_address"> العنوان </label>
                                              <input type="text" name="emp_address" id="emp_address" value="<?php echo  $item['emp_address']; ?>" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="p-1">
                                              <label for="emp_phones"> الهواتف </label>
                                              <input type="text" name="emp_phones" id="emp_phones" value="<?php echo  $item['emp_phones']; ?>" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>


                                          <td class="p-1">
                                              <label for="emp_email"> البريد الإلكتروني </label>
                                              <input type="email" name="emp_email" id="emp_email" value="<?php echo  $item['emp_email']; ?>" class="form-control  alert-info rounded-0 p-0" required>
                                          </td>
                                          <td class="p-1">
                                              <label for="emp_regDate"> تاريخ التسجيل </label>
                                              <input type="date" name="emp_regDate" id="emp_regDate" value="<?php echo  $item['emp_regDate']; ?>" class="form-control  alert-info rounded-0 p-0" required min="1-1-1999">
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="p-1">
                                              <label for="emp_stustatus"> الحالة </label>
                                              <select name="emp_stustatus" id="emp_stustatus" class="form-control  alert-info rounded-0 p-1">
                                                  <option value="1"> مفعل </option>
                                                  <option value="2"> غير مفعل </option>
                                              </select>
                                          </td>

                                          <td colspan="2" class="p-1">
                                              <label for="emp_note"> ملاحظات </label>
                                              <textarea name="emp_note" id="emp_note" class="form-control  alert-info rounded-0 p-0" cols="30" rows="3" required><?php echo  $item['emp_note']; ?></textarea>
                                          </td>
                                      </tr>
                                  </table>
                              </div>
                              <div class="col-xs-12 col-md-2 text-center">
                                  <input type="hidden" value="<?php echo  $item['emp_pic']; ?>" name="emp_pic_show">
                                  <img src="<?php echo ROOT_URL; ?>/uplouds/<?php echo ($item['emp_pic'] != "") ? $item['emp_pic'] : $op->siteSetting('siteLogo'); ?>" class="w-75 border" alt="">
                                  <input type="file" id="file" name="emp_pic" value="<?php echo ($item['emp_pic'] != '') ? $item['emp_pic'] : ''; ?>" class=" text-dark file-sec" accept="image/*">
                                  <label for="file" class="btn unique-color-dark text-white px-3 py-1 w-75" style="font-size: 70%"> </i> اختر الصورة</label>
                                  <button type="submit" name="update_empInfo" class="btn success-color-dark text-white px-3 py-1 w-75"> <i class="fa fa-check px-4 py-1"></i> </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  <?php endforeach; ?>