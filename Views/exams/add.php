<?php include('getdepartment.php');?>

<div class="container mt-5">
    
     
    <div class="card  ">
        <div class="card-header  text-dark font-weight-bold text-center p-1"> إدخال درجات اختبار لطالب </div>
        <div class="card-body">

            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >
                <div class="container text-left">
                    <input type="submit" name="add_stu"  value="تسجيل درجات طالب" id="submit" class="btn bg-danger   rounded-0 text-white    mb-3  py-2 px-3" name="add_student" > 
                </div>
                            <table class="table table-bordered spacial-tbl">
                                <tbody>
                                    <tr>
                                          <td>  الرقم الجامع</td> 
                                          <td>    المستوى</td> 
                                          <td>     القسم</td> 
                                          <td>     الفترة</td> 
                                          <td>    المجموع</td> 
                                          <td>    المادة</td> 
                                          <td>    كود المادة</td> 
                                          <td>    عدد الساعات</td> 
                                    </tr>
                                    <tr>
                                            <td>
                                                <div class="form-group">
                                                        <select  name="department" id="" class="form-control input-sm p-1  rounded-0">
                                                            <?php get_students_number(); ?>
                                                        </select>  
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                
                                                        <select class="form-control input-sm p-1  rounded-0" >
                                                            <?php get_level(); ?>
                                                        </select>  
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <select  name="department" id="" class="form-control input-sm p-1  rounded-0">
                                                       <?php get_section(); ?>
                                                    </select>                                                  </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                <select  name="department" id="" class="form-control input-sm p-1  rounded-0">
                                                    <?php get_department(); ?>
                                                </select>  
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                <select  name="department" id="" class="form-control input-sm p-1  rounded-0">
                                                    <?php get_group(); ?>
                                                </select>  
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                <select  name="department" id="" class="form-control input-sm p-1  rounded-0">
                                                    <?php get_subject(); ?>
                                                </select>  
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered spacial-tbl">
                                <tbody>    
                                    <tr>
                                            <td class="spc-td"  colspan="3">الفترة الأولى</td> 
                                            <td class="spc-td"  colspan="3">الفترة الثانية</td> 
                                            <td class="spc-td"  rowspan="2">الحضور</td> 
                                            <td class="spc-td"  rowspan="2">المجموع</td> 
                                    </tr>
                                    <tr>
                                         <td class="spc-td" >   أسئلة</td> 
                                         <td class="spc-td" > بحث</td> 
                                         <td class="spc-td" > اختبار</td> 
                                         <td class="spc-td" > أسئلة</td> 
                                         <td class="spc-td" > بحث</td> 
                                         <td class="spc-td" > اختبار</td> 
                                    </tr>
                                    <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="" required id="" class="form-control p-1 rounded-0">
                                                </div>
                                            </td> 
                                    </tr>
                                </tbody>
                            </table>

               </form>
        </div>
    </div>
    
  
</div>