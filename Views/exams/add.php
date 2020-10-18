    <?php
    /**
     * fileName: اضافة درجات طالب
     */
    ?>
    <?php $op = new Khas(); ?>
    <div class="container mt-5">
        <div class="card  ">
            <div class="card-header  text-dark font-weight-bold text-center p-1"> إدخال درجات اختبار لطالب </div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="frm-1">
                    <input type="text" name="stu_id" id="stu_id" class="form-control py-2 px-3   rounded-0 col-xs-12 col-sm-6 col-md-2 float-right mt-0">
                    <button type="submit" name="seclect_data" id="seclect_data" class="btn success-color-dark  rounded-0 text-white  py-2 px-3 col-xs-12 col-sm-6 col-md-2 float-right mt-0"> اختر </button>
                </form>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="frm-2">
                    <input type="submit" name="add_stu" value="تسجيل درجات طالب" id="submit" class="btn danger-color-dark  rounded-0 text-white  py-2 px-3 float-left" name="add_student">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <table class="table table-bordered spacial-tbl">
                                <tbody>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <select name="lev_id" class="form-control input-sm p-0  rounded-0" style="font-size: 80% !important; ">
                                                <?php $op->get_level(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <select name="sec_id" class="form-control input-sm p-0  rounded-0" style="font-size: 80% !important; ">
                                                <?php $op->get_section(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <select name="dep_id" class="form-control input-sm p-0  rounded-0" style="font-size: 80% !important; ">
                                                <?php $op->get_department(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <select name="grp_id" class="form-control input-sm p-0  rounded-0" style="font-size: 80% !important; ">
                                                <?php $op->get_group(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <select name="prog_id" class="form-control input-sm p-0  rounded-0" style="font-size: 80% !important; ">
                                                <?php $op->get_sel_student_prgrams($_GET['stu_id']); ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <select name="sub_id" class="form-control input-sm p-0  rounded-0" style="font-size: 80% !important;;">
                                                <?php $op->get_sel_student_prgrams($_GET['stu_id']); ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="ex_code" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            المستوى
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="ex_crid" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <table class="table table-bordered spacial-tbl">
                                <tbody>
                                    <tr>
                                        <td class="spc-td p-1" colspan="3" style="font-size: 80% !important; ">الفترة الأولى</td>
                                        <td class="spc-td p-1" colspan="3" style="font-size: 80% !important; " style="font-size: 80% !important; " style="font-size: 80% !important; ">الفترة الثانية</td>
                                        <td class="spc-td p-1" rowspan="2" style="font-size: 80% !important; " style="font-size: 80% !important; ">الحضور</td>
                                        <td class="spc-td p-1" rowspan="2" style="font-size: 80% !important; ">المجموع</td>
                                    </tr>
                                    <tr>
                                        <td class="spc-td p-1" style="font-size: 80% !important; "> أسئلة</td>
                                        <td class="spc-td p-1" style="font-size: 80% !important; "> بحث</td>
                                        <td class="spc-td p-1" style="font-size: 80% !important; "> اختبار</td>
                                        <td class="spc-td p-1" style="font-size: 80% !important; "> أسئلة</td>
                                        <td class="spc-td p-1" style="font-size: 80% !important; "> بحث</td>
                                        <td class="spc-td p-1" style="font-size: 80% !important; "> اختبار</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            <input type="text" name="qu1" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="as1" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="ex1" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="qu2" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="as2" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="ex2" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="att" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                        <td class="p-1">
                                            <input type="text" name="" required id="" class="form-control p-1 rounded-0" style="font-size: 80% !important; ">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>