<?php 
require getcwd() . '/lib/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Helper\Sample;
class SubjectModel extends Model
{
    public  $rowss;
    public function Index()
    {

        $this->query('SELECT * FROM subject');
        $rows = $this->resultSet();
        return  json_encode($rows);
    }


    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['edit_submit'])) {
            if ($post['subject_name_edit'] == '' || empty($post['subject_name_edit']) || is_null($post['subject_name_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($post['subject_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } else {
                $this->query('UPDATE subject SET  subject_name= :subject_name_edit,subject_code= :subject_code_edit,prog_id=:prog_id,active= :active_edit WHERE sub_id=:id');
                $this->bind(':subject_name_edit',  $post['subject_name_edit']);
                $this->bind(':subject_code_edit',  $post['subject_code_edit']);
                $this->bind(':prog_id',  $post['prog_id']);
                $this->bind(':active_edit',  $post['selected_value']);
                $this->bind(':id',  $_GET['id']);
                $do_edit = $this->execute();
                $_SESSION['msg'] =  SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/subject');
                // header( "refresh:1;url=".path  );
            }
        }
        $this->query('SELECT * FROM subject WHERE sub_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }


    public function add()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            if ($post['subject_name'] == '') {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($post['subject_name'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } else {
                $this->query('INSERT INTO subject( subject_name , subject_code , prog_id, active) VALUES (:subject_name,:subject_code,:prog_id,:active)');
                $this->bind(':subject_name', $post['subject_name']);
                $this->bind(':subject_code', $post['subject_code']);
                $this->bind(':prog_id', $_POST['prog_id']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] =   SUCCESS;
                    //header ('refresh:1;url=' . ROOT_URL .'/subject');
                }
            }
        }
    }


    public function search()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            $this->query('SELECT * FROM subject WHERE subject_name = :subject_name');
            $this->bind(':subject_name',  'dfsv');
            $this->single();
            $rec = $this->resultSet();
            return $rec;
        }
    }

    public function delete()
    {
        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM subject WHERE sub_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            header('refresh:1;url=' . ROOT_URL . '/subject');
        }
        $this->query('SELECT * FROM subject WHERE sub_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }


    public function subjectlevel()
    {
    }


    public function ordersubByfacl()
    {
        if (isset($_POST['seledulev_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/subject/ordersubByfacl?edulev_id=" . $_POST['edulev_id']);
        }
        if (isset($_POST['pro_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/subject/ordersubByfacl?edulev_id=" . $_GET['edulev_id'] . "&pro_id=" . $_POST['pro_id']);
        }

        if (isset($_GET['pro_id'])) {
            $this->query('SELECT * FROM subject WHERE prog_id=:prog_id');
            $this->bind(":prog_id", $_GET['pro_id']);
            $rows = $this->resultSet();
            return  json_encode($rows);
        }
    }


    public function ordersubByfaclprint()
    {
        if (isset($_GET['pro_id']) && isset($_GET['edulev_id'])) {
            $this->query('SELECT * FROM subject WHERE prog_id=:prog_id');
            $this->bind(":prog_id", $_GET['pro_id']);
            $rows = $this->resultSet();
            return  json_encode($rows);
        }
    }

    public function uploadsujectlist()
    {
        if (isset($_POST['FileUp'])) {
            $op = new Khas();
            $op->uploadFiles($_FILES['uploadFile'], "xlsx", 2000000);
            $inputType = "Xlsx";
            $f_upload_dir =   getcwd() . "/uplouds/";
            $inputFileNmae =   $f_upload_dir."/".$_FILES['uploadFile']['name'];
            $reader = IOFactory::createReader($inputType);
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($inputFileNmae);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            foreach($sheetData as $row){
                $subject_name = isset($row[0]) ? $row[0] : "";
                $subject_code = isset($row[1]) ? $row[1] : "";
                $this->query('INSERT INTO subject(subject_name,subject_code,prog_id, active) VALUES (:subject_name,:subject_code,:prog_id,:active)');
                $this->bind(':subject_name' , $subject_name);
                $this->bind(':subject_code' , $subject_code);
                $this->bind(':prog_id' , $_GET['pro_id']);            
                $this->bind(':active', 1);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] =   SUCCESS;
                }
            }


            if($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
                unlink($f_upload_dir . $_FILES['uploadFile']['name']);
            }
        }
    }
}
