<?php foreach ((array) $viewmodel as $item) : ?>
    <div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
        <div class="card  ">
            <div class="card-header   font-weight-bold text-center p-1  unique-color-dark text-white"> اضافة مستوى جديد </div>
            <div class="card-body">
                <?php $op = new Khas(); ?>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="exptype">اسم القسم</label>
                        <input type="text" name="exptype" value="<?php echo  $item['exptype']; ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المستوى الجديد">
                    </div>
                    <div class="form-group">
                        <label>حالة القسم</label>
                        <select name="active" id="" class="form-control p-1  rounded-0">
                            <?php echo ($item['active']==1)?'<option value="1">مفعل</option><option value="2">غير مفعل</option>':'<option value="2">غير مفعل</option><option value="1">مفعل</option>';?>
                        </select>
                    </div>
                    <input type="submit" name="updateexpensetype" value="اضافة" class="btn btn-primary text-light px-3 py-2">
                    <a href="<?php echo ROOT_URL; ?>/finance/expensetype" class="btn btn-danger text-light p-2">إلغاء</a>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>