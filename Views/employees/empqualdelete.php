  <?php
    /**
     * fileName:    حذف مؤهلات الموظف  
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <?php foreach ((array) $viewmodel as $delete_items) : ?>
          <div class="container p-2 mt-2 alert alert-danger  text-center font-weight-bold col-xs-12 col-sm-10 col-md-6">
              <p class="lead p-2 mt-2   text-center">
                  هل انت متأكد من حذف السجل [ <?php echo $delete_items['emp_qual_type']; ?> | <?php echo $delete_items['emp_id']; ?>] ؟
              </p>
              <input name="delete_items" type="submit" class="btn success-color-dark text-white px-3 py-2  a-light py-2 text-weight-bold" value="نعم">
              <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['emp_id']; ?>" class="btn  danger-color-dark text-white py-2 text-weight-bold">إلغاء</a>
          </div>
      <?php endforeach; ?>
  </form>