<?php $op = new KHas();?>
<?php $Pay_Res_id = isset($_POST['PaymentRes']) ? $_POST['PaymentRes'] : '';?>
<div class="container col-6 m-auto">
    <div class="card z-depth-2">
        <div class="card-header text-center unique-color text-white"> اضافة نوع رسوم جديدة </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="PaymentRes">نوع الرسوم</label>
                    <select name="PaymentRes" id="PaymentRes" class="form-control" ><?php $op->getSelpaymentres($Pay_Res_id) ?></select>
                </div>
                <div class="form-group">
                    <label for="prog_id"> البرنامج </label>
                    <select name="prog_id" id="prog_id" class="form-control p-0" ><?php $op->FullProgInfo(); ?></select>
                </div>
                <div class="form-group">
                    <label for="fee_amount">قدر الرسوم</label>
                    <input type="number" name="fee_amount" id="fee_amount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="active"> الحالة   </label>
                    <select name="active" id="active" class="form-control p-0">
                        <option value="1">مفعل</option>
                        <option value="2"> غير مفعل </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="addnewrec" class="btn success-color-dark  z-depth-2  p-2 text-white float-right"> <i class="fa fa-paper-plane"></i> اضافة </button>
                    <a href="<?php echo ROOT_URL;?>/finance/PaymentRes" class="btn z-depth-2 text-white danger-color-dark p-2 float-left "> <i class="fa fa-cancel"> </i> تراجع </a>
                </div>
            </form>
        </div>
    </div>
</div>