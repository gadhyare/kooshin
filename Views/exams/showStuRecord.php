<?php include('getdepartment.php');?>
<div id="showExamResult">
<page size="A4">
<button type="submit" name="print" id="print" class="btn btn-outline-primary float-left" onclick="printData();" > <i class="fa fa-print"></i> </button>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home" class="btn btn-outline-primary m-1">كامل درجات الطالب</a></li>
  <li><a data-toggle="tab" href="#menu1"  class="btn btn-outline-primary m-1">استمارة الطالب</a></li>
</ul>

<div class="tab-content mt-5">
  <div id="home" class="tab-pane fade border border-danger in active">
            <?php get_stuLev();?>
  </div>
  <div id="menu1" class="tab-pane fade border border-danger">
            <?php get_stuLevGPA();?>
  </div>
  <br>
</div>
 
 

</div>
 
</page>
 