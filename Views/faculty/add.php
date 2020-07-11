<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
 
<?php $op = new khas();?>
     
    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> اضافة الكلية جديدة </div>
        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >
            <div class="form-group">
                    <label>   اسم الكلية</label>
                <input type="text" name="fac_name" class="form-control p-1  rounded-0" value="<?php echo $op->setPosts('fac_name');?>"placeholder="أدخل هنا اسم الكلية الجديدة" >
            </div>

            <div class="form-group">
                    <label>حالة  الكلية</label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
            </div>

            <input type="submit" name="submitAdd" value="اضافة" class="btn btn-primary text-light px-3 py-2" >
            <a href="<?php echo ROOT_URL;?>/academics" class="btn btn-danger text-light p-2">إلغاء</a>
            </form>
        </div>
    </div>
    
  
</div>