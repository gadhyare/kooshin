   <?php $op = new Khas();?>
   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="saearchbyDate">
        <div class="row  border-0 p-0 z-depth-0 eounded-0">
            <div class="form-group   col-xs-12 col-md-4 text-center">
                <label for="dateFrom"> من تاريخ </label>
                <input type="date" name="dateFrom" id="dateFrom" class="form-control reounded-0 border  rounded-0  ">
            </div>
            <div class="form-group   col-xs-12 col-md-4 text-center">
                <label for="dateTo"> إلى تاريخ </label>
                <input type="date" name="dateTo" id="dateTo" class="form-control reounded-0 border  rounded-0  ">
            </div>
            <div class="form-group   col-xs-12 col-md-4 text-left">
                <br>
                <button type="submit" name="searchdeductionBydate" class="btn danger-color-dark text-white py-1 px-5 py-2 mt-2"> <i class="fa fa-eye"></i> </button>
            </div>
        </div>
    </form>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="saearchbyDateEmpid">
        <div class="row  border-0 p-0 z-depth-0 eounded-0">
            <div class="form-group   col-xs-12 col-md-3 text-center">
                <label for="empdateFrom"> من تاريخ </label>
                <input type="date" name="empdateFrom" id="empdateFrom" class="form-control reounded-0 border  rounded-0  ">
            </div>
            <div class="form-group   col-xs-12 col-md-3 text-center">
                <label for="empdateTo"> إلى تاريخ </label>
                <input type="date" name="empdateTo" id="empdateTo" class="form-control reounded-0 border  rounded-0  ">
            </div>
            <div class="form-group   col-xs-12 col-md-4 text-center">
                <label for="emp_id"> اسم الموظف </label>
                <select name="emp_id" id="emp_id" class="form-control reounded-0 border   rounded-0  ">
                    <?php $op->getempList();?>
                </select>
            </div>
            <div class="form-group   col-xs-12 col-md-2 text-left">
                <br>
                <button type="submit" name="searchdeductionBydateAndempId" class="btn danger-color-dark text-white py-1 px-5 py-2 mt-2"> <i class="fa fa-eye"></i> </button>
            </div>
        </div>
    </form>