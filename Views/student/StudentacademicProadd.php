<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <div class="card  ">
        <div class="card-header  blue-grey darken-4 text-white font-weight-bold text-center p-1"> اضافة برنامج دراسي للطالب </div>
        <div class="card-body teal lighten-5">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row">
                    <?php $op = new Khas(); ?>
                    
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> تاريخ التسجيل </label>
                            <input type="date" name="reg_date" value="<?php echo $op->setPosts('reg_date'); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المادة الجديدة">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label> البرنامج </label>
                            <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0">
                                <?php echo $op->FullProgInfo(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> المستوى </label>
                            <select name="lev_id" id="lev_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_level(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> المجموعة </label>
                            <select name="grp_id" id="grp_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_group(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> الفترة </label>
                            <select name="dep_id" id="dep_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_department(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> القسم </label>
                            <select name="sec_id" id="sec_id" class="form-control p-1  rounded-0">
                                <?php echo $op->get_section() ; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> الحالة </label>
                            <select name="statues" id="statues" class="form-control p-1  rounded-0">
                                <option value="مستمر">مستمر</option>
                                <option value="تم قيد السجل"> تم قيد السجل </option>
                                <option value="تم تراجع الطالب"> تم تراجع الطالب </option>
                                <option value="متخرج">متخرج </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label> خصم خاص للطالب للبرنامج </label>
                            <input type="number" name="Prog_Discount" value="<?php echo $op->setPosts('Prog_Discount'); ?>" class="form-control p-1  rounded-0" value="0">
                        </div>
                    </div>
                </div>
                <input type="submit" name="add_stu_prog" value="اضافة" class="btn btn-primary text-light px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/subject" class="btn btn-danger text-light p-2">إلغاء</a>
            </form>
        </div>
    </div>
</div>