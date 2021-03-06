<?php

/**
 * fileName: بحث معلومات طالب
 */
?>
<?php $op = new Khas()  ?>
<?php $FullPro = (isset($_GET['ids'])) ? $_GET['ids'] : ''; ?>
<?php $dep_id = (isset($_GET['dep_id'])) ? $_GET['dep_id'] : ''; ?>
<?php $sec_id = (isset($_GET['sec_id'])) ? $_GET['sec_id'] : ''; ?>
<?php $lev_id = (isset($_GET['lev_id'])) ? $_GET['lev_id'] : ''; ?>
<?php $grp_id = (isset($_GET['grp_id'])) ? $_GET['grp_id'] : ''; ?>

<div class="container-fuild">
    <div class="row">
        <div class="col-xs-12 col-12 col-md-3">
            <div class="card  z-depth-0 border mt-2">
                <div class="card-header  text-white  unique-color-dark font-weight-bold text-center p-1"> البحث في الفصل </div>
                <div class="card-body">

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form1" class="  mt-1">
                        <div class="form-group   p-2">
                            <label> البرنامج </label>
                            <select class="form-control  p-1 rounded-0 " id="FullPro" name="FullPro" style="font-size: 85%">
                                <?php $op->FullSelProgInfo($FullPro); ?>
                            </select>
                            <br>
                        </div>
                        <div class="form-group">
                            <label> الفترة </label>
                            <select class="form-control rounded-0 p-1" style="font-size:90%;" name="dep_id" id="dep_id">
                                <?php $op->getSelDepartment($dep_id); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> القسم </label>

                            <select class="form-control rounded-0 p-1" style="font-size:90%;" name="sec_id" id="sec_id">
                                <?php $op->getSelesection($sec_id); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> المستوى </label>

                            <select class="form-control rounded-0 p-1" style="font-size:90%;" name="lev_id" id="lev_id">
                                <?php echo  $op->GetSellevels($lev_id); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> المجموعة </label>

                            <select class="form-control rounded-0 p-1" style="font-size:90%;" name="grp_id" id="grp_id">
                                <?php echo $op->GetSelgroups($grp_id); ?>
                            </select>
                        </div>


                        <button type="submit" name="getData" id="getData" class="btn success-color-dark p-2  text-white  float-right"> <i class="fa fa-paper-plane"></i> اختر </button>
                        <button type="submit" name="delData" id="delData" class="btn danger-color-dark p-2  text-white  float-left"> <i class="fa fa-trash-o"></i> حــذف </button>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-xs-12 col-12 col-md-9 border ">
            <?php if ($viewmodel) : ?>
                <?php $url_info = "ids=" . $_GET['ids'] . "&dep_id=" . $_GET['dep_id'] . "&sec_id=" . $_GET['sec_id'] . "&lev_id=" . $_GET['lev_id'] . "&grp_id=" . $_GET['grp_id']; ?>
                <?php $url_infoprint = "prog=" . $_GET['ids'] . "&dep=" . $_GET['dep_id'] . "&sec=" . $_GET['sec_id'] . "&lev=" . $_GET['lev_id'] . "&grp=" . $_GET['grp_id']; ?>
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/exporttoexcel?<?= $url_info; ?>" target="_blank" class="btn success-color-dark text-white  px-3 py-2   "> <i class="fa fa-download" aria-hidden="true"></i> تحويل لأكسل </a>
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/stuinfolistprint/?<?= $url_infoprint; ?>" target="_blank" class="btn danger-color-dark text-white  px-3 py-2   "> <i class="fa fa-print" aria-hidden="true"></i> طباعة القائمة </a>
                <div class="table-responsive">

                    <table class="table" id="myTable">
                        <thead>
                            <th class="p-2 stylish-color text-center" style="font-size:70%">ر الجامعي</th>
                            <th class="py-2 px-4 stylish-color text-center">
                                <input type="checkbox" name="chkall" id="chkall">
                            </th>
                            <th class="p-2 stylish-color text-center" style="font-size:90%"> الاسم </th>
                            <th class="p-2 stylish-color text-center" style="font-size:90%"> الرقم الجامعي </th>
                            <th class="p-2 stylish-color text-center" style="font-size:90%"> الهاتف </th>
                            <th class="p-2 stylish-color text-center" style="font-size:80%">الجنس</th>
                            <th class="p-2 stylish-color text-center" style="font-size:80%"> العنوان </th>
                            <th class="p-2 stylish-color text-center" style="font-size:80%">تاريخ التسجيل</th>
                            <th class="p-2 stylish-color text-center" style="font-size:80%">العمليات</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($viewmodel as $itemss) : ?>
                                <?php $gender = ($itemss['gender'] == 2) ? "ذكر" : "أنثى"; ?>
                                <t>
                                    <td class=" p-2 text-center" style="font-size:70%"> <?php echo $itemss['stu_id']; ?> </td>
                                    <td class="p-2 text-center" style="font-size:70%"> <input type="checkbox" name="chk[]" id="chkitem" value="<?php echo $itemss['stu_id']; ?>"> </td>
                                    <td class="p-2 text-right" style="font-size:80%"> <?php echo $itemss['StuName'];  ?> </td>
                                    <td class="p-2 text-center" style="font-size:80%"> <?php echo $itemss['stu_num'];  ?> </td>
                                    <td class="p-2 text-center" style="font-size:80%"> <?php echo $op->getStuInfoById($itemss['stu_id'],    'Phones');  ?> </td>
                                    <td class="p-2 text-center" style="font-size:80%"> <?php echo $op->getSelesectionTxt($itemss['gender']);  ?> </td>
                                    <td class="p-2 text-center" style="font-size:80%"> <?php echo $itemss['StuAddress'];  ?> </td>
                                    <td class="p-2 text-center" style="font-size:80%"> <?php echo  $itemss['reg_date']; ?></td>
                                    <td class="p-2 text-center">                                   
                                        <div class="dropdown m-auto">
                                            <button class="btn pink darken-3 text-white dropdown-toggle p-1 m-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                العمليات
                                            </button>
                                            <div class="dropdown-menu p-1 text-right" aria-labelledby="dropdownMenuButton">
                                                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/update/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1">  تحديث </a>
                                                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/stuInfoPrint/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> طباعة </a>
                                                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/finance/feepaid/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> الرسوم </a>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <?php echo Data_Not_Founded; ?>
            <?php endif; ?>
        </div>
    </div>
</div>