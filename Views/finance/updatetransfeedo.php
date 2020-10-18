<?php

/**
 * fileName:    تفعيل تعديل رسوم دراسية
 */
?>
<?php foreach ((array) $viewmodel as $item) : ?>
    <div class="container col-xs-12 col-md-6 m-auto">
        <div class="card p-0 rounded-0 border-0 z-depth-1">
            <?php $op = new Khas(); ?>
            <div class="card-header text-center text-white danger-color-dark p-1">
                تعديل رسوم دراسية
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            البرنامج
                            <hr class="p-1 mt-0 mb-0">
                            <select name="s" id="ss" class="form-control p-0 rounded-0  border-0    bg-white h-select " disabled="disabled" style="font-size:80%">
                                <?php echo $op->FullSelProgInfo($_GET['prog_id']); ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            الفترة
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->getSelDepartmentTxt($_GET['dep_id']); ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            القسم
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->getSelesectionTxt($_GET['sec_id']); ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            المستوى
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->GetSellevelsTxt($_GET['lev_id']); ?>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            المجموعة
                            <hr class="p-1 mt-0 mb-0">
                            <?php echo $op->GetSelgroupsTxt($_GET['grp_id']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card p-0 rounded-0 border-0 z-depth-1">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <?php $op = new Khas(); ?>
                <div class="card-header text-center text-white unique-color-dark p-1">
                    معلومات الرسوم
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                جهةالدفع
                                <hr class="p-1 mt-0 mb-0">
                                <input type="number" name="opnum" id="opnum" min="0" step="1" value="0" class="form-control p-0 rounded-0       bg-white">
                            </div>
                            <div class="col-xs-12 col-md-6">
                                نوع العملية
                                <hr class="p-1 mt-0 mb-0">
                                <select name="opname" id="opname" class="form-control p-0 rounded-0       bg-white">
                                    <option value="1"> زيادة </option>
                                    <option value="2"> خصم </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="doUpload" class="btn success-color-dark text-white px-3 py-2"> تعديل الرسوم </button>
                    <a href="<?php echo ROOT_URL; ?>/finance/updatetransfee" class="btn danger-color-dark text-white float-left px-3 py-2"> إلغاء </a>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>