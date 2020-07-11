
 <div class="clearfix"></div>
 <?php $i = 1; ?>
 <ul class="list-group border-0 col-xs-12 col-sm-12 col-md-8 m-auto">

 <a href="<?php echo ROOT_URL; ?>/settings/socialmediadd" class=" btn-primary  float-left rounded-0 mb-2 py-1 px-3 col-1 text-center"> <i class="fa fa-plus" aria-hidden="true"></i>   </a>

     <?php foreach ($viewmodel as $item) : ?>
         <?php $status = ($item['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?>
         <li class="list-group-item  border  bg-white mb-1">
             <span class="bg-danger text-white py-0 px-2 "> <?php echo $i; ?></span>
             <img src="<?php echo $item['socialmedia_logo']; ?>" class="rounded-circle mx-2" alt="" style="height:25px; width:25px;">
             

             <a href="<?php echo $item['socialmedia_link']; ?>" target="_blank" class="text-dark m-auto">  <?php echo $item['socialmedia_name']; ?> </a>
             <span class="badge badge-danger badge-pill float-left p-2">
                 <a href="<?php echo ROOT_URL; ?>/settings/socialmediadel/<?php echo $item['socialmedia_id']; ?>" class="text-white"> حذف </a>
             </span>

             <span class="badge success-color-dark ml-1 badge-pill float-left p-2">
                 <a href="<?php echo ROOT_URL; ?>/settings/socialmediaedit/<?php echo $item['socialmedia_id']; ?>" class="text-white"> تعديل </a>
             </span>
         </li>
         <?php $i++;?>
     <?php endforeach; ?>
 </ul>