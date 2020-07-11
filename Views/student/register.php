<?php include('getdepartment.php'); ?>
<?php $op = new Khas(); ?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
  <button type="button" class="btn rgba-black-strong text-white float-right  py-2 px-3" data-toggle="modal" data-target="#exampleModalCenter">
    <i class="fa  fa-folder-open"></i> اختيار الصورة
  </button>
  <div class="container text-left">
    <input type="submit" name="add_stu" value="التالي" id="submit" class="btn bg-danger   rounded-0 text-white    mb-3  py-2 px-3">
    <a href="<?php echo ROOT_URL; ?>/student/info" class="btn bg-primary rounded-0 text-white mb-3 py-2 px-3"> الرجوع لبيانات الطلاب </a>
  </div>

  <br>
  <div class="form-group input-group-sm p-1 m-0 text-center">
    <img src="" alt="" id="student_img" style="width:100px;height:100px;" class="border border-danger rounded-circle">
  </div>
  <div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="card mb-1  rounded-0">
      <div class="card-header accord-header mdb-color darken-3 text-center    rounded-0" role="tab" id="headingOne">
        <h5 class="mb-0 ">
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
                  <input type="text" required="required" name="StuName" value="<?php echo $op->setPosts("StuName"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="أدخل هنا اسم الطالب">
                </div>
              </td>
              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> الرقم الجامعي للطالب </label>
                  <input type="text" required="required" name="stu_num" value="<?php echo $op->setPosts("stu_num"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="أدخل هنا اسم الطالب">
                </div>
              </td>
              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> اسم الأم </label>
                  <input type="text" required="required" name="mothername" value="<?php echo $op->setPosts("mothername"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="اسم الأم">
                </div>

              </td>


              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> الجنس </label>
                  <select name="gender" class="form-control input-sm p-1  rounded-0" id="">
                    <option value="1" selected> ذكر </option>
                    <option value="2"> أنثى </option>
                  </select>
                </div>

              </td>

            </tr>

            <tr>

              <td>

                <div class="form-group input-group-sm p-1 m-0">
                  <label> تاريخ الميلاد </label>

                  <input type="date" required="required" name="DOB" value="<?php echo $op->setPosts("DOB"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">


                </div>

              </td>


              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> مكان الميلاد </label>
                  <input type="text" required="required" name="POB" value="<?php echo $op->setPosts("POB"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">
                </div>
              </td>
              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> الجنسية </label>
                  <input type="text" required="required" name="Natinality" value="<?php echo $op->setPosts("Natinality"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الجنسية ">
                </div>

              </td>

              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> عنوان السكن </label>
                  <input type="text" required="required" name="StuAddress" value="<?php echo $op->setPosts("StuAddress"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" عنوان السكن ">
                </div>

              </td>
            </tr>

            <tr>
              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> المدينة </label>
                  <input type="text" required="required" name="city" value="<?php echo $op->setPosts("city"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" المدينة ">
                </div>
              </td>

              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> الدولة </label>
                  <input type="text" required="required" name="contry" value="<?php echo $op->setPosts("contry"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الدولة ">
                </div>
              </td>

              <td>
                <div class="form-group input-group-sm p-1 m-0">
                  <label> الهواتف </label>
                  <input type="text" required="required" name="Phones" value="<?php echo $op->setPosts("Phones"); ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الهواتف ">
                </div>
              </td>
              <td>


                <label for="reg_Date"> تاريخ التسجيل </label>
                <input type="date" name="reg_date" id="reg_date" class="form-control rounded-0 p-1 ">

              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="stu_pic" value="<?php echo $op->setPosts("stu_pic"); ?>" id="stu_pic" value="">

  <input type="hidden" name="u" value="<?php echo $_SESSION['ROOT_URL']; ?>" id="u">

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


<script>
  function reply_click(clicked_id) {
    var ps = document.getElementById("u").value + "/" + "uplouds/";
    document.getElementById("stu_pic").value = clicked_id;
    document.getElementById("student_img").src = ps + clicked_id;
  }
</script>