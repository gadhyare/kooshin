<?php

/**
 * fileName: اضافة مهمة
 */
?>
<div class="container">
    <div class="col-md-8   mx-auto">
        <?php echo $_SESSION['msg']; ?>
    </div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 p-3 forms">
        <div class="form-group">
            <label> الموضوع </label>
            <input type="text" name="title" id="" class="form-control rounded-0">
        </div>
        <div class="form-group">
            <label> درجة العمل </label>
            <select name="status" class="form-control rounded-0">
                <option class="p-0" value="1"> عادية </option>
                <option class="p-0" value="2"> مستعجلة </option>
                <option class="p-0" value="3"> مستعجلة جداً </option>
            </select>
        </div>

        <div class="form-group">
            <label> الحالة</label>
            <select name="active" class="form-control rounded-0">
                <option class="p-0" value="1"> تمت المهمة </option>
                <option class="p-0" value="2"> جاري العمل عليها </option>
                <option class="p-0" value="3"> تم تأجيلها </option>
                <option class="p-0" value="4"> تم إلغاؤها </option>
                <option class="p-0" value="5"> تم تحويلها </option>


            </select>
        </div>

        <div class="form-group">
            <label> الموضوع </label>
            <textarea name="topic" id="" class="form-control rounded-0" cols="30" rows="5"></textarea>
        </div>
        <input type="submit" name="submit" value="اضافة العمل" class="btn btn-success">
        <a href="<?php echo ROOT_URL; ?>/todolist" class="btn danger-color-dark"> تراجع </a>
    </form>
</div>