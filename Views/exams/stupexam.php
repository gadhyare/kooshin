<?php include('getdepartment.php');?>



        
        <div class="container mt-5">
 
     
 <div class="card  ">
     <div class="card-header  text-dark font-weight-bold text-center p-1"> تقرير اختبار مادة </div>
     <form action="<?php $_SERVER['PHP_SELF'];?>"   enctype="multipart/form-data" method="post" role="form">
     <div class="card-body" id="showExamResult">

          
         

            <table class="table table-striped ">
                            <tr>
                                <td class="text-center">
                                        <label>  الفترة </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 p-0 text-center" name="department" id="department">
                                                <?php get_department();?>
                                            </select>
                                        </div>
                                </td>
                                <td class="text-center">
                                        <label>  القسم </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 p-0 text-center" name="section" id="section">
                                                <?php get_section();?>
                                            </select>
                                        </div>
                                </td>
                                <td class="text-center">
                                        <label>  المستوى </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 p-0 text-center" name="level" id="level">
                                                <?php get_level();?>
                                            </select>
                                        </div>
                                </td>
                                <td class="text-center">
                                        <label>  المجموعة </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 p-0 text-center" name="group" id="group">
                                                <?php get_group();?>
                                            </select>
                                        </div>
                                </td>    
                                <td class="text-center">
                                        <label>  المادة </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 p-0 text-center" name="subject" id="group">
                                                <?php get_subject();?>
                                            </select>
                                        </div>
                                </td>         
                            </tr>
            </table>
            <br>
       
            <button type="submit " name="Search" class="btn btn-outline-primary float-right"> <i class="fa fa-search"></i> </button>
         
         <button type="submit" name="print" id="print" class="btn btn-outline-primary float-left" onclick="printData();" > <i class="fa fa-print"></i> </button>
            <div id="idCount"></div>
            <table class="table table-bordered text-center" >
                            <tr>
                                <td  class="p-0 bg-primary text-white text-center" rowspan="2">الرقم الجامعي  </td>
                                <td  class="p-0 bg-primary text-white text-center" colspan="3">
                                     الفترة الأولى 
                                </td> 
                                <td  class="p-0 bg-primary text-white text-center" colspan="3">
                                     الفترة الثاني 
                                </td> 
                                <td  class="p-0 bg-primary text-white text-center" rowspan="2"> الحضور </td>
                                <td  class="p-0 bg-primary text-white text-center" rowspan="2"> المجموع</td>
                                <td  class="p-0 bg-primary text-white text-center" rowspan="2"> التقدير</td>
                            </tr>
                            <tr> 
                                <td  class="p-0 bg-primary text-white text-center" > الأسئلة</td>
                                <td  class="p-0 bg-primary text-white text-center" > البحث</td>
                                <td  class="p-0 bg-primary text-white text-center" > الإختبار</td>
                                <td  class="p-0 bg-primary text-white text-center" > الأسئلة</td>
                                <td  class="p-0 bg-primary text-white text-center" > البحث</td>
                                <td  class="p-0 bg-primary text-white text-center" > الإختبار </td>
                           </tr>

                            <tbody>
                            <?php $no = 1;?>
                            <?php if(isset($_SESSION['stu_dep'])) : ?> 
                            <?php foreach($viewmodel as $stupexam) : ?>
                            <?php $total =  $stupexam['qu1'] + $stupexam['as1'] + $stupexam['ex1'] + $stupexam['qu2'] + $stupexam['as2'] + $stupexam['ex2'] + $stupexam['att'] ;?>
                            <?php $exSatuse = ($total < 50) ? 'class ="alert alert-danger  "': '' ;?>   
                                <tr <?php echo $exSatuse ;?>>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['stu_num'];?>" type="numbar" name="stu_num"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['qu1'];?>" type="numbar" name="qu1"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['as1'];?>" type="numbar" name="as1"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['ex1'];?>" type="numbar" name="ex1"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['qu2'];?>" type="numbar" name="qu2"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['as2'];?>" type="numbar" name="as2"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['ex2'];?>" type="numbar" name="ex2"></td>
                                    <td class="p-0 text-center" > <input class="form-control rounded-0 " value="<?php echo $stupexam['att'];?>" type="numbar" name="att"></td>
                                </tr>

                            <?php endforeach;?>

                            <?php endif;?>
                            
<div class="alert alert-info float-left text-dark rounded-0 py-1 ml-1"> <?php if($no > 1) echo 'عدد الطلبة هو: ' . ($no -1);?> </div>
                            </tbody>
            </table>

            
     </div>
     </form>  
 </div>
   

</div>

 