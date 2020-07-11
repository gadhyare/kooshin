<?php include('getusrappilty.php');?>
<form action="<?php $_SERVER['PHP_SELF'];?>"  method="post" class="login-form mt-5 p-5">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active"  id="nav-manager-tab" data-toggle="tab" href="#nav-manager" role="tab" aria-controls="nav-manager" aria-selected="true">المدير العام</a>
        <a class="nav-item nav-link"         id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab" aria-controls="nav-admin" aria-selected="false">اداري</a>
        <a class="nav-item nav-link"         id="nav-finance-tab" data-toggle="tab" href="#nav-finance" role="tab" aria-controls="nav-finance" aria-selected="false">الإدارة المالية</a>
        <a class="nav-item nav-link"         id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">المدرسون</a>
        <a class="nav-item nav-link"         id="nav-parent-tab" data-toggle="tab" href="#nav-parent" role="tab" aria-controls="nav-parent" aria-selected="false">أولياء الأمور</a>
        <a class="nav-item nav-link"         id="nav-student-tab" data-toggle="tab" href="#nav-student" role="tab" aria-controls="nav-student" aria-selected="false">الطلبة</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-manager" role="tabpanel" aria-labelledby="nav-manager-tab">
                        <?php $logRole = getUsrAppilty('manager');?>
                        <?php  foreach(  $logRole  as $rl) : ?>
                        <?php echo $rl['role'];?>

                        <?php endforeach;?>
        </div>
        <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
        gnfgn
        </div>
        <div class="tab-pane fade" id="nav-finance" role="tabpanel" aria-labelledby="nav-finance-tab">
        
        </div>
        <div class="tab-pane fade" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">
        
        </div>
        <div class="tab-pane fade" id="nav-parent" role="tabpanel" aria-labelledby="nav-parent-tab">
        
        </div>
        <div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">
        
        </div>
    </div>
</form>

 

 <script>
            
 </script>