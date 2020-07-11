<?php include('getdepartment.php');?>
<div class="container bg-white p-3 text-center rounded-0">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form-group p-1">
    <input type="file" name="fileToUpload[]" id="fileToUpload">
        <input type="hidden" name="hidden_fileds" value="<?php echo $di ;?>">
    </div>
    <div class="form-group p-1">
        <input type="submit" name="uploads" class="btn btn-primary text-white rounded-0" value="Upload">
    </div>
    </form>
</div>
