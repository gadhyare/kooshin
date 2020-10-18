<?php

/**
 * fileName: تعديل مستوى
 */
?>
<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <script type="text/javascript">
        function showhidden() {

            $("select[name=active]").change(function() {
                $("input[name=selected_value]").val($(this).val());
            });
        }
    </script>
    <div class="col-md-8   mx-auto">
        <?php if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
        } ?>
    </div>
    <?php $arr = array(1 => 'مفعل', 2 => 'غير مفعل'); ?>
    <div class="card  ">

        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                <?php foreach ($viewmodel as $edit_items) : ?>


                    <div class="form-group">
                        <label>اسم القسم</label>
                        <input type="text" name="level_name_edit" value="<?php echo $edit_items['level_name'] ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المستوى ">
                    </div>

                    <div class="form-group">
                        <label>حالة القسم</label>
                        <select name="active" id="" class="form-control p-1  rounded-0" onclick="showhidden()">
                            <?php foreach ($arr as $key => $val) {
                                $status = ($edit_items['active'] == $key) ? 'selected' : '';
                                echo '<option value="' . $key . '" ' . $status . '>' . $val . '</option>';
                            }
                            ?>
                        </select>
                        <input type="hidden" name="selected_value" value="<?php echo $edit_items['active']; ?>">
                    </div>
                <?php endforeach; ?>
                <input type="submit" name="edit_submit" value="تعديل" class="btn primary-color-dark text-white px-3 py-2">
                <a href="<?php echo ROOT_URL; ?>/level" class="btn danger-color-dark text-white p-2">إلغاء</a>
            </form>
        </div>
    </div>


</div>