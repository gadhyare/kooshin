<?php
 


 $d = DIR . 'lib'.SB.'mpdf'.SB.'vendor'.SB.'autoload.php';


 require $d;



 $mpdf  = new \Mpdf\Mpdf(['autoArabic' => true]);



 require 'print_data.php';

 $data = ob_get_clean();
 $mpdf->autoScriptToLang = true;
 $mpdf->autoLangToFont = true;
 $mpdf->WriteHTML($data);

 $mpdf->Output( DIR . 'filesdir' . SB .'mmmmm.pdf'  ); ?>

<embed src="<?php echo ROOT_URL . '/filesdir/mmmmm.pdf';?>" type="application/pdf" width="100%" height="600px" />