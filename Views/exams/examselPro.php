<?php $op = new Khas(); ?>
<div class="container col-xs-12 col-sm-12 col-md-8 m-auto">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
                <select class="form-control  p-1" id="FullPro" name="FullPro" onchange="getDg()">
                    <?php $op->FullProgInfo(); ?>
                </select>
        </div>
        <div class="form-group">
            <button type="submit" name="Sel_Pro_stu" class="btn red darken-4 text-white py-2 px-5  mt-0 float-right"> اضافة درجات لطالب </button>
            <button type="submit" name="Sel_Pro_cls" class="btn green darken-4 text-white py-2 px-5  mt-0 float-left"> رفع درجات فصل </button>
        </div>
    </form>
</div>
