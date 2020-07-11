<?php include('getdepartment.php'); ?>
<?php if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
} ?>
<div class="container  m-auto">
  <?php foreach ($viewmodel as $stu_info_update) { ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="container text-left">
        <input type="submit" name="Update_Stu_Info" value="تعديل بيانات طالب" class="btn danger-color-dark   rounded-0 text-white    mb-3  py-1 px-3" name="add_student">
        <a href="<?php echo ROOT_URL; ?>/student/info" class="btn stylish-color-dark rounded-0 text-white mb-3 py-1 px-3"> الرجوع لبيانات الطلاب </a>
        <a href="<?php echo ROOT_URL; ?>/student/stuInfoPrint/<?php echo $_GET['id'];?>"  target="_blank" class="btn primary-color-dark rounded-0 text-white mb-3 py-1 px-3">   <i class="fa fa-print"></i>   </a>
        <button type="button" class="btn rgba-black-strong text-white float-right  py-1 px-3" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa  fa-folder-open"></i> اختيار الصورة
        </button>
      </div>
      <?php $stu_pic = ($stu_info_update['stu_pic'] != "") ? $_SESSION['ROOT_URL'] . "//uplouds/" . $stu_info_update['stu_pic'] : ""; ?>
      <img src="<?php echo $stu_pic; ?>" alt="" id="student_img" style="width:100px;height:100px;" class="border border-danger img-thumbnail float-left">
      <br>
      <div class="clearfix"></div>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card mb-1  rounded-0">
          <div class="card-header accord-header pink darken-4 text-center    rounded-0" role="tab" id="headingOne">
            <h5 class="mb-0" style="font-size:90%">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                المعلومات الشخصية للطالب
              </a>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block p-1 ">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> اسم الطالب </label>
                      <input type="text" required="required" name="StuName" value="<?php echo $stu_info_update['StuName']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="أدخل هنا اسم الطالب">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> الرقم الجامعي </label>
                      <input type="text" name="stu_num" value="<?php echo $stu_info_update['stu_num']; ?>" class="form-control bg-white input-sm p-1  rounded-0">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> اسم الأم </label>
                      <input type="text" required="required" value="<?php echo $stu_info_update['mothername']; ?>" name="mothername" class="form-control input-sm p-1  rounded-0" placeholder="اسم الأم">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0  ">
                      <input type="hidden" name="stu_pic" value="<?php echo $op->setPosts("stu_pic"); ?>" id="stu_pic" value="">

                      <input type="hidden" name="u" value="<?php echo $_SESSION['ROOT_URL']; ?>" id="u">
                      <label> تاريخ التسجيل </label>
                      <input type="date" name="reg_date" id="reg_date" class="form-control" value="<?php echo date("Y-m-d", time()); ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> الجنس </label>
                      <select name="gender" class="form-control input-sm p-1  rounded-0" id="">
                        <option value="1" selected> ذكر </option>
                        <option value="2"> أنثى </option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> تاريخ الميلاد </label>
                      <input type="date" required="required" value="<?php echo $stu_info_update['DOB']; ?>" name="DOB" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> مكان الميلاد </label>
                      <input type="text" required="required" value="<?php echo $stu_info_update['POB']; ?>" name="POB" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> الجنسية </label>
                      <input type="text" required="required" name="Natinality" value="<?php echo $stu_info_update['Natinality']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الجنسية ">
                    </div>

                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> عنوان السكن </label>
                      <input type="text" required="required" name="StuAddress" value="<?php echo $stu_info_update['StuAddress']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" عنوان السكن ">
                    </div>

                  </td>

                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> المدينة </label>
                      <input type="text" required="required" name="city" value="<?php echo $stu_info_update['city']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" المدينة ">
                    </div>
                  </td>

                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> الدولة </label>
                      <input type="text" required="required" name="contry" value="<?php echo $stu_info_update['contry']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الدولة ">
                    </div>
                  </td>

                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> الهواتف </label>
                      <input type="text" required="required" name="Phones" value="<?php echo $stu_info_update['Phones']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الهواتف ">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <h5 class="modal-title" id="exampleModalLongTitle"> فضلاً اختر الصورة </h5>

              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body tab-pane">
            <?php show_images(); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger rounded-0 ml-1" data-dismiss="modal"> اغلاق </button>

          </div>
        </div>
      </div>
    </div>

 



  <?php } ?>
  <div class="card mb-1  rounded-0">
    <div class="card-header accord-header pink darken-4 rounded-0" role="tab" id="headingThree">
      <h5 class="mb-0" style="font-size:90%">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          معلومات قريب للطالب
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block p-1">
        <?php require("Studentrelinfo.php"); ?>
      </div>
    </div>
  </div>
  <div class="card mb-1  rounded-0">
    <div class="card-header accord-header pink darken-4 rounded-0" role="tab" id="headingTwo">
      <h5 class="mb-0" style="font-size:90%">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          المؤهلات العلمية للطالب
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block p-1">
        <?php require("Studentacademicinfo.php"); ?>
      </div>
    </div>
  </div>
  <div class="card mb-1  rounded-0">
    <div class="card-header accord-header pink darken-4 rounded-0" role="tab" id="headingFour">
      <h5 class="mb-0" style="font-size:90%">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsestudeis" aria-expanded="false" aria-controls="collapsestudeis">
          المعلومات الدراسية للطالب
        </a>
      </h5>
    </div>
    <div id="collapsestudeis" class="collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="card-block p-1">
        <table class="table table-bordered">
          <?php require("StudentacademicPro.php"); ?>
        </table>
      </div>
    </div>
  </div>
</div>
</div>


<script>
  function reply_click(clicked_id) {
    var ps = document.getElementById("u").value + "/" + "uplouds/";
    document.getElementById("stu_pic").value = clicked_id;
    document.getElementById("student_img").src = ps + clicked_id;
  }
</script>