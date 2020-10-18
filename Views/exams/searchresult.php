    <?php
    /**
     * fileName: تقرير اختبار مادة
     */
    ?>
    <?php $op = new Khas(); ?>
    <?php $dep_id = (isset($_POST['dep_id'])) ? $_POST['dep_id'] : ''; ?>
    <?php $sec_id = (isset($_POST['sec_id'])) ? $_POST['sec_id'] : ''; ?>
    <?php $lev_id = (isset($_POST['lev_id'])) ? $_POST['lev_id'] : ''; ?>
    <?php $grp_id = (isset($_POST['grp_id'])) ? $_POST['grp_id'] : ''; ?>
    <?php $prog_id = (isset($_POST['prog_id'])) ? $_POST['prog_id'] : ''; ?>
    <?php $sub_id = (isset($_POST['sub_id'])) ? $_POST['sub_id'] : ''; ?>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="container mt-5">
                <div class="card   z-depth-2">
                    <div class="card-header  unique-color-dark text-white font-weight-bold text-center p-1"> تقرير اختبار مادة </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="form-group  ">
                                    <select class="form-control p-1 col-xs-12 col-6 rounded-0 float-right prog_id" id="prog_id" name="prog_id" style="font-size:85%">
                                        <?php $op->FullSelProgInfo($prog_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label> الفترة </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 text-center p-1" name="dep_id" id="dep_id">
                                        <?php $op->getSelDepartment($dep_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label> القسم </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 text-center p-1" name="sec_id" id="sec_id">
                                        <?php $op->getSelesection($sec_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label> المستوى </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 text-center p-1" name="lev_id" id="lev_id">
                                        <?php $op->GetSellevels($lev_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-1">
                                <label> المجموعة </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 text-center p-1" name="grp_id" id="grp_id">
                                        <?php $op->GetSelgroups($grp_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label> المادة </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 text-center p-1 float-right col-9" name="sub_id" id="sub_id">
                                        <?php $op->getSeleExsubject($sub_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <div class="form-group pt-2">
                                    <?php $print_url = "prog_id=" . $prog_id . "&dep_id=" . $dep_id . "&sec_id=" . $sec_id . "&lev_id=" . $lev_id . "&grp_id=" . $grp_id . "&sub_id=" . $sub_id; ?>
                                    <button class="btn mdb-color darken-3 text-white    mt-2  rounded-0 mb-2 py-1 px-3" name="btnFullPro"> <i class="fa fa-check"></i> </button>
                                    <?php if ($prog_id != '') : ?><a href="<?php echo ROOT_URL; ?>/exams/searchresultprint/?s&<?php echo $print_url; ?>" target="_blank" class="btn primary-color-dark mt-2  rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-print" aria-hidden="true"></i> </a><?php endif; ?>
                                </div>
                            </div>

                        </div>
        </form>

        <div id="idCount"></div>
        <div class="container tab-pane">
            <table class="table   text-center table-striped table-responsive-lg">
                <tr>
                    <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> م</td>
                    <td class="p-1 purple darken-4 text-white text-center" rowspan="2">الرقم الجامعي </td>
                    <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                        الفترة الأولى
                    </td>
                    <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                        الفترة الثاني
                    </td>
                    <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> الحضور </td>
                    <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> المجموع</td>
                    <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> التقدير</td>
                    <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> العمليات</td>
                </tr>
                <tr>
                    <td class="p-1 purple darken-4 text-white text-center"> الأسئلة</td>
                    <td class="p-1 purple darken-4 text-white text-center"> البحث</td>
                    <td class="p-1 purple darken-4 text-white text-center"> الإختبار</td>
                    <td class="p-1 purple darken-4 text-white text-center"> الأسئلة</td>
                    <td class="p-1 purple darken-4 text-white text-center"> البحث</td>
                    <td class="p-1 purple darken-4 text-white text-center"> الإختبار </td>
                </tr>

                <tbody>
                    <?php $no = 1; ?>
                    <?php $items = json_decode($viewmodel); ?>
                    <?php if (count((array) $items) > 0) : ?>
                        <?php foreach ($items as $SearchResultShow => $val) : ?>
                            <tr>
                                <td class="p-0 text-center"> <i id="no"> <?php echo $no++; ?></i> </td>
                                <td class="p-0 text-center"> <?php echo $val->stu_id; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->qu1; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->as1; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->ex1; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->qu2; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->as2; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->ex2; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->att; ?></td>
                                <td class="p-0 text-center"> <?php echo $val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att; ?></td>
                                <td class="p-0 text-center"> <?php echo $op->get_gpa($val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att); ?></td>
                                <td class="p-0 text-center">
                                    <a href="<?php echo ROOT_URL; ?>/exams/updatestuexam/<?php echo $val->ex_id; ?>/<?php echo $_GET['action']; ?>" class="btn bg-success text-white border-0 rounded-0 p-1"><i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                                    <a href="<?php echo ROOT_URL; ?>/exams/stdelexam/<?php echo $val->ex_id; ?>/<?php echo $_GET['action']; ?>" class="btn danger-color-dark text-white border-0 rounded-0 p-1"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($no == 1) {
                        echo '<tr class="alert alert-danger " > <td colspan="13" class="text-center"> عفواً ولكن لا توجد بيانات لعرضها  </td></tr>';
                    } ?>
                    <div class="alert alert-info float-left text-dark rounded-0 py-1 ml-1"> <?php if ($no > 1) echo 'عدد الطلبة هو: ' . ($no - 1); ?> </div>
                    </tr>
            </table>

        </div>


    </div>
    </div>


    </div>