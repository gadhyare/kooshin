<?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
<?php foreach ((array) $viewmodel as $item ) : ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <?php $op = new Khas(); ?>
        <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
            <div class="card  z-depth-0 border  rounded-0 ">
                <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> اضافة وظيفة للموظف </div>
                <div class="card-body px-2 border  rounded-0 ">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="emp_file_title"> عنوان الملف </label>
                            <input type="text" name="emp_file_title" id="emp_file_title" value="<?php echo $item['emp_file_title'];?>" class="form-control p-0 rounded-0 alert alert-info">
                        </div>
                        <div class="form-group">
                            <label for="emp_file_type"> نوع الملف </label>
                            <select name="emp_file_type" id="emp_file_type" class="form-control rounded-0 p-0 alert-info emp_file_type" >
                                <?php echo ($item['emp_file_type'] == 'Image') ? '<option value="Image"> صورة </option><option value="Ducoment"> مستند </option>' : '<option value="Ducoment"> مستند </option><option value="Image"> صورة </option>' ;?>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <input type="hidden" name="emp_file_link" value="<?php echo $item['emp_file_link'];?>">
                            <label for="emp_file_link" class="btn warning-color-dark text-dark w-100 p-2 text-center m-auto"> <i class="fa fa-upload"></i>  اختر الملف   </label>
                            <input type="file" name="emp_file_link" id="emp_file_link" class="" style="display: none">
                        </div>
                        <button type="submit" name="updateRec" class="btn success-color-dark text-white px-3 py-1"> تعديل الملف </button>
                        <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['emp_id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> تراجع </a>
                    </form>
                </div>
            </div>
        </div>
<?php endforeach; ?>


 