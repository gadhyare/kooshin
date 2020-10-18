 <?php
  /**
   * fileName: الرئيسية
   */
  ?>
 <?php $getLastStu = $op->get_last_registed_students(); ?>
 <?php $StNo = 1; ?>
 <div class="container  ">
 
   <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
       <div class="card  bg-white    z-depth-0   border-unique  p-0 rounded-0  ">
         <div class="card-header unique-color-dark border-unique text-white font-weight-bold  p-1  rounded-0  "> آخر الطلبة المسجلين </div>
         <div class="card-body   z-depth-0  p-1">
           <table id="dtHorizontalExample" class="table  table-striped  border   table-bordered   z-depth-0" cellspacing="0" width="100%">
             <thead>
             <tr>
               <td scope="col" class="p-1  border-0"> #</td>
               <td scope="col" class="p-1  border-0"> الإسم</td>
               <td scope="col" class="p-1  border-0"> الجنس </td>
               <td scope="col" class="p-1  border-0">  التفاصيل </td>
             </tr>
             </thead>
             
             <tbody>
             <?php $lastStuInfo =  $op->getLastStuInfo() ;?>
               <?php foreach ((array) $lastStuInfo as $getLastStuRows) : ?>
                <tr>
                 <td class="p-1  border-0"> <?php echo $StNo++; ?> </td>
                 <td class="p-1  border-0"> <?php echo $getLastStuRows['StuName']; ?> </td>
                 <td class="p-1  border-0"> <?php echo ($getLastStuRows['gender'] == 1) ? "ذكر" : "أنثى"; ?> </td>
                 <td class="p-1  border-0"> <a href="<?php echo ROOT_URL;?>/student/update/<?php echo $getLastStuRows['stu_id'];?>" class="btn danger-color-dark text-white px-2 py-1 text-white   "><i class="fa fa-user"></i></a> </td>
                 </tr>
               <?php endforeach; ?>
             </tbody>
           </table>
         </div>
       </div>

       <?php $lastFeeTrans =  $op->getLastfee_trans() ;?>
       <?php if(count((array) $lastFeeTrans) > 0) :?>
       <div class="card  bg-white    z-depth-0   border-unique p-0 rounded-0    px-1 py-0">
         <div class="card-header unique-color-dark border-unique text-white font-weight-bold  p-1  rounded-0  "> آخر الطلبة  الذين دفعوا الرسوم الدراسية </div>

         <div class="card-body   z-depth-0  px-0 py-1">
           <table id="dtHorizontalExample" class="table  table-striped  border   table-bordered   z-depth-0" cellspacing="0" width="100%">
             <thead>
             <tr>
               <td scope="col" class="p-1  border-0"> #</td>
               <td scope="col" class="p-1  border-0"> الإسم</td>
               <td scope="col" class="p-1  border-0">  تاريخ الدفع </td>
               <td scope="col" class="p-1  border-0">  التفاصيل </td>
             </tr>
             </thead>
             
             <tbody>
               <?php $StNo = 1;?>
              
               <?php foreach ((array)$lastFeeTrans as $lastFeeTransrec) : ?>
                <tr>
                 <td class="p-1  border-0"> <?php echo $StNo++; ?> </td>
                 <td class="p-1  border-0"> <?php echo $op->getStuNameById($op->getStuInfoByInvoiceNum($lastFeeTransrec['Invoice_id'])) ; ?> </td>
                 <td class="p-1  border-0"> <?php echo  $lastFeeTransrec['payDate'] ; ?> </td>
                 <td class="p-1  border-0"> <a href="<?php echo ROOT_URL;?>/finance/paidstufee/<?php echo $lastFeeTransrec['Invoice_id'];?>" class="btn unique-color-dark text-white px-2 py-1 text-white"><i class="fa fa-dollar"></i></a> </td>
                 </tr>
               <?php endforeach; ?>
             </tbody>
           </table>
         </div>
       </div>
               <?php endif;?>

     </div>
     <div class="col-xs-12 col-sm-12 col-md-6  mt-2">
     <div class="card  bg-white    z-depth-0   border-unique mb-3 p-0 rounded-0 ">
         <div class="card-header unique-color-dark border-unique text-white font-weight-bold  p-1  rounded-0  "> آخر الإحصائيات   </div>

         <div class="card-body   z-depth-0  p-1">
            
         

       <div class="container">
         <div class="row">

           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-user  ml-2"></i>
               عدد الطلبة : <?php echo $op->get_stu_num(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-list ml-2"></i>
               عدد الكليات : <?php echo $op->countfaculty(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-tasks ml-2"></i>
               عدد البرامج : <?php echo $op->countPrograms(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-address-card ml-2"></i>
               عدد الأقسام : <?php echo $op->countSection(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-address-card ml-2"></i>
               عدد المجموعات : <?php echo $op->countGrp(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-address-card ml-2"></i>
               عدد المستويات : <?php echo $op->countLev(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-address-card ml-2"></i>
               عدد المواد : <?php echo $op->countSub(); ?>
             </div>
           </div>
           <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
             <div class="card-body z-depth-1  p-4 text-center btn-green text-white" style="font-size:90%;">
               <i class="fa fa-address-card ml-2"></i>
               عدد العضوية : <?php echo $op->countUsers(); ?>
             </div>
           </div>
         </div>
       </div>

       </div>
       </div>
     </div>

   </div>
 </div>