 <?php
    /**
     * fileName: طباعة المواد بحسب البرامج
     */
    ?>
 <br>
 <br>
 <?php $op = new Khas(); ?>
 <?php $op->chkSelProgtxt($_GET['pro_id']); ?>
 <div class="container print-page">
     <?php echo $op->get_report_header("قائمة مواد التخصص "); ?>
   
     <hr>
     <div class="container text-center"> <?php echo $op->FulltextProgInfo($_GET['pro_id']); ?> </div>
     <hr>
     <table class="print-table">
         <thead>
             <tr>
                 <td class="p-1  text-center"> المسلسل</td>
                 <td class="p-1  text-center"> اسم المادة</td>
                 <td class="p-1  text-center"> كود المادة</td>
                 <td class="p-1  text-center"> الحالة</td>
             </tr>
         </thead>
         <tbody>
             <?php $i = 1; ?>
             <?php $json = json_decode($viewmodel); ?>
             <?php foreach ((array) $json   as $items => $key) : ?>
                 <tr>
                     <td class="p-1"><?php echo $i++; ?></td>
                     <td class="p-1"><?php echo $key->subject_name;  ?></td>
                     <td class="p-1"><?php echo $key->subject_code;  ?></td>
                     <td class="p-1"><?php echo ($key->active == 1) ? 'مفعل' : 'غير مفعل'; ?> </td>
                 </tr>
             <?php endforeach; ?>

         </tbody>
     </table>

 </div>
 <?php $op->get_report_footer(); ?>

 <script>
     window.print();
     window.addEventListener('afterprint', (event) => {
         window.close();
     });
 </script>