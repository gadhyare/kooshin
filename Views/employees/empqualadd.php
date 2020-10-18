  <?php
    /**
     * fileName:    اضافة مؤهلات الموظف  
     */
    ?>
  <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
  <?php if ($id) : ?>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="clearfix"></div>
          <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
              <div class="card  z-depth-0 border  rounded-0 ">
                  <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> مؤهلات الموظف </div>
                  <div class="card-body px-2 border  rounded-0 ">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_type"> نوع المؤهل </label>
                                  <input type="text" name="emp_qual_type" id="emp_qual_type" class="form-control p-1 rounded-0">
                              </div>
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_degree"> درجة المؤهل </label>
                                  <select name="emp_qual_degree" id="emp_qual_degree" class="form-control p-1 rounded-0">
                                      <option value="1"> إعدادي </option>
                                      <option value="2"> ثانوي/علمي </option>
                                      <option value="3"> ثانوي/أدبي </option>
                                      <option value="4"> ثانوي/شرعي </option>
                                      <option value="5"> ثانوي/صناعي </option>
                                      <option value="6"> ثانوي/زراعي </option>
                                      <option value="7"> بكالريوس </option>
                                      <option value="8"> دبلوم عالي </option>
                                      <option value="9"> ماجستير </option>
                                      <option value="10"> دكتوراة </option>
                                      <option value="11"> آخر </option>
                                  </select>

                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_year"> تاريخ المؤهل </label>
                                  <input type="date" name="emp_qual_year" id="emp_qual_year" class="form-control p-1 rounded-0">
                              </div>
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_lang"> لغة المؤهل </label>

                                  <select name="emp_qual_lang" id="emp_qual_lang" class="form-control p-1 rounded-0">
                                      <option value="الصومالية">الصومالية</option>
                                      <option value="العربية">العربية</option>
                                      <option value="الإنجليزية">الإنجليزية</option>
                                      <option value="الفرنسية">الفرنسية</option>
                                      <option value="آخر">آخر</option>
                                  </select>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="emp_qual_hand"> جهة المؤهل </label>
                              <input type="text" name="emp_qual_hand" id="emp_qual_hand" class="form-control p-1 rounded-0">
                          </div>
                          <div class="form-group">
                              <label for="emp_qual_note"> ملاحظات حول المؤهل </label>
                              <textarea name="emp_qual_note" id="emp_qual_note" cols="30" rows="3" class="form-control p-1 rounded-0"></textarea>
                          </div>
                          <button type="submit" name="addRec" class="btn success-color-dark text-white px-3 py-1"> اضافة المؤهل </button>
                          <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> تراجع </a>
                      </form>
                  </div>
              </div>
          </div>
      <?php endif; ?>