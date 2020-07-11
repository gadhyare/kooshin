<div class="container">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <?php $op = new Khas(); ?>
        <div class="card-header text-center text-white unique-color-dark"> الإستعلام عن استمارة طالب </div>
        <div class="card-body border">
            <div class="form-group row ">
                <div class="col-xs-12 col-md-2">
                    <input type="text" name="stu_id" id="stu_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ''; ?>" class="form-control rounded-0" placeholder="الرقم الجامعي للطالب" style="font-size:80%">
                </div>
                <div class="col-xs-12 col-md-6">
                    <select name="pro_id" id="pro_id" class="form-control p-0 float-right col-12 rounded-0">
                        <?php $op->FullSelProgInfo($_POST['pro_id']); ?>
                    </select>
                </div>
                <div class="col-xs-12 col-md-3">
                <button type="submit" name="pos" class="btn danger-color-dark   text-white px-2 py-2 mt-0 float-right "> <i class="fa fa-paper-plane"></i> </button>
                    <?php if(isset($_GET['id']) && isset($_GET['prog_id'])):?>
                        <a href="<?php echo ROOT_URL . "/exams/stuGpaprint/" . $_GET['id'] . "?prog_id=" . $_GET['prog_id'];?>" target="_blank" class="btn primary-color-dark   text-white px-2 py-2 mt-0 float-right ">   تقرير مفصل </a>
                        <a href="<?php echo ROOT_URL . "/exams/stufullGpaprint/" . $_GET['id'] . "?prog_id=" . $_GET['prog_id'];?>" target="_blank" class="btn success-color-dark   text-white px-2 py-2 mt-0 float-right ">   استمارة </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </form>
    
    <?php foreach ((array) $viewmodel as $item) : ?>
        <table class="table border  m-auto border text-right">
            <tr>
                <td class="p-1 border"> الاسم:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                <td class="p-1 border"> الرقم الجامعي: <?php echo $op->getStuInfoByStunm($_GET['id'], 'stu_num'); ?> </td>
                <td class="p-1 border" colspan="3"> البرنامج: <?php echo $op->GetSelProgInfoTxt($_GET['prog_id']); ?> </td>
            </tr>
            <tr>
                <td class="p-1 border"> القسم :<?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                <td class="p-1 border"> الفترة: <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                <td class="p-1 border"> المستوى: <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                <td class="p-1 border"> المجموعة: <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
            </tr>
        </table>
    <?php endforeach; ?>
  
</div>