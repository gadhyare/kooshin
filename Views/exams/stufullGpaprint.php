<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <div class="header-section">
        <div class="logo-section">
            <img src="<?php echo $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $op->siteSetting('siteLogo'); ?>" style="height:150px; width:150px;" class="rounded-circle p-0" alt="">
        </div>
            <div class="info-section">
                <?php echo $op->siteSetting('siteName'); ?>
                <br>
                <?php echo $op->siteSetting('siteDisc'); ?>
                <br>
                <?php echo $op->siteSetting('siteAddr'); ?>
                <br>
                <?php echo $op->siteSetting('sitePhones'); ?>
                <br>
                تاريخ الطباعة: <?php echo date("Y-M-d", time()); ?>
            </div>
    </div>
    <hr class="hr">
    <h1 class="text-center"> استمارة درجات الطالب </h1>
 
<div class="container">
 
        <?php $op = new Khas(); ?>
    <?php $count  = $viewmodel; ?>
    <?php foreach ((array) $viewmodel as $item) : ?>
        <table class="print-table   m-auto  text-right">
            <tr>
                <td class="p-1 "> الاسم:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                <td class="p-1 "> الرقم الجامعي: <?php echo $op->getStuInfoByStunm($_GET['id'], 'stu_num'); ?> </td>
                <td class="p-1 " colspan="3"> البرنامج: <?php echo $op->GetSelProgInfoTxt($_GET['prog_id']); ?> </td>
            </tr>
            <tr>
                <td class="p-1 "> القسم :<?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                <td class="p-1 "> الفترة: <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                <td class="p-1 "> المستوى: <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                <td class="p-1 "> المجموعة: <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <?php $op->get_stuLevGPA($op->getStuInfoByStunm($_GET['id'], 'stu_id') , $_GET['prog_id'] )  ;?>
</div>
</div>

<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
 
</script>