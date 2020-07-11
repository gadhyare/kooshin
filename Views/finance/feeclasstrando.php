<?php foreach ((array) $viewmodel as $item) : ?>
    <div class="container col-xs-12 col-md-8 col-12 m-auto">
        <div class="card p-0 rounded-0 border-0 z-depth-1">
            <?php $op = new Khas(); ?>
            <div class="card-header text-center text-white danger-color-dark p-1">
                رفع رسوم دراسية
            </div>
            <div class="card-body">
                <div class="container">
                <div class="row">
                <div class="col-12 border">
                            البرنامج
                            
                             
                                <?php echo $op->FullSelProgInfotxt($_GET['prog_id']); ?>
                             
                        </div>
                </div>
                    <div class="row">
                        
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
                                <select name="PyRes" id="PyRes" class="form-control p-0 rounded-0       bg-white  ">
                                    <?php $op->getPayReso(); ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                تفعيل الخصم
                                <hr class="p-1 mt-0 mb-0">
                                <select name="activeDisc" id="activeDisc" class="form-control p-0 rounded-0       bg-white">
                                    <option value="1"> تفعيل </option>
                                    <option value="2"> عدم التفعيل </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="upLoadfee"  class="btn success-color-dark text-white px-3 py-2" >  رفع الرسوم  </button>
                    <a href="<?php echo ROOT_URL;?>/finance/feeclasstrando"  class="btn danger-color-dark text-white float-left px-3 py-2"> إلغاء </a>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>