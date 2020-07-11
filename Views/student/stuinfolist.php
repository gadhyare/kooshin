<div class="container">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container mt-5">
            <div class="card   z-depth-0 border">
                <div class="card-header  unique-color-dark text-white font-weight-bold text-center p-1"> تقرير اختبار مادة </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="form-group  ">
                                <select class="form-control p-1 col-xs-12 col-6 rounded-0 float-right" id="prog_id" name="prog_id" style="font-size:85%">
                                    <?php $op->FullSelProgInfo($prog_id); ?>
                                </select>
                                <button type="submit" name="showData" id="showData" class="btn danger-color-dark text-white mt-0 px-3 py-2"> <i class="fa fa-info"></i> اظهار المعلومات </button>
                                <?php if (isset($_GET['prog']) && isset($_GET['grp']) && isset($_GET['dep']) && isset($_GET['sec']) && isset($_GET['lev'])) :
                                    echo '<a  href="'.ROOT_URL.'/student/stuinfolistprint/?prog=' . $_GET['prog'] . '&dep=' . $_GET['dep'] . '&sec=' . $_GET['sec'] . '&lev=' . $_GET['lev'] . '&grp=' . $_GET['grp'] . '" target="_blank"  class="btn unique-color-dark text-white mt-0 px-3 py-2">  <i class="fa fa-print"></i> طباعة المعلومات </a>';
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label> الفترة </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 text-center p-1" name="dep_id" id="dep_id">
                                    <?php $op->getSelDepartment($dep_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label> القسم </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 text-center p-1" name="sec_id" id="sec_id">
                                    <?php $op->getSelesection($sec_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label> المستوى </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 text-center p-1" name="lev_id" id="lev_id">
                                    <?php $op->GetSellevels($lev_id); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label> المجموعة </label>
                            <div class="form-group">
                                <select class="form-control rounded-0 text-center p-1" name="grp_id" id="">
                                    <?php $op->GetSelgroups($grp_id); ?>
                                </select>
                            </div>
                        </div>
                    </div>
    </form>

    <hr>
    <div id="idCount"></div>
    <div class="container  ">
        <table class="table   text-center table-striped " id="myTable">
            <thead>
                <th class="p-1 purple darken-4 text-white text-center"> م</th>
                <th class="p-1 purple darken-4 text-white text-center"> الاسم </th>
                <th class="p-1 purple darken-4 text-white text-center"> الرقم الجامعي </th>
                <th class="p-1 purple darken-4 text-white text-center"> تاريخ التسجيل </th>
                <th class="p-1 purple darken-4 text-white text-center"> الهاتف </th>
                <th class="p-1 purple darken-4 text-white text-center"> الحالة</th>
                <th class="p-1 purple darken-4 text-white text-center"> العمليات</th>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $items = json_decode($viewmodel); ?>
                <?php if (count((array) $items) > 0) : ?>
                    <?php foreach ($items as $SearchResultShow => $val) : ?>
                        <tr>
                            <td class="p-0 text-center"> <i id="no"> <?php echo $no++; ?></i> </td>
                            <td class="p-0 text-center"> <?php echo $op->getStuNameById($val->stu_id); ?></td>
                            <td class="p-0 text-center"> <?php echo $op->getStuInfoById($val->stu_id, 'stu_num' ); ?></td>
                            <td class="p-0 text-center"> <?php echo $val->reg_date; ?></td>
                            <td class="p-0 text-center"> <?php echo $op->getStuInfoById($val->stu_id, 'Phones' ); ?></td>
                            <td class="p-0 text-center"> <?php echo $val->statues; ?></td>
                            <td class="p-0 text-center">
                                <a href="<?php echo ROOT_URL; ?>/student/update/<?php echo $val->stu_id; ?>" class="btn bg-success text-white border-0 rounded-0 p-1"><i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                                <a href="<?php echo ROOT_URL; ?>/student/update/<?php echo $val->stu_id; ?>" class="btn bg-danger text-white border-0 rounded-0 p-1"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
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