<div class="container mt-5">
    
     
    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> اضافة مستوى جديد </div>
        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >
            <div class="form-group">
                    <label>اسم القسم</label>
                <input type="text" name="level_name" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المستوى الجديد" >
            </div>

            <div class="form-group">
                    <label>حالة القسم</label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1">مفعل</option>
                        <option value="2">غير مفعل</option>
                    </select>
            </div>

            <input type="submit" name="submit" value="اضافة" class="btn btn-primary text-light px-3 py-2" >
            <a href="<?php echo ROOT_URL;?>/home" class="btn btn-danger text-light p-2">إلغاء</a>
            </form>
        </div>
    </div>
    
  
</div>