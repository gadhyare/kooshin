<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
<script type="text/javascript">
function showhidden(){
           
            $("select[name=active]").change(function(){
                $("input[name=selected_value]").val($(this).val());
            });
}
</script>
<div class="col-md-8   mx-auto">
<?php   if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
</div>
 <?php $arr = array( 1=> 'مفعل' , 2=> 'غير مفعل' ) ; ?>
<div class="card  ">
     
    <div class="card-body">

        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >

        <?php foreach($viewmodel as $edit_items) : ?>
        
        
        <div class="form-group">
                <label>اسم المرحلة الدراسية</label>
            <input type="text" name="edulev_name_edit" value="<?php echo $edit_items['edulev_name']; ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المستوى " >
        </div>

        <div class="form-group">
                <label>حالة المرحلة الدراسية</label>
                <select name="active_edit" id="" class="form-control p-1  rounded-0">
                     <?php  

                        echo ($edit_items['active']==1) ? "<option value='1'>مفعل</option><option value='2'> غير مفعل </option>" : "<option value='2'> غير مفعل </option><option value='1'>مفعل</option>";?>
                   
                </select>
        </div>
        <?php endforeach ;?>
        <input type="submit" name="edit_submit" value="تعديل" class="btn btn-primary text-light px-3 py-2" >
        <a href="<?php echo ROOT_URL;?>/edulevel" class="btn btn-danger text-light p-2">إلغاء</a>
        </form>
    </div>
</div>


</div>