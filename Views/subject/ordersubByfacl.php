<div class="container">
    <a href="<?php echo ROOT_URL; ?>/subject/add" class="btn btn-primary mt-2 float-left rounded-0 mb-2 py-1 px-3"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مادة جديدة </a>
   
    
    <br>
    <hr>
 <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 ">
            <div class="card rounded-0 p-1 border z-depth-0">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="selecteduLev"> اختر المرحلة </label>
                            <select name="edulev_id" id="edulev_id" class="form-control rounded-0">
                                <?php $op->Getedulevel(); ?>
                            </select>
                            <br>
                            <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> اختر </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <?php if (isset($_GET['edulev_id'])) : ?>
                <div class="card rounded-0 p-1 border z-depth-0">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-2">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="selecteduLev"> اختر البرنامح </label>
                                <select name="pro_id" id="pro_id" class="form-control rounded-0">
                                    <?php $op->FullSelProgInfobyEdulevid($_GET['edulev_id']); ?>
                                </select>
                                <br>
                                <button type="submit" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> اختر </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-md-8 ">
            <?php if (isset($_GET['edulev_id']) && isset($_GET['pro_id'])) : ?>
                <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfaclprint?edulev_id=<?php echo $_GET['edulev_id'];?>&pro_id=<?php echo $_GET['pro_id'];?>" class="btn danger-color-dark  text-white float-left rounded-0 mb-2 py-1 px-3"> <i class="fa fa-print" aria-hidden="true"></i></a>
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="p-1 bg-dark text-center"> المسلسل</th>
                            <th class="p-1 bg-dark text-center"> اسم المادة</th>
                            <th class="p-1 bg-dark text-center"> كود المادة</th>
 
                            <th class="p-1 bg-dark text-center"> الحالة</th>
                            <th class="p-1 bg-dark text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $json = json_decode($viewmodel); ?>
                        <?php foreach ((array) $json   as $items => $key) : ?>
                            <tr>
                                <td class="p-1"><?php echo $i++; ?></td>
                                <td class="p-1"><?php echo $key->subject_name;  ?></td>
                                <td class="p-1"><?php echo $key->subject_code;  ?></td>
 
                                <td class="p-1"><?php echo ($key->active == 1) ? 'مفعل' : 'غير مفعل'; ?> </td>
                                <input type="hidden" name="edit_id" value="<?php echo $key->sub_id; ?>">
                                <td class="p-1">
                                    <a href="<?php echo ROOT_URL; ?>/subject/update/<?php echo $key->sub_id; ?>" class="btn bg-primary text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                                    <a href="<?php echo ROOT_URL; ?>/subject/delete/<?php echo $key->sub_id; ?>" class="btn bg-danger text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>
    </div>

 </div>


</div>