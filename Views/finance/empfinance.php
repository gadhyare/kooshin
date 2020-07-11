<div class="container">
    <div class="row">
            <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=debt" class="col-xs-12 col-md-2 m-auto mdb-color darken-3 text-white text-center  rounded-0 btn"> أخذ دين للموظف </a>
            <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=allowance" class="col-xs-12 col-md-2 m-auto mdb-color darken-3 text-white text-center  rounded-0 btn"> علاوات   للموظف </a>
            <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=deduction" class="col-xs-12 col-md-2 m-auto mdb-color darken-3 text-white text-center  rounded-0 btn">  خصم مالية الموظف </a>
            <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=upsellary" class="col-xs-12 col-md-2 m-auto mdb-color darken-3 text-white text-center  rounded-0 btn">       مرتبات الموظفين     </a>
    </div>
    <hr>
    <div class="container">
        <?php 
        if(isset($_GET['type']) && $_GET['type'] == 'debt'){
            require "empFinanceDep/empdebt.php";
        }elseif(isset($_GET['type']) && $_GET['type'] == 'allowance'){
            require "empFinanceDep/empallowance.php";
        }elseif(isset($_GET['type']) && $_GET['type'] == 'deduction'){
            require "empFinanceDep/empdeduction.php";
        }elseif(isset($_GET['type']) && $_GET['type'] == 'upsellary'){
            require "empFinanceDep/upsellary.php";
        }
        ?>
    </div>
</div>


