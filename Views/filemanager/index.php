<div class="container">
    <a href="<?php echo ROOT_URL; ?>/filemanager/upload" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> <i class="fa fa-upload" aria-hidden="true"></i> رفع ملفات جديدة </a>
    <div class="clearfix"></div>
    <br>
    <div class="row">
        <?php $dir = 'uplouds/*.*';

        $get_img = glob($dir);
        $i = 1;
        $arr = array("jpeg", "jpg", "png",  "gif");
        foreach ($get_img as $show_img) {
            $image_name = str_replace("uplouds/", "", $show_img);
            if (in_array(get_img_extension($image_name), $arr)) {
                $print_imgs =   "<img src='" . ROOT_URL . "/"
                    . $show_img
                    . "' alt='"
                    . $show_img
                    . "' title='"
                    . $image_name
                    . "' style='width:90%; height:130px; margin:2px;' id='"
                    . $image_name
                    . "' class='w-100' ";
                echo  '<div class="col-xs-12 col-sm-6 col-md-2 p-1 z-depth-1">' . $print_imgs . get_img_data($i) . '</div>';
                echo '<!-- Modal -->
                <div class="modal fade " id="exampleModalCenter' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body tab-pane" id="u">'; ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 ">
                        <?php echo $print_imgs . "'/>"; ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <small class="mt-0"><?php echo str_replace("." , "" , str_replace(get_img_extension($image_name), "", $image_name))  ; ?></small>
                        <br>
                        <?php echo   "نوع الملف: " . get_img_extension($image_name); ?> <br>
                        <?php echo "حجم الملف: " . img_info($show_img, "filesize"); ?><br>
                        <?php echo "آخر تعديل للملف: " . img_info($show_img, "filemtime"); ?><br>
                       
                    </div>
                </div>
        <?php
                echo '</div>
                            <div class="modal-footer p-1">
                                <button type="button" class="btn  primary-color-dark text-white px-3 py-2 rounded-0 ml-1 float-right" data-dismiss="modal"> اغلاق </button>
                                <a  href="' . ROOT_URL . '/filemanager/delfile?file=' . $image_name . '" class="btn  danger-color-dark text-white px-3 py-2 rounded-0 ml-1 float-left" > حذف الملف </a>
                            </div>
                        </div>
                    </div>
                </div>';
                $i++;
            }
        }
        ?>
    </div>

</div>


<?php

function get_img_data(string $x)
{
    return  "data-toggle='modal' data-target='#exampleModalCenter" . $x . "'  onclick='reply_click(this.id)'  />";
}

function get_img_extension(string $img)
{
    $info =  pathinfo($img, PATHINFO_EXTENSION);
    return $info;
}


function img_info(string $img, string $data)
{
    if ($data == "filesize") {
        return   number_format(filesize($img) / 1024, 1) . "kb";
    } elseif ($data == "filemtime") {
        return   trim(  date("m-d-yy |  H:i:s.", filemtime($img)) , ".");
    }
}
