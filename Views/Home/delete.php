<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >
<?php foreach($viewmodel as $delete_items) : ?>
                   <div class="container p-2 mt-2 bg-danger text-light text-center font-weight-bold ">
                       <p class="lead p-2 mt-2 text-white text-center">
                           هل انت متأكد من حذف السجل [ <?php echo $delete_items['level_name'] ;?> ] ؟
                       </p>
                       <input name="delete_items" type="submit" class="btn btn-primary text-light px-3 py-2  a-light py-2 text-weight-bold" value="نعم"> 
                       <a href="<?php echo ROOT_URL;?>/home" class="btn btn-outline-light  a-light py-2 text-weight-bold">إلغاء</a>
                    </div>
                
<?php endforeach ;?> 
</form>