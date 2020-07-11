<div class="container ">
    <div class="card m-auto col-xs-12 col-md-8 z-depth-0 border rounded-0 p-0">
        <div class="card-header unique-color-dark text-center text-white p-1"> اضافة قسم وظيفي جديد </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card-body p-2">
                <div class="row">
                    <div class="form-group col-xs-12 col-md-6">
                        <label for="seem_sec_name"> القسم الوظيفي </label>
                        <input type="text" name="em_sec_name" id="em_sec_name" value="<?php echo (isset($_POST['em_sec_name'])) ?$_POST['em_sec_name'] :'';?>" class="form-control rounded-0 p-1">
                    </div>
                    <div class="form-group col-xs-12 col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-md-10">
                                <label for="active"> القسم الوظيفي </label>
                                <select name="active" id="active" class="form-control rounded-0 p-1">
                                    <option value="1"> مفعل </option>
                                    <option value="2"> غير مفعل </option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-2 py-1 px-0">
                                <br>
                                <button type="submit"  name="btn_submit" id="btn_submit" class="btn success-color-dark text-white px-3 py-2"> <i class="fa fa-send"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
    <hr>
    <table class="table tables ">
     <thead>
       <tr>
         <th class="p-1 bg-dark"> المسلسل</th>
         <th class="p-1 bg-dark"> القسم الوظيفي </th>
         <th class="p-1 bg-dark"> الحالة</th>
         <th class="p-1 bg-dark" colspan="2">العمليات</th>
       </tr>
     </thead>
     <tbody>
       <?php $i = 1; ?>
       <?php foreach ((array)$viewmodel as $dep_temes_edite) : ?>
         <?php $status = ($dep_temes_edite['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
         <tr>
           <td class="p-1"><?php echo $i++; ?></td>
           <td class="p-1"><?php echo $dep_temes_edite['em_sec_name'];  ?></td>
           <td class="p-1"><?php echo $status; ?> </td>
           <input type="hidden" name="edit_id" value="<?php echo $dep_temes_edite['em_sec_id']; ?>">
           <td class="p-1">
             <a href="<?php echo ROOT_URL; ?>/employees/emsectionsupdate/<?php echo $dep_temes_edite['em_sec_id']; ?>" class="btn bg-primary text-white rounded-0 py-1 px-2 "> <i class="fa fa-pencil p-0 p-0" aria-hidden="true"></i> </a>
             <a href="<?php echo ROOT_URL; ?>/employees/emsectionsdelete/<?php echo $dep_temes_edite['em_sec_id']; ?>" class="btn bg-danger text-white rounded-0 py-1 px-2 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
</div>
</div>