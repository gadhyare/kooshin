<div class="container mt-5">

 
<div class="card  ">
     
    <div class="card-body">

        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >

        <?php foreach($viewmodel as $edit_items) : ?>
        <?php $status = ($edit_items['active']==1) ? '<option value="1">مفعل</option><option value="2">غير مفعل</option>' : '<option value="2">غير مفعل</option> <option value="1">مفعل</option>'; ?>
       
        <div class="form-group">
                <label>اسم القسم</label>
            <input type="text" name="level_name_edit" value="<?php echo $edit_items['level_name'] ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المستوى " >
        </div>

        <div class="form-group">
                <label>حالة القسم</label>
                <select name="active" id="" class="form-control p-1  rounded-0">
                     <?php echo $status ; ?>
                </select>
        </div>
        <?php endforeach ;?>
        <input type="submit" name="edit_submit" value="اضافة" class="btn btn-primary text-light px-3 py-2" >
        <a href="<?php echo ROOT_URL;?>/home" class="btn btn-danger text-light p-2">إلغاء</a>
        </form>
    </div>
</div>


</div>