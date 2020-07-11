 <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >
 
                   <div class="container p-2 mt-2 alert alert-danger col-xs-12 col-md-5 m-auto col-12 text-dark text-center font-weight-bold ">
                    <p class="text-center">
                    <?php if(isset($_GET['multidelId'])):?>
                        
                        هل أنت متأكد من حذف سجلات بعدد : <?php echo $_GET['multidelId'] ;?>
                    </p>
                       <input name="delete_items" type="submit" class="btn success-color-dark text-white px-3 py-2  py-2 text-weight-bold" value="نعم"> 
                       <a href="<?php echo ROOT_URL;?>/student/info" class="btn danger-color-dark  text-white py-2 text-weight-bold">إلغاء</a>
                    
                    <?php endif;?>
                    </div>
 
</form>