<div class="container  m-auto">
    <a href="<?php echo ROOT_URL;?>/finance/expensetypeadd" class="btn danger-color-dark text-white p-1 float-left"> <i class="fa fa-pluse p-0"></i> اضافة نوعية رسوم جديدة </a>
   <br>
   <?php $op = new Khas();?>
    <hr>
    <?php $item = json_decode($viewmodel); ?>
    <table class="table table-striped" id="myTable"> 
        <thead>
            <th class="p-1 text-center mdb-color darken-3" > # </th>
            <th class="p-1 text-center mdb-color darken-3" > نوع نفقات </th>
            <th class="p-1 text-center mdb-color darken-3" > الحالة </th>
            <th class="p-1 text-center mdb-color darken-3" > العمليات </th>
        </thead>
        <tbody>
            <?php if (count((array) $item)) : ?>
                <?php $i = 1 ;?>
                <?php foreach($item as $key => $val):?>
                    <tr>
                        <td class="p-1"> <?php echo $i ;?> </td>
                        <td class="p-1">  <?php echo $val->exptype;?> </td>
                        <td class="p-1"> <?php echo ($val->active == 1) ? "مفعل" : "غير مفعل" ;?> </td>
                        <td class="p-1 text-center">
                            <a href="<?php echo ROOT_URL;?>/finance/expensetypeupdate/<?php echo $val->exptypeid;?>" class="btn success-color-dark text-white p-1"> <i class="fa fa-edit p-0"></i> </a>
                            <a href="<?php echo ROOT_URL;?>/finance/expensetypedelete/<?php echo $val->exptypeid;?>" class="btn danger-color-dark text-white p-1"> <i class="fa fa-trash p-1"></i> </a>
                        </td>
                    </tr>
                    <?php $i++;?>
                <?php endforeach ;?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="p-1">
                        <?php echo $_SESSION['msg'] = Data_Not_Founded ;?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>