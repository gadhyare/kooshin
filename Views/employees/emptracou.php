  <?php
    /**
     * fileName:    دورات الموظف  
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
      <a href="<?php echo ROOT_URL; ?>/employees/emptracouadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> اضافة دورة جديدة </a>
      <div class="clearfix"></div>

      <div class="container  m-auto bg-white text-right z-depth-0">
          <div class="card  z-depth-0 border">
              <div class="card-header py-2 px-1 text-center "> </div>
              <div class="card-body p-0 border">
                  <table class="table  striped-table border-0">
                      <thead>
                          <th class="p-1 primary-color-dark text-white border"> م </th>
                          <th class="p-1 primary-color-dark text-white border"> عنوان الدورة</th>
                          <th class="p-1 primary-color-dark text-white border"> تاريخ الدورة </th>
                          <th class="p-1 primary-color-dark text-white border"> الجهة المنظمة </th>
                          <th class="p-1 primary-color-dark text-white border"> مدة الدورة</th>
                          <th class="p-1 primary-color-dark text-white border"> العمليات </th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->emptracou($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td class="p-1 text-dark border"> <?php echo $i++; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['tra_cou_title']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['tra_cou_date']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['tra_cou_est']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['tra_cou_due']; ?> </td>
                                  <td class="p-1 text-dark border">
                                      <a href="<?php echo ROOT_URL; ?>/employees/emptracouupdate/<?php echo $items['tra_cou_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/emptracoudelete/<?php echo $items['tra_cou_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </form>