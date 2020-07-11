
<?php

require getcwd() . '/lib/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Helper\Sample;

class StudentModel extends Model
{

    public  $rowss;
    public function stulistupload()
    {
        if (isset($_POST['upFile'])) {
            $h = new Sample();
            $inputType = "Xlsx";
            $f_tmp = $_FILES['fileUploads']['tmp_name'];
            $f_upload_dir =   getcwd() . "/uplouds/";
            if (move_uploaded_file($f_tmp, $f_upload_dir . $_FILES['fileUploads']['name'])) {
                            $inputFileNmae =   $f_upload_dir."/".$_FILES['fileUploads']['name'];
                            $reader = IOFactory::createReader($inputType);
                            $reader->setReadDataOnly(true);
                            $spreadsheet = $reader->load($inputFileNmae);
                            $sheetData = $spreadsheet->getActiveSheet()->toArray();
                            

                            foreach($sheetData as $row){
                                $StuName = isset($row[0]) ? $row[0] : "";
                                $stu_num = isset($row[1]) ? $row[1] : "";
                                $this->query("INSERT INTO stu_info(StuName, stu_num,   gender) 
                                        VALUES (:StuName, :stu_num,   :gender)");
                                $this->bind(":StuName" , $StuName );
                                $this->bind(":stu_num" , $stu_num );
                                $this->bind(":gender" , $_POST['sec_id'] );
                                $this->execute();
                                $stu_id = $this->lastInsertId();
                                $this->query("INSERT INTO stu_acadimi(stu_id, prog_id, lev_id, grp_id, dep_id, sec_id,  Prog_Discount, statues)
                                                VALUES (:stu_id, :prog_id, :lev_id, :grp_id, :dep_id, :sec_id,  :Prog_Discount, :statues)");
                                                $this->bind(":stu_id" , $stu_id);
                                                $this->bind(":prog_id" , $_POST['prog_id']);
                                                $this->bind(":lev_id" , $_POST['lev_id']);
                                                $this->bind(":grp_id" , $_POST['grp_id']);
                                                $this->bind(":dep_id" , $_POST['dep_id']);
                                                $this->bind(":sec_id" , $_POST['sec_id']);
                                                $this->bind(":Prog_Discount" , 0);
                                                $this->bind(":statues" , "مستمر");
                                                $this->execute();
                            }


                            if($this->lastInsertId()) {
                                $_SESSION['msg'] = SUCCESS;
                                unlink($f_upload_dir . $_FILES['fileUploads']['name']);
                            }
            }
            
        }
    }
    public function Index()
    {
    }

    public function info()
    {

        if(isset($_POST['multChange'])){
            if(isset($_POST['chk'])){
                $changeChks = $_REQUEST['chk'];
            $changeChkDatas = implode("," , $changeChks);
            $gender = $_POST['changeto'];
            //$this->query("DELETE FROM empinfo WHERE emp_id in($a)");
            $this->query("UPDATE stu_info SET gender=$gender   WHERE stu_id IN ($changeChkDatas)");
            $this->execute();
            }
              
        }


        if(isset($_POST['multiDel'])){
            if(isset($_POST['chk'])){
            $changeChks = $_REQUEST['chk'];
            $changeChkData = implode(", " , $changeChks);
            $this->query("DELETE FROM  stu_info  WHERE stu_id IN ($changeChkData)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;                
            }
        }


        $this->query('SELECT * FROM stu_info');
        $rows = $this->resultSet();
        return $rows;

        
 
    }



    /**
     * here we can delete multi students one time 
     */

    public function multidel(){
        $changeChk = $_GET['multidelId'];
        $changeChkData = explode(", " , $changeChk);
        if(isset($_POST['delete_items']) ){ 
         
                $this->query("DELETE FROM stu_info   WHERE stu_id IN ($changeChkData)");
 
                $this->execute();
             
            $_SESSION['msg'] = SUCCESS;                
            header('Location: ' . ROOT_URL . '/student/info');      
         }
    }


    public function update()
    {
        if (isset($_POST['Update_Stu_Info'])) {
            $this->query("UPDATE stu_info SET StuName=:StuName,stu_num=:stu_num,mothername=:mothername,gender=:gender,reg_date=:reg_date,DOB=:DOB,POB=:POB,Natinality=:Natinality,StuAddress=:StuAddress,city=:city,contry=:contry,Phones=:Phones,stu_pic=:stu_pic WHERE  stu_id=:id");
            $this->bind(':StuName', $_POST['StuName']);
            $this->bind(':stu_num', $_POST['stu_num']);
            $this->bind(':mothername', $_POST['mothername']);
            $this->bind(':gender', $_POST['gender']);
            $this->bind(':reg_date', $_POST['reg_date']);
            $this->bind(':DOB', $_POST['DOB']);
            $this->bind(':POB', $_POST['POB']);
            $this->bind(':Natinality', $_POST['Natinality']);
            $this->bind(':StuAddress', $_POST['StuAddress']);
            $this->bind(':city', $_POST['city']);
            $this->bind(':contry', $_POST['contry']);
            $this->bind(':Phones', $_POST['Phones']);
            $this->bind(':stu_pic', $_POST['stu_pic']);
            $this->bind(":id", $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM stu_info WHERE stu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $stu_info_select = $this->resultSet();
        return $stu_info_select;
    }


    public function stuinfoprint()
    {

        $this->query('SELECT * FROM stu_info WHERE stu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $stu_info_select = $this->resultSet();
        return json_encode($stu_info_select);
    }


    public function studentinfoprint()
    {
        $this->query('SELECT * FROM stu_info WHERE stu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $stu_info_select = $this->resultSet();
        return $stu_info_select;
    }
    public function delete()
    {
        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM stu_info WHERE stu_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            header('Location: ' . ROOT_URL . '/student/info');
        }
        $this->query('SELECT * FROM stu_info WHERE stu_id=:id');;
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }

    public function studentfullreg()
    {
        //$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_SESSION['StuNum'])) {
            $this->query('INSERT INTO stu_info( StuNum, StuName, mothername,reg_date, gender, DOB, POB, Natinality, StuAddress, city, contry, Phones,stu_pic)              
                                      VALUES (:StuNum,:StuName,:mothername,:reg_date,:gender,:DOB,:POB,:Natinality,:StuAddress,:city,:contry,:Phones,:stu_pic)');
            $this->bind(':StuNum', $_POST['StuNum']);
            $this->bind(':StuName', $_POST['StuName']);
            $this->bind(':mothername', $_POST['mothername']);
            $this->bind(':reg_date', $_POST['reg_date']);
            $this->bind(':gender', $_POST['gender']);
            $this->bind(':DOB', $_POST['DOB']);
            $this->bind(':POB', $_POST['POB']);
            $this->bind(':Natinality', $_POST['Natinality']);
            $this->bind(':StuAddress', $_POST['StuAddress']);
            $this->bind(':city', $_POST['city']);
            $this->bind(':contry', $_POST['contry']);
            $this->bind(':Phones', $_POST['Phones']);
            $this->bind(':stu_pic', $_POST['stu_pic']);
            $this->execute();
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
                //header('Refresh: 0.5; ' . ROOT_URL . '/student/StudentShow/' . $_SESSION['StuNum']);
            }
        }
    }


    public function register()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['add_stu'])) {
            $this->query('INSERT INTO stu_info(StuName, stu_num, mothername, gender,reg_date, DOB, POB, Natinality, StuAddress, city, contry, Phones,stu_pic)              
                                      VALUES (:StuName,:stu_num , :mothername,:gender,:reg_date,:DOB,:POB,:Natinality,:StuAddress,:city,:contry,:Phones,:stu_pic)');
            $this->bind(':StuName', $_POST['StuName']);
            $this->bind(':stu_num', $_POST['stu_num']);
            $this->bind(':mothername', $_POST['mothername']);
            $this->bind(':gender', $_POST['gender']);
            $this->bind(':reg_date', $_POST['reg_date']);
            $this->bind(':DOB', $_POST['DOB']);
            $this->bind(':POB', $_POST['POB']);
            $this->bind(':Natinality', $_POST['Natinality']);
            $this->bind(':StuAddress', $_POST['StuAddress']);
            $this->bind(':city', $_POST['city']);
            $this->bind(':contry', $_POST['contry']);
            $this->bind(':Phones', $_POST['Phones']);
            $this->bind(':stu_pic', $_POST['stu_pic']);
            $this->execute();
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
                header('Refresh: 0.5; ' . ROOT_URL . '/student/update/'.$this->lastInsertId());
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
    }
    public function  Studentrel()
    {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $id = $_GET['id'];



        if (isset($_POST['add_rel'])) {
            if ($id != "") {
                if (!empty($post['rel_name']) || !empty($post['rel_type']) || !empty($post['rel_digree']) || !empty($post['rel_Address']) || !empty($post['rel_phones'])) {

                    $this->query("INSERT INTO strurel(stu_id, rel_name, rel_type, rel_lev, rel_Address, rel_email, rel_phones) VALUES (:stu_id, :rel_name, :rel_type, :rel_digree, :rel_Address, :rel_email, :relphones)");
                    $this->bind(":stu_id", $id);
                    $this->bind(":rel_name", $post["rel_name"]);
                    $this->bind(":rel_type", $post["rel_type"]);
                    $this->bind(":rel_digree", $post["rel_digree"]);
                    $this->bind(":rel_Address", $post["rel_Address"]);
                    $this->bind(":rel_email", $post["rel_email"]);
                    $this->bind(":relphones", $post["rel_phones"]);
                    $this->execute();
                    if ($this->lastInsertId()) {
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = ERR_EMPTY;
                    }
                } else {
                    $_SESSION['msg'] = ERR_EMPTY;
                }
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function  Studentacademic()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        if (isset($_POST['add_quali'])) {
            $equ_date = date("Y-m-d");
            $this->query('INSERT INTO edu_quali(Edu_quali, Edu_year, Edu_lang, Edu_Issuer, Stu_id) VALUES (:Edu_quali, :Edu_year, :Edu_lang, :Edu_Issuer, :Stu_id)');
            $this->bind(":Edu_quali", $post['Edu_quali']);
            $this->bind(":Edu_year", $post['Edu_year']);
            $this->bind(":Edu_lang", $post['Edu_lang']);
            $this->bind(":Edu_Issuer",  $post['Edu_Issuer']);
            $this->bind(":Stu_id", $_GET['id']);
            $this->execute();
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
            }
        }
    }
    public function getdepartment()
    {
    }

    public function StudentShow()
    {
        $this->query('SELECT * FROM stu_info WHERE StuNum=:id');
        $this->bind(':id',  $_GET['id']);
        $stu_info_select = $this->resultSet();
        return $stu_info_select;
    }
    public function StudenacctShow()
    {
        $this->query('SELECT * FROM stu_acadimic WHERE stu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $stu_info_select = $this->resultSet();
        return $stu_info_select;
    }


    public function Studinfo()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['add'])) {
            // $this->query('INSERT INTO stu_stud_info(StuNum, Section, StuLevel, Stugroup, Stutype, Studepartment, Stustatus)              
            //                     VALUES (:StuNum,:Section,:StuLevel,:Stugroup,:Stutype,:Studepartment,:Stustatus)');

            $_SESSION['Section']        = $post['Section'];
            $_SESSION['StuLevel']       = $post['StuLevel'];
            $_SESSION['Stugroup']       = $post['Stugroup'];
            $_SESSION['Stutype']        = $post['Stutype'];
            $_SESSION['Studepartment']  = $post['Studepartment'];
            $_SESSION['Stustatus']      = $post['Stustatus'];
            header('Refresh: 0.5; ' . ROOT_URL . '/student/studentfullreg');
        }
    }


    public function uploadfile()
    {

        if (isset($_POST['uploads'])) {

            $files = $_FILES['fileToUpload'];
            $f_name    = $files['name'];
            $f_tmp     = $files['tmp_name'];
            $f_size    = $files['size'];
            $f_error   = $files['error'];
            $f_exe     = explode('.', $f_name);
            $f_exe     = strtolower(end($f_exe));
            $f_allow   = array('jpg');
            if (in_array($f_exe, $f_allow)) {
                if ($f_error === 0) {
                    if ($f_size < 2000000) {
                        $f_upload_dir = $_SERVER["DOCUMENT_ROOT"] . "/mini/uplouds/";
                        $f_origenal_tmp = "";

                        if (move_uploaded_file($f_tmp, $f_upload_dir . $files['name'])) {
                            $_SESSION['msg'] = SUCCESS;
                            $_SESSION['hidden_fileds'] = $f_name;
                        }
                    } else {
                        $_SESSION['msg']  = FILE_SIZE_ERR;
                    }
                } else {
                    echo "هناك علة ما ";
                }
            } else {
                $_SESSION['msg']  = FILE_TYPE_ERR;
            }
        }
    }

    public function doupload()
    {
    }





    public function addsturel()
    {

        $id = $_GET['id'];

        $this->query("SELECT  * FROM  WHERE stu_id=:id");
        $this->bind(":id", $id);
        if ($this->rowCount() >  0) {
            $_SESSION['msg'] =  SELECT_ID;
        }
    }

    public function Studentrelinfo()
    {
        $id = intval($_GET['id']);

        $this->query('SELECT * FROM strurel WHERE stu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $row = $this->resultSet();
        if ($this->rowCount() > 0) :
            return $row;
        else :
            $t  = Data_Not_Founded;
        endif;
    }


    public function Studentreldel()
    {
        if (isset($_POST['delete_items'])) :
            $_SESSION['stu_id'] = $_POST['stu_id'];
            $this->query('DELETE FROM  strurel  WHERE Rel_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;

            header('Refresh: 0.25;' . ROOT_URL . '/student/update/' . $_SESSION['stu_id']);
        endif;
        $this->query('SELECT * FROM strurel WHERE Rel_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rows = $this->resultSet();
        return $rows;
    }


    public function Studentrelupdate()
    {
        $this->query('SELECT * FROM strurel WHERE Rel_id=:id');
        $this->bind(':id',  $_GET['id']);
        $stu_info_select = $this->resultSet();
        if ($this->rowCount() >= 1) {
            return $stu_info_select;
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
            return $_GET['id'];
        }
    }

    public function Studentacademicinfo()
    {
        $id = intval($_GET['id']);

        $this->query('SELECT * FROM edu_quali WHERE stu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $row = $this->resultSet();
        if ($this->rowCount() > 0) :
            return $row;
        else :
            $t  = Data_Not_Founded;
        endif;
    }


    public function Studentacademicdel()
    {
        if (isset($_POST['delete_items'])) :

            $this->query('DELETE FROM  edu_quali  WHERE Edu_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0.25;' . ROOT_URL . '/student/update/' . $_GET['stu_id']);
        endif;
        $this->query('SELECT * FROM edu_quali WHERE Edu_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rows = $this->resultSet();
        return $rows;
    }


    public function Studentacademicupdate()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['update_quali'])) {
            $this->query("UPDATE edu_quali SET Edu_quali=:Edu_quali,Edu_year=:Edu_year,Edu_lang=:Edu_lang,Edu_Issuer=:Edu_Issuer WHERE Edu_id=:Edu_id");
            $this->bind(':Edu_quali',  $post['Edu_quali']);
            $this->bind(':Edu_year',  $post['Edu_year']);
            $this->bind(':Edu_lang',  $post['Edu_lang']);
            $this->bind(':Edu_Issuer',  $post['Edu_Issuer']);
            $this->bind(':Edu_id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $id = intval($_GET['id']);
        $this->query('SELECT * FROM edu_quali WHERE Edu_id=:id');
        $this->bind(':id',  $id);
        $row = $this->resultSet();
        return $row;
    }


    public function StudentacademicPro()
    {
        if ($_GET['id']) {
            echo $_GET['id'];
        }
    }

    public function StudentacademicProdel()
    {
        if(isset($_POST['delete_items'])){
            $this->query("DELETE  FROM stu_acadimi  WHERE stu_ac_pro =:id");
            $this->bind(':id',  $_GET['pro_id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=".ROOT_URL."/student/update/" . $_GET['stu_id']);
        }
        if (isset($_GET['pro_id']) && isset($_GET['stu_id']) ) {
            $id = $_GET['pro_id'];
            $this->query("SELECT * FROM  stu_acadimi  WHERE stu_ac_pro =:id");
            $this->bind(':id',  $id);
            $row = $this->resultSet();
            return $row;
        }
    }


    public function StudentacademicProadd()
    {

        $id = $_GET['id'];
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['add_stu_prog'])) :
            $reg_date = date('Y-m-d', strtotime($_POST["reg_date"]));
            $this->query("INSERT INTO stu_acadimi(stu_id, prog_id, lev_id, grp_id,dep_id,sec_id, reg_date, Prog_Discount, statues) VALUES (:stu_id,  :prog_id, :lev_id, :grp_id,:dep_id,:sec_id,  :reg_date, :Prog_Discount, :statues)");
            $this->bind(":stu_id", $id);
            $this->bind(":prog_id", $_POST["prog_id"]);
            $this->bind(":lev_id", $_POST["lev_id"]);
            $this->bind(":grp_id", $_POST["grp_id"]);
            $this->bind(":dep_id", $_POST["dep_id"]);
            $this->bind(":sec_id", $_POST["sec_id"]);
            $this->bind(":reg_date", $reg_date);
            $this->bind(":Prog_Discount", $_POST["Prog_Discount"]);
            $this->bind(":statues", $_POST["statues"]);
            $this->execute();
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
            } else {
                $_SESSION['msg'] =  $this->getCode();
            }

        endif;
    }


    public function StudentacademicProupdate()
    {
        $id = $_GET['id'];
        if (isset($_POST['update_stu_prog'])) {
            if ($_POST["UpDate_Prog_Discount"] < 0) {
                $_SESSION['msg'] = NO_ALLOW_UNDER_ZERO;
            } else {
                $reg_date = date('Y-m-d', strtotime($_POST["UpDate_reg_date"]));
                $this->query("UPDATE stu_acadimi SET   prog_id=:prog_id , lev_id=:lev_id, grp_id=:grp_id ,dep_id=:dep_id,sec_id=:sec_id,  reg_date=:reg_date, Prog_Discount=:Prog_Discount ,statues=:statues WHERE stu_ac_pro=:id");
                $this->bind(":prog_id", $_POST["UpDate_prog_id"]);
                $this->bind(":lev_id", $_POST["UpDate_lev_id"]);
                $this->bind(":grp_id", $_POST["UpDate_grp_id"]);
                $this->bind(":dep_id", $_POST["UpDate_dep_id"]);
                $this->bind(":sec_id", $_POST["UpDate_sec_id"]);
                $this->bind(":reg_date", $reg_date);
                $this->bind(":Prog_Discount", $_POST["UpDate_Prog_Discount"]);
                $this->bind(":statues", $_POST["UpDate_statues"]);
                $this->bind(":id", $id);
                $do_update = $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query("SELECT * FROM  stu_acadimi  WHERE stu_ac_pro =:id");
        $this->bind(':id',  $id);
        $row = $this->resultSet();
        return $row;
    }

    public function stuinfolist()
    {
        if (isset($_POST['showData'])) {
            header("refresh:0;url=" . ROOT_URL . "/student/stuinfolist/?prog=" . $_POST['prog_id'] . "&dep=" . $_POST['dep_id'] . "&sec=" . $_POST['sec_id'] . "&lev=" . $_POST['lev_id'] . "&grp=" . $_POST['grp_id']);
        }
        if (isset($_GET['prog']) && isset($_GET['grp']) && isset($_GET['dep']) && isset($_GET['sec']) && isset($_GET['lev'])) {
            $this->query("SELECT stu_info.StuName AS StuName, stu_info.stu_num AS stu_num, stu_info.Phones AS Phones, stu_info.stu_id AS stu_id, 
            stu_acadimi.reg_date AS reg_date, stu_acadimi.statues AS statues, stu_acadimi.prog_id AS prog_id, stu_acadimi.grp_id AS grp_id, stu_acadimi.dep_id AS dep_id,
             stu_acadimi.sec_id AS sec_id, stu_info.gender AS gender, stu_acadimi.lev_id AS lev_id FROM stu_info INNER JOIN stu_acadimi ON stu_info.stu_id = stu_acadimi.stu_id
              GROUP BY stu_info.StuName, stu_info.stu_num, stu_info.Phones, stu_info.stu_id, stu_acadimi.reg_date, stu_acadimi.statues, stu_acadimi.prog_id, 
              stu_acadimi.grp_id, stu_acadimi.dep_id, stu_acadimi.sec_id, stu_info.gender, stu_acadimi.lev_id HAVING (((stu_acadimi.prog_id)=:prog_id) AND ((stu_acadimi.grp_id)=:grp_id) 
              AND ((stu_acadimi.dep_id)=:dep_id) AND ((stu_acadimi.sec_id)=:sec_id) AND ((stu_acadimi.lev_id)=:lev_id))");
            $this->bind(":prog_id", $_GET['prog']);
            $this->bind(":grp_id", $_GET['grp']);
            $this->bind(":dep_id", $_GET['dep']);
            $this->bind(":sec_id", $_GET['sec']);
            $this->bind(":lev_id", $_GET['lev']);
            $row = $this->resultSet();
            if ($row) {
                return json_encode($this->resultSet());
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }

    public function stuinfolistprint()
    {

        if (isset($_GET['prog']) && isset($_GET['grp']) && isset($_GET['dep']) && isset($_GET['sec']) && isset($_GET['lev'])) {
            $this->query("SELECT stu_info.StuName AS StuName, stu_info.stu_num AS stu_num, stu_info.Phones AS Phones, stu_info.stu_id AS stu_id, 
            stu_acadimi.reg_date AS reg_date, stu_acadimi.statues AS statues, stu_acadimi.prog_id AS prog_id, stu_acadimi.grp_id AS grp_id, stu_acadimi.dep_id AS dep_id,
             stu_acadimi.sec_id AS sec_id, stu_info.gender AS gender, stu_acadimi.lev_id AS lev_id FROM stu_info INNER JOIN stu_acadimi ON stu_info.stu_id = stu_acadimi.stu_id
              GROUP BY stu_info.StuName, stu_info.stu_num, stu_info.Phones, stu_info.stu_id, stu_acadimi.reg_date, stu_acadimi.statues, stu_acadimi.prog_id, 
              stu_acadimi.grp_id, stu_acadimi.dep_id, stu_acadimi.sec_id, stu_info.gender, stu_acadimi.lev_id HAVING (((stu_acadimi.prog_id)=:prog_id) AND ((stu_acadimi.grp_id)=:grp_id) 
              AND ((stu_acadimi.dep_id)=:dep_id) AND ((stu_acadimi.sec_id)=:sec_id) AND ((stu_acadimi.lev_id)=:lev_id))");
            $this->bind(":prog_id", $_GET['prog']);
            $this->bind(":grp_id", $_GET['grp']);
            $this->bind(":dep_id", $_GET['dep']);
            $this->bind(":sec_id", $_GET['sec']);
            $this->bind(":lev_id", $_GET['lev']);
            $row = $this->resultSet();
            if ($row) {
                return json_encode($this->resultSet());
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }


    public function upgradecls()
    {
        $op = new Khas();
        if (isset($_POST['setData'])) {
            header("refresh:0;url=" . ROOT_URL . "/student/upgradecls?ids=" . $_POST['FullPro']);
            //."&dep_id=".$_POST['dep_id']     ."&sec_id=".$_POST['']."&grp_id=".$_POST['']."&lev_id=".$_POST['']);
        }

        if (isset($_GET['ids']) && intval($_GET['ids']) != "") {
            if (isset($_POST['getData'])) {
                header("refresh:0;url=" . ROOT_URL . "/student/upgradecls?ids=" . $_GET['ids'] . "&dep_id=" . $_POST['dep_id']
                    . "&sec_id=" . $_POST['sec_id'] . "&grp_id=" . $_POST['grp_id'] . "&lev_id=" . $_POST['lev_id']);
            }


            if ($op->cheIdsdata()) {
                $this->query("SELECT * FROM stu_acadimi WHERE prog_id=:prog_id AND lev_id=:lev_id AND grp_id=:grp_id AND dep_id=:dep_id 
                 AND sec_id=:sec_id AND statues=:statues");
                $this->bind(":prog_id", $_GET['ids']);
                $this->bind(":lev_id", $_GET['lev_id']);
                $this->bind(":grp_id", $_GET['grp_id']);
                $this->bind(":dep_id", $_GET['dep_id']);
                $this->bind(":sec_id", $_GET['sec_id']);
                $this->bind("statues", "مستمر");
                $info = $this->resultSet();
                if ($info) {
                    if (isset($_POST['setGetata'])) {
                        $this->query("UPDATE stu_acadimi SET lev_id=:neWlev_id,grp_id=:neWgrp_id, dep_id=:neWdep_id,sec_id=:neWsec_id
                        WHERE prog_id=:prog_id AND lev_id=:lev_id AND grp_id=:grp_id AND dep_id=:dep_id 
                        AND sec_id=:sec_id AND statues=:statues ");
                        $this->bind(":neWlev_id", $_POST['neWlev_id']);
                        $this->bind(":neWgrp_id", $_POST['neWgrp_id']);
                        $this->bind(":neWdep_id", $_POST['neWdep_id']);
                        $this->bind(":neWsec_id", $_POST['neWsec_id']);
                        $this->bind(":prog_id", $_GET['ids']);
                        $this->bind(":lev_id", $_GET['lev_id']);
                        $this->bind(":grp_id", $_GET['grp_id']);
                        $this->bind(":dep_id", $_GET['dep_id']);
                        $this->bind(":sec_id", $_GET['sec_id']);
                        $this->bind("statues", "مستمر");
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                        header("refresh:0;url=" . ROOT_URL . "/student/upgradecls?ids=" . $_GET['ids'] . "&dep_id=" . $_GET['dep_id']
                            . "&sec_id=" . $_GET['sec_id'] . "&grp_id=" . $_GET['grp_id'] . "&lev_id=" . $_GET['lev_id']);
                    }
                }
            }
        }
    }

        /**
     * here we can search class info 
     */

    public function searchstuinfo(){
        $op = new Khas();
        if (isset($_POST['getData'])) {
            header("refresh:0;url=" . ROOT_URL . "/student/searchstuinfo?ids=" . $_POST['FullPro']."&dep_id=".$_POST['dep_id']     ."&sec_id=".$_POST['sec_id']."&lev_id=".$_POST['lev_id']."&grp_id=".$_POST['grp_id'] );
        }
         

            if ($op->cheIdsdata()) {
                if(isset($_POST['delData'])):
                $this->query("DELETE stu_info.* FROM stu_info
                INNER JOIN 
                stu_acadimi ON stu_info.stu_id = stu_acadimi.stu_id
                WHERE (((stu_acadimi.prog_id)=:prog_id) AND ((stu_acadimi.lev_id)=:lev_id) AND ((stu_acadimi.grp_id)=:grp_id) AND ((stu_acadimi.dep_id)=:dep_id) AND ((stu_acadimi.sec_id)=:sec_id)) ");
                $this->bind(":prog_id", $_GET['ids']);
                $this->bind(":lev_id", $_GET['lev_id']);
                $this->bind(":grp_id", $_GET['grp_id']);
                $this->bind(":dep_id", $_GET['dep_id']);
                $this->bind(":sec_id", $_GET['sec_id']);
                $this->execute();

                $this->query("DELETE   FROM stu_acadimi   WHERE  prog_id =:prog_id  AND   lev_id =:lev_id  AND   grp_id =:grp_id  AND   dep_id =:dep_id  AND   sec_id =:sec_id ");
                $this->bind(":prog_id", $_GET['ids']);
                $this->bind(":lev_id", $_GET['lev_id']);
                $this->bind(":grp_id", $_GET['grp_id']);
                $this->bind(":dep_id", $_GET['dep_id']);
                $this->bind(":sec_id", $_GET['sec_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;

                endif;
            

            $this->query("SELECT stu_info.StuName AS StuName,  stu_info.stu_num AS stu_num, stu_info.stu_id AS stu_id, stu_info.gender AS gender,  
            stu_info.DOB AS DOB ,stu_info.POB AS POB ,stu_info.Natinality AS Natinality ,stu_info.StuAddress AS StuAddress ,stu_info.reg_date AS reg_date ,
            stu_acadimi.Prog_Discount AS Prog_Discount, 
            stu_acadimi.prog_id AS prog_id, stu_acadimi.lev_id AS lev_id, stu_acadimi.grp_id AS grp_id, 
            stu_acadimi.dep_id AS dep_id, stu_acadimi.sec_id AS sec_id, stu_acadimi.statues AS statues       FROM stu_acadimi INNER JOIN stu_info ON stu_acadimi.stu_id = stu_info.stu_id 
            WHERE (((stu_acadimi.prog_id)=:prog_id) AND ((stu_acadimi.lev_id)=:lev_id) AND ((stu_acadimi.grp_id)=:grp_id) AND ((stu_acadimi.dep_id)=:dep_id) AND ((stu_acadimi.sec_id)=:sec_id))");
            $this->bind(":prog_id", $_GET['ids']);
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $row = $this->resultSet();
            if ($row) {
               return $this->resultSet();     
            }

        }
        

    }
}

function show_images()
{
    $dir = 'uplouds/*.jpg';

    $get_img = glob($dir);
    $i = 1;
    foreach ($get_img as $show_img) {

        $image_name = str_replace("uplouds/", "", $show_img);

        $print_imgs =   "<img src='" . ROOT_URL . "/" . $show_img . "' alt='" . $show_img . "' title='" . $image_name . "' style='width:100px; height:100px; margin:2px;' id='" . $image_name . "' class='border border-primary' onclick='reply_click(this.id)' />";
        echo  $print_imgs;
    }
}
