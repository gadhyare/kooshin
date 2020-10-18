<?php

/**
 * fileName: اضافة وسلية  تواصل
 */
?>
<div class="container col-xs-12 col-sm-12 col-md-6 m-auto">
    <div class="card">
        <div class="card-header">
            اضافة رابط موقع تواصل اجتماعي
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="socialmedia_name"> اسم الموقع </label>
                    <input type="text" name="socialmedia_name" id="socialmedia_name" class="form-control" value="<?php echo $op->setPosts("socialmedia_name"); ?>">
                </div>
                <div class="form-group">
                    <label for="socialmedia_link"> رابط الموقع </label>
                    <input type="text" name="socialmedia_link" id="socialmedia_link" class="form-control" value="<?php echo $op->setPosts("socialmedia_link"); ?>">
                </div>
                <div class="form-group">
                    <label for="socialmedia_logo"> شعار الموقع </label>
                    <input type="text" name="socialmedia_logo" id="socialmedia_logo" class="form-control" value="<?php echo $op->setPosts("socialmedia_logo"); ?>">
                </div>
                <div class="form-group">
                    <label for="active"> حالة الموقع </label>
                    <select name="active" id="active" class="form-control">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
                </div>
                <button type="submit" name="socialmediadd" class="btn success-color-dark text-white float-right"> اضافة </button>
                <a href="" class="btn danger-color-dark text-white float-left"> تراجع </a>
            </form>
        </div>


    </div>
</div>