<?php $item = json_decode($viewmodel); ?>
<?php if (count((array) $item) > 0) : ?>
    <?php foreach ($item as $key => $val) : ?>
        <div class="container col-6 m-auto">
            <div class="card">
                <div class="card-header"> اضافة نوع رسوم جديدة </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="">نوع الرسوم</label>
                            <input type="text" name="PaymentRes" id="PaymentRes" class="form-control" value="<?php echo $val->PaymentRes; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">نوع الرسوم</label>
                            <select name="active" id="active" class="form-control p-0">
                                <?php echo ($val->active == 1) ? '<option value="1">مفعل</option><option value="2"> غير مفعل </option>' : '<option value="2"> غير مفعل </option><option value="1">مفعل</option>'; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="updateRec" class="btn success-color-dark  z-depth-2  p-2 text-white float-right"> <i class="fa fa-paper-plane"></i> اضافة </button>
                            <a href="<?php echo ROOT_URL; ?>/finance/PaymentRes" class="btn z-depth-2 text-white danger-color-dark p-2 float-left "> <i class="fa fa-cancel"> </i> تراجع </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <?php echo $_SESSION['msg'] = Data_Not_Founded; ?>
<?php endif; ?>