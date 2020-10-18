  <?php
    /**
     * fileName:    مؤهلات الموظف  
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
      <a href="<?php echo ROOT_URL; ?>/employees/empqualadd/<?php echo $id; ?>" class="btn danger-color-dark text-white px-3 py-2 float-left"> اضافة مؤهل جديد </a>
      <div class="clearfix"></div>

      <div class="container  m-auto bg-white text-right z-depth-0">
          <div class="card  z-depth-0 border">
              <div class="card-header py-2 px-1 text-center "> مؤهلات الموظف </div>
              <div class="card-body p-0 border">
                  <table class="table  striped-table border-0">
                      <thead>
                          <th class="p-1 primary-color-dark text-white border"> م </th>
                          <th class="p-1 primary-color-dark text-white border"> نوع المؤهل </th>
                          <th class="p-1 primary-color-dark text-white border"> درجة المؤهل </th>
                          <th class="p-1 primary-color-dark text-white border"> تاريخ المؤهل </th>
                          <th class="p-1 primary-color-dark text-white border"> جهة المؤهل </th>
                          <th class="p-1 primary-color-dark text-white border"> لغة المؤهل </th>
                          <th class="p-1 primary-color-dark text-white border"> ملاحظات حول المؤهل </th>
                          <th class="p-1 primary-color-dark text-white border"> العمليات </th>
                      </thead>
                      <?php $op = new Khas(); ?>
                      <?php $getData = $op->emp_qual($id); ?>
                      <?php $i = 1; ?>
                      <tbody>
                          <?php foreach ((array)$getData as $items) : ?>
                              <tr>
                                  <td class="p-1 text-dark border"> <?php echo $i++; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['emp_qual_type']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['emp_qual_degree']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['emp_qual_year']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['emp_qual_hand']; ?> </td>
                                  <td class="p-1 text-dark border"> <?php echo $items['emp_qual_lang']; ?></td>
                                  <td class="p-1 text-dark border"> <?php echo $items['emp_qual_note']; ?></td>
                                  <td class="p-1 text-dark border">
                                      <a href="<?php echo ROOT_URL; ?>/employees/empqualupdate/<?php echo $items['emp_qual_id']; ?>" class="btn success-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-send"></i> </a>
                                      <a href="<?php echo ROOT_URL; ?>/employees/empqualdelete/<?php echo $items['emp_qual_id']; ?>?emp_id=<?php echo $items['emp_id']; ?>" class="btn danger-color-dark text-white px-2 py-1" style="font-size:70% !important;"> <i class="fa fa-trash-o"></i> </a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </form>