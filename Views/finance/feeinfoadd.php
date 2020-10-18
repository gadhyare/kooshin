<?php

/**
 * fileName: اضافة   معلومات رسوم
 */
?>
<?php $op = new KHas(); ?>
<?php
/**
 * fileName: المواد والبرامج
 */
?>
<?php $op = new Khas(); ?>
<?php if (isset($_GET['pro_id'])) : ?>
    <?php $op->chkSelProgtxt($_GET['pro_id']); ?>
<?php endif; ?>
<?php $Pay_Res_id = isset($_POST['PaymentRes']) ? $_POST['PaymentRes'] : ''; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 ">
            <div class="card rounded-0 p-1 border z-depth-0">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="selecteduLev"> اختر المرحلة </label>
                            <select name="edulev_id" id="edulev_id" class="form-control rounded-0">
                                <?php $op->GetSeledulevel($_GET['edulev_id']); ?>
                            </select>
                            <br>
                            <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> اختر </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-md-8 ">
            <?php if (isset($_GET['edulev_id'])) : ?>

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-2">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="PaymentRes">نوع الرسوم</label>
                                <select name="PaymentRes" id="PaymentRes" class="form-control"><?php $op->getSelpaymentres($Pay_Res_id) ?></select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="fee_amount">قدر الرسوم</label>
                                <input type="number" name="fee_amount" id="fee_amount" class="form-control" value="0">
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="addnewfee" class="btn success-color-dark text-white rounded-0  m-auto py-2 float-left"> اضافة </button>

                    <table class="table table-striped table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="p-1 bg-dark text-center"> المسلسل</th>
                                <th class="py-2 px-4 bg-dark text-center">
                                    <input type="checkbox" name="chkGrp" id="chkGrp" onclick="selectall(this);">
                                </th>
                                <th class="p-1   bg-dark" style="font-size:75% !important "> الكلية </th>
                                <th class="p-1   bg-dark" style="font-size:75% !important "> القسم الأكاديمي </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $json = json_decode($viewmodel); ?>
                            <?php foreach ((array) $json   as $items => $key) : ?>
                                <tr>
                                    <td class="p-1"><?php echo $i++; ?></td>
                                    <td class="p-2 text-center" style="font-size:70%"> <input type="checkbox" name="selectServices[]"  id="chk" value="<?php echo $key->prog_id; ?>"> </td>
                                    <td class="p-1"><?php echo  $op->GetSelfacultytxt($key->fac_id); ?></td>
                                    <td class="p-1"><?php echo $op->GetSelacademicstxt($key->academics_id); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    function getinfo() {
        let y = document.querySelector("b");
        if (y.value !== '') {
            alert('on');
        }
    }

    function selectall(source) {
        let checkboxes = document.getElementsByName('selectServices[]'),
            services = document.getElementById('services'),
            count = 0;
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;

        }

    }

    $(function() {
        $('input[name=chkGrp],input[name=selectServices[]]').on('change', function() {
            $('#services').val($('input[name=selectServices[]]:checked').map(function() {
                return this.value;
            }).get());
        });

    });
</script>