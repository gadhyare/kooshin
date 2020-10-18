  <?php
    /**
     * fileName:    تعديل وظيفة للموظف  
     */
    ?>
  <?php foreach ((array) $viewmodel as $item) : ?>
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
      <?php if ($id) : ?>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
              <?php $op = new Khas(); ?>
              <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
                  <div class="card  z-depth-0 border  rounded-0 ">
                      <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> تعديل وظيفة للموظف </div>
                      <div class="card-body px-2 border  rounded-0 ">
                          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                  <label for="empjob_title"> العنوان الوظيفي </label>
                                  <input type="text" name="empjob_title" id="empjob_title" value="<?php echo $item['empjob_title']; ?>" class="form-control p-0 rounded-0 alert alert-info">
                              </div>
                              <div class="form-group">
                                  <label for="em_sec_id"> القسم الوظيفي </label>
                                  <select name="em_sec_id" id="em_sec_id" class="form-control p-0 rounded-0 alert alert-info">
                                      <?php echo $op->getSelEmpSecById($item['em_sec_id']); ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="em_lev_id"> الدرجة الوظيفية </label>
                                  <select name="em_lev_id" id="em_lev_id" class="form-control p-0 rounded-0 alert alert-info">
                                      <?php echo $op->getSelEmpLevById($item['em_lev_id']); ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="empjob_strdate">تاريخ التعيين</label>
                                  <input type="date" name="empjob_strdate" id="empjob_strdate" value="<?php echo $item['empjob_strdate']; ?>" class="form-control p-0 rounded-0 alert alert-info" required>
                              </div>
                              <div class="form-group">
                                  <label for="empjob_sellary">المرتب الأساسي</label>
                                  <input type="number" name="empjob_sellary" id="empjob_sellary" value="<?php echo $item['empjob_sellary']; ?>" class="form-control p-0 rounded-0 alert alert-info" required>
                              </div>
                              <div class="form-group">
                                  <label for="empjob_levdate">تاريخ ترك الوظيفة</label>
                                  <input type="date" name="empjob_levdate" id="empjob_levdate" value="<?php echo $item['empjob_levdate']; ?>" class="form-control p-0 rounded-0 alert alert-info">
                              </div>

                              <div class="form-group">
                                  <label for="empjob_note"> ملاحظات حول العمل </label>
                                  <textarea name="empjob_note" id="empjob_note" cols="30" rows="3" class="form-control p-0 rounded-0 alert alert-info"><?php echo $item['empjob_note']; ?></textarea>
                              </div>
                              <button type="submit" name="updateRec" class="btn success-color-dark text-white px-3 py-1"> تعديل البيانات </button>
                              <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['emp_id']; ?>" v class="btn danger-color-dark text-white px-3 py-1  float-left"> تراجع </a>
                          </form>
                      </div>
                  </div>
              </div>
          <?php endif; ?>
      <?php endforeach; ?>