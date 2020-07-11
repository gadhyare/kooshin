<?php foreach((array) $viewmodel as $item) : ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="clearfix"></div>
        <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
            <div class="card  z-depth-0 border  rounded-0 ">
                <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> الخبرات العملية للموظف   </div>
                <div class="card-body px-2 border  rounded-0 ">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group  ">
                            <label for="empexpe_est"> جهة العمل </label>
                            <input type="text" name="empexpe_est" id="empexpe_est" value="<?php echo $item['empexpe_est'];?>" class="form-control p-1 rounded-0">
                            <div class="form-group row">
                                <div class="col-xs-12 col-md-6">
                                    <label for="empexpe_strdate"> تاريخ التعيين</label>
                                    <input type="date" name="empexpe_strdate" id="empexpe_strdate"  value="<?php echo $item['empexpe_strdate'];?>" class="form-control p-1 rounded-0">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <label for="empexpe_title"> عنوان العمل </label>
                                    <input type="text" name="empexpe_title" id="empexpe_title"   value="<?php echo $item['empexpe_title'];?>"  class="form-control p-1 rounded-0">
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-md-6">
                                    <label for="empexpe_degree"> درجة الوظيفة </label>
                                    <input type="text" name="empexpe_degree" id="empexpe_degree"  value="<?php echo $item['empexpe_degree'];?>" class="form-control p-1 rounded-0">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <label for="empexpe_levdate"> تاريخ ترك الوظيفة </label>
                                    <input type="date" name="empexpe_levdate" id="empexpe_levdate"  value="<?php echo $item['empexpe_levdate'];?>" class="form-control p-1 rounded-0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="empexpe_note"> ملاحظات حول المؤهل </label>
                                <textarea name="empexpe_note" id="empexpe_note" cols="30" rows="3"  class="form-control p-1 rounded-0"><?php echo $item['empexpe_note'];?></textarea>
                            </div>
                            <button type="submit" name="updateRec" class="btn success-color-dark text-white px-3 py-1"> تعديل الخبرة العملية  </button>
                            <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['emp_id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> تراجع </a>
                    </form>
                </div>
            </div>
        </div>
<?php endforeach; ?>