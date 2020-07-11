 
<?php if(isset($_SESSION['files_dir'] )) {  $fledir = $_SESSION['files_dir'];} else { $fledir = '';} ?>
 
 <div class="container mt-3"> 
<div class="container bg-primary  text-center rounded-0">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group bg-primary p-1">
    <input type="file" name="examfileup" class="btn btn-primary   rounded-0" id="examfileup">
        <input type="hidden" name="files_dir" value="<?php echo $fledir ;?>">
        <input type="submit" name="importSubmit" class="btn btn-outline-light   " value="Upload">
    </div>
    </form>
</div>
 
</div>
 
