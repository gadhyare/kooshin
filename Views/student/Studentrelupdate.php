<?php

/**
 * fileName: تعديل قريب طالب
 */
?>
<?php $op = new Khas();   ?>
<?php foreach ($viewmodel as  $row) : ?>
    <div class="container col-xs-12 col-sm-12 col-md-10 m-auto ">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="container text-left">
                <input type="submit" name="update_rel" value="تعديل" id="submit" class="btn danger-color-dark   rounded-0 text-white    mb-3  py-2 px-3">

            </div>
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card mb-1  rounded-0">
                    <div class="card-header accord-header unique-color-dark text-center    rounded-0" role="tab" id="headingOne">
                        <h5 class="mb-0 ">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                معلومات قريب للطالب
                            </a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block p-1 ">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> اسم القريب </label>
                                            <input type="text" required="required" name="rel_name" value="<?php echo $row['rel_name']; ?>" id="rel_name" class="form-control  p-1  rounded-0" placeholder="اسم القريب ">
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> صلة القرابة </label>
                                            <select name="rel_type" id="rel_type" class="form-control  p-1  rounded-0">
                                                <option value="1"> الأب </option>
                                                <option value="2"> الأم </option>
                                                <option value="3"> الأخ </option>
                                                <option value="4"> الأخت </option>
                                                <option value="5"> العم </option>
                                                <option value="6"> العمة </option>
                                                <option value="7"> الخال </option>
                                                <option value="8"> الخالة </option>
                                                <option value="9"> الجد </option>
                                                <option value="10"> الجدة </option>
                                                <option value="11"> غير ذلك </option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> درجة القرابة </label>
                                            <select name="rel_digree" id="rel_digree" class="form-control  p-1  rounded-0">
                                                <option value="1"> الأولى </option>
                                                <option value="2"> الثانية </option>
                                                <option value="3"> الثالثة </option>
                                                <option value="4"> غير ذالك </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> العنوان </label>
                                            <input type="text" required="required" name="rel_Address" value="<?php echo $row['rel_Address']; ?>" id="rel_Address" class="form-control  p-1  rounded-0" placeholder=" الهواتف ">
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> البريد الألكتروني </label>
                                            <input type="text" required="required" name="rel_email" value="<?php echo $row['rel_email']; ?>" id="rel_email" class="form-control  p-1  rounded-0" placeholder=" الهواتف ">
                                        </div>
                                        <div class="form-group input-group-sm p-1 m-0">
                                            <label> الهواتف </label>
                                            <input type="text" required="required" name="rel_phones" value="<?php echo $row['rel_phones']; ?>" id="rel_phones" class="form-control  p-1  rounded-0" placeholder=" الهواتف ">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>