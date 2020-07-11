<div class="container-fluid py-3">
    <?php $op = new Khas(); ?>
    <div class="row">
        <div class="col-xs-12 col-md-4 ">
            <div class="card">
                <?php if (isset($_GET['op']) && $_GET['op'] == 'edit') : ?>
                    <?php $getBankData = $op->getBankData($_GET['id']); ?>
                    <?php foreach ($getBankData as $getItem) : ?>
                        <div class="card-header pink darken-3 text-white text-center p-1 rounded-0 border-0"> تعديل حساب بنكي   </div>
                        <div class="card-body">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label> اسم الحساب </label>
                                    <input type="text"  name="UpBan_name" id="upBan_name"   value="<?php echo $getItem['Ban_name'];?>"  class="form-control p-1  rounded-0">
                                </div>
                                <div class="form-group">
                                    <label> رقم الحساب </label>
                                    <input type="text"  name="UpBan_num" id="upBan_num"   value="<?php echo $getItem['Ban_num'];?>"  class="form-control p-1  rounded-0">
                                </div>
                                <div class="form-group">
                                    <label> تاريخ الإضافة </label>
                                    <input type="date"  name="UpBan_date" id="upBan_date"   value="<?php echo $getItem['Ban_date'];?>"  class="form-control p-1  rounded-0">
                                </div>
                                <div class="form-group">
                                <label>  الحساب الإفتتاحي </label>
                                <input type="number" name="UpBan_op_acc" id="UpBan_op_acc" class="form-control p-1  rounded-0">
                            </div>
                                <div class="form-group">
                                    <label> حالة الحساب </label>
                                    <select name="UpBan_active" id="upBan_active" class="form-control p-1  rounded-0">
                                     <?php   echo ($getItem['Ban_active'] == 1)  ? '<option value="1">مفعل</option><option value="2">غير مفعل</option>':'<option value="2">غير مفعل</option><option value="1">مفعل</option>';?>
                                        
                                    </select>
                                </div>
                                <input type="submit" name="updateRec" value="تعديل" class="btn btn-primary text-light px-3 py-2">
                                <a href="<?php echo ROOT_URL; ?>/baninfo" class="btn btn-danger text-light p-2">إلغاء</a>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="card-header pink darken-3 text-white text-center p-1 rounded-0 border-0"> اضافة حساب بنكي جديد </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label> اسم الحساب </label>
                                <input type="text" name="Ban_name" id="Ban_name" class="form-control p-1  rounded-0">
                            </div>
                            <div class="form-group">
                                <label> رقم الحساب </label>
                                <input type="text" name="Ban_num" id="Ban_num" class="form-control p-1  rounded-0">
                            </div>
                            <div class="form-group">
                                <label> تاريخ الإضافة </label>
                                <input type="date" name="Ban_date" id="Ban_date" class="form-control p-1  rounded-0">
                            </div>
                            <div class="form-group">
                                <label>  الحساب الإفتتاحي </label>
                                <input type="number" name="Ban_op_acc" id="Ban_op_acc" class="form-control p-1  rounded-0">
                            </div>
                            <div class="form-group">
                                <label> حالة الحساب </label>
                                <select name="Ban_active" id="Ban_active" class="form-control p-1  rounded-0">
                                    <option value="1">مفعل</option>
                                    <option value="2">غير مفعل</option>
                                </select>
                            </div>
                            <input type="submit" name="addRec" value="اضافة" class="btn btn-primary text-light px-3 py-2">
                            <a href="<?php echo ROOT_URL; ?>/academics" class="btn btn-danger text-light p-2">إلغاء</a>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-xs-12 col-md-8 border z-depth-1 ">

            <table class="table table-bordered table-striped border-dark " id="myTable">
                <thead>
                    <th class="p-1 text-center unique-color-dark"> #</th>
                    <th class="p-1 text-center unique-color-dark"> اسم الحساب </th>
                    <th class="p-1 text-center unique-color-dark"> رقم الحساب </th>
                    <th class="p-1 text-center unique-color-dark"> تاريخ الإضافة</th>
                    <th class="p-1 text-center unique-color-dark"> العمليات </th>
                </thead>
                <tbody>
                    <?php $nu = 1; ?>
                    <?php foreach ((array) $viewmodel as $item) : ?>
                        <tr>
                            <td class="p-1 "><?php echo $nu++; ?> </td>
                            <td class="p-1 "> <?php echo $item['Ban_name']; ?> </td>
                            <td class="p-1 "> <?php echo $item['Ban_num']; ?> </td>
                            <td class="p-1 "> <?php echo $item['Ban_date']; ?></td>
                            <td class="p-1  text-center">
                                <a href="<?php echo ROOT_URL; ?>/baninfo/<?php echo $item['Ban_id']; ?>?op=edit" class="btn success-color-dark p-1 text-white"> <i class="fa fa-pencil"></i> </a>
                                <a href="<?php echo ROOT_URL; ?>/baninfo/delete/<?php echo $item['Ban_id']; ?>" class="btn danger-color-dark p-1 text-white"> <i class="fa fa-trash-o"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




