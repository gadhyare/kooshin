<?php include('getdepartment.php'); ?>
<?php foreach($viewmodel as $item) { ?>
    <br>
    <div class="container col-xs-12 col-sm-12 col-md-10 m-auto ">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container text-left">
             <input type="submit" name="add_quali" value="اضافة" id="add_quali" class="btn success-color-dark   rounded-0 text-white    mb-3  py-2 px-3 ml-1">
             <a   href="<?php echo ROOT_URL;?>/student/update/<?php echo $_GET['stu_id'];?>"  class="btn danger-color-dark   rounded-0 text-white    mb-3  py-2 px-3 ml-1"> تراجع </a>
         </div>
             
                <div class="card mb-1  rounded-0">
                <div class="card-header accord-header unique-color-dark text-center text-white    rounded-0 p-1">
                       
                                المؤهلات العلمية للطالب
                           
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block p-1 ">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> درجة الشهادة </label>
                                            <select name="Edu_quali" id="Edu_quali" class="form-control input-sm p-1  rounded-0">
                                                <option value="<?php echo $item['Edu_quali'];?>" selected > <?php echo $item['Edu_quali'];?> </option>
                                                <option value="ثانوية علمية"   > ثانوية علمية </option>
                                                <option value="ثانوية أدبية"   > ثانوية أدبية </option>
                                                <option value="ثانوية شرعية"   > ثانوية شرعية </option>
                                                <option value="شهادة جامعية"   > شهادة جامعية </option>
                                                <option value="أخرى"> أخرى </option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> تاريخ التخرج </label>
                                            <input type="date" required="required" name="Edu_year" id="Edu_year" value="<?php echo $item['Edu_year'];?>" class="form-control input-sm p-1  rounded-0" placeholder="سنة التخرج">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> الجهة التي تخرج منها </label>
                                            <input type="text" required="required" name="Edu_Issuer" id="Edu_Issuer" value="<?php echo $item['Edu_Issuer'];?>" class="form-control input-sm p-1  rounded-0" placeholder=" الجهة التي تخرج منها    ">
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> لغة الشهادة </label>
                                            <select name="Edu_lang" id="Edu_lang" class="form-control input-sm p-1  rounded-0">
                                                <option value="<?php echo $item['Edu_lang'];?>" selected > <?php echo $item['Edu_lang'];?> </option>
                                                <option value="عربية" > عربية </option>
                                                <option value="صومالية" > صومالية </option>
                                                <option value="انجليزية" > انجليزية </option>
                                                <option value="غير ذلك" > غير ذلك </option>
                                            </select>
                                        </div>
                                    </td>
                            </table>
                        </div>
                    </div>
                </div>
        </form>
</div>
<?php } ;?>


 