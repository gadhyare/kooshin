<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta des>
    <title><?php echo $op->siteSetting("siteName") ; ?></title>
<meta name="description" content="<?php echo $op->siteSetting("siteName") ; ?>" />
<link rel="shortcut icon" type="image/x-icon" href="/favicons/favicon_48x48.ico">
<link rel="canonical" href="<?php echo $op->siteSetting("siteUrl") ; ?>" />
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="title" content="<?php echo $op->siteSetting("siteName") ; ?>" />
<meta property="og:url" content="<?php echo $op->siteSetting("siteUrl") ; ?>" />
<meta property="og:title" content="<?php echo $op->siteSetting("siteName") ; ?>" />
 
<meta name="og:description" content="<?php echo $op->siteSetting("siteName") ; ?>" />
<meta property="og:type" content="article" />

<meta name="twitter:url" content="<?php echo $op->siteSetting("siteUrl") ; ?>" />
<meta name="twitter:title" content="<?php echo $op->siteSetting("siteName") ; ?>" />
<meta name="twitter:description" content="<?php echo $op->siteSetting("siteName") ; ?>" />
<meta name="twitter:image:src" content="<?php echo $op->siteSetting("siteUrl") ; ?>" />
<meta name="twitter:image:alt" content="<?php echo $op->siteSetting("siteName") ; ?>" />
<meta name="membershipDomain" content="<?php echo $op->siteSetting("siteUrl") ; ?>" />
    
    
    <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/mdb.min.css">
    <link rel="stylesheet" media="print" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/mdb.min.css">
    <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/mdb.lite.min.css">
    <link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/print.css">
   <!-- DataTables CSS -->
<link href="<?php echo ROOT_URL ; ?>/assets/css/addons/datatables.min.css" rel="stylesheet">
<!-- DataTables JS -->

<!-- DataTables Select CSS -->
<link href="<?php echo ROOT_URL ; ?>/assets/css/addons/datatables-select.min.css" rel="stylesheet">
<!-- DataTables Select JS -->

<link rel="stylesheet" href="<?php echo $op->siteSetting("siteUrl") ; ?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.css">

 

</head>

<?php if(! isset($_SESSION["loged_in"])){
    echo '<body class="body"><div class="container-fluid bg-dark home">';
    if( $_GET['controller'] != 'user' ){
      header ("Location: " . ROOT_URL . '/user/login');
    }
    
} 
else {
    echo '<body > <div class="container-fluid bg-white m-0 p-0 pb-5">';
     
}
?>
 
<div class="container-fluid m-0 p-0 pb-5">
      <?php if(isset($_SESSION["loged_in"])){ ?>  
             
      <nav class="navbar navbar-expand-lg  bg-dark">
       
      <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon bg-dark"></span>
        <span class="navbar-toggler-icon bg-dark"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo ROOT_URL ;?>/home">الرئيسية <span class="sr-only">(current)</span></a>
          </li>
        </ul>
</div>
<div class="span text-white text-center " style="margin: 0 auto;"><?php echo $op->breadcrumb();?></div>
<a href="<?php echo ROOT_URL ;?>/usrprofile/<?php echo $_SESSION['log_id'];?>" class="nav-item text-white float-left"> <?php echo $_SESSION['log_user'] ;?></a>
<a href="<?php echo ROOT_URL ;?>/usrprofile/logout" class="nav-item text-white float-left mr-5"> Logout</a>
</nav>
<?php } ?>
 

 