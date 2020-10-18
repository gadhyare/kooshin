 </div>
 </div>
 </div>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/popper.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/i18n/ar.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery-form.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/bootstrap.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/admin-js.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/gaar.js"></script>

 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery-1.7.2.min.js"></script>


 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>

 <script>
   window.addEventListener("load", function() {
     var load_screen = document.getElementById("load_screen"),
       login_body = document.getElementById("login_body");

     login_body.style.visibility = "visible";
     load_screen.remove();
   });


   $("#chkall").change(function() {
     $("INPUT[type='checkbox']").prop("checked", this.checked);
   });
   $(document).ready(function() {
     $('#myTable').DataTable({
       paging: true,
       fixedColumns: true,
       language: {
         "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
       }
     });
   });
   $(document).ready(function() {
     $('[data-toggle="tooltip"]').tooltip();
   });

   $(document).ready(function() {
     (".prog_id").select2();
   });
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <?php
  unset($_SESSION['msg']);
  unset($_SESSION['stu_id_info']);
  unset($_SESSION['pro_id_info']);
  ?>
 </body>

 </html>