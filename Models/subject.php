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
            $files = $_FILES['uploadFile'];
            $f_name    = $files['name'];
            $f_tmp     = $files['tmp_name'];
            $f_size    = $files['size'];
            $f_error   = $files['error'];
            $file_type = pathinfo($f_name, PATHINFO_EXTENSION);
    
            if ( $file_type == "xlsx"  ) {
                if ($f_error === 0) {
                    if ($f_size < 2000000) {
                        $f_upload_dir =   getcwd() . "/uplouds/";
                        $inputFileNmae =   $f_upload_dir . $op->random_string(20) . "." . $file_type;
                        if (move_uploaded_file($f_tmp, $inputFileNmae  )) {
                            $inputType = "Xlsx";
                            $reader = IOFactory::createReader($inputType);
                            $reader->setReadDataOnly(true);
                            $spreadsheet = $reader->load($inputFileNmae);
                            $sheetData = $spreadsheet->getActiveSheet()->toArray();
                            $x = 1;
                            foreach ($sheetData as $row) {
                                if ($x != 1) :
                                    $subject_name =  $row[1];
                                    $subject_code =  $row[2];
                                    if ($subject_name == "") continue;
                                    $this->query('INSERT INTO subject(subject_name,subject_code,prog_id, active) VALUES (:subject_name,:subject_code,:prog_id,:active)');
                                    $this->bind(':subject_name', $subject_name);
                                    $this->bind(':subject_code', $subject_code);
                                    $this->bind(':prog_id', $_GET['pro_id']);
                                    $this->bind(':active', 1);
                                    $this->execute();
                                    if ($this->lastInsertId()) {
                                        $_SESSION['msg'] =   SUCCESS;
                                    }
                                endif;
                                $x++;
                            }


                            if ($this->lastInsertId()) {
                                $_SESSION['msg'] = SUCCESS;
                                unlink($inputFileNmae);
                            }
                        }
                    } else {
                        $_SESSION['msg']  = FILE_SIZE_ERR;
                    }
                } else {
                    $_SESSION['msg'] = ERR_UPLOADS;
                }
            } else {
                $_SESSION['msg']  = FILE_TYPE_ERR;
            }

        }
    }


    public function ordersubByfacldel()
    {
        $sub_id = explode(",", $_GET['sub_id']);

        for($b = 0; $b < count($sub_id) ; $b++){
            $this->query("DELETE FROM subject WHERE sub_id=:sub_id");
            $this->bind(':sub_id' , $sub_id[$b]);
            $this->execute();
        }
        $_SESSION['msg'] =   SUCCESS;
        header('refresh:0;url=' . ROOT_URL . '/subject/ordersubByfacl?edulev_id='.$_GET['edulev_id'].'&pro_id='.$_GET['pro_id']);
    }
}
