<?php class ExamsModel extends Model
{
    public  $rowss;
    public function index()
    {
    }

    public function add()
    {
    }

    public function newexam()
    {

        if (isset($_POST['upload_ex'])) {
            if (empty($_POST['ex_code']) && empty($_POST['ex_crid'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                if ($_FILES['examfileup']['size'] != 0 && $_FILES['examfileup']['error'] == 0) {
                    $allowFiles = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                    if (in_array($_FILES['examfileup']['type'], $allowFiles)) {
                        $fileName = $_FILES['examfileup']['name'];
                        $fileType = $_FILES['examfileup']['type'];
                        $fileSize = $_FILES['examfileup']['size'];
                        $tmp_name = $_FILES['examfileup']['tmp_name'];
                        if ($fileSize > 0) {
                            if (@move_uploaded_file($tmp_name, getcwd() . "/filesdir/$fileName")) {
                                $this->doupload($fileName);
                            } else {
                                $_SESSION['msg'] = FILE_NOT_UPLOADED_CORRCET;
                            }
                        } else {
                            $_SESSION['msg'] = SMALL_FILE_SIZE;
                        }
                    }
                } else {
                    $_SESSION['msg'] = NOT_CHOSIN_FILE_TO_UPLOAD;
                }
            }
        }
    }



    public function doupload($fileName)
    {
        $file = getcwd() . "/filesdir/$fileName";
        $file_open = fopen($file, "r");
        while (($csv = fgetcsv($file_open, 10000, ",")) !== false) {
            $iNum = count($csv);
            $sResult = $csv;
            $sCSVData = implode(";", $sResult);
            $aCSVData = explode(";", $sCSVData);
            $stu_id = $aCSVData[0];
            $qu1 = $aCSVData[1];
            $as1 = $aCSVData[2];
            $ex1 = $aCSVData[3];
            $qu2 = $aCSVData[4];
            $as2 = $aCSVData[5];
            $ex2 = $aCSVData[6];
            $att = $aCSVData[7];
            $this->query("INSERT INTO exams(stu_id,prog_id,  dep_id,    sec_id, lev_id, grp_id, sub_id, ex_code, ex_crid, qu1, as1, ex1, qu2, as2, ex2, att, ex_date) VALUES 
            (:stu_id,:prog_id, :dep_id, :sec_id,:lev_id,:grp_id,:sub_id,:ex_code,:ex_crid,:qu1,:as1,:ex1,:qu2,:as2,:ex2,:att,:ex_date)");
            $this->bind(':stu_id', $stu_id);
            $this->bind(':prog_id', $_GET['id']);
            $this->bind(':dep_id', $_POST['dep_id']);
            $this->bind(':sec_id', $_POST['sec_id']);
            $this->bind(':lev_id', $_POST['lev_id']);
            $this->bind(':grp_id', $_POST['grp_id']);
            $this->bind(':sub_id', $_POST['sub_id']);
            $this->bind(':ex_code', $_POST['ex_code']);
            $this->bind(':ex_crid', $_POST['ex_crid']);
            $this->bind(':qu1', $qu1);
            $this->bind(':as1', $as1);
            $this->bind(':ex1', $ex1);
            $this->bind(':qu2', $qu2);
            $this->bind(':as2', $as2);
            $this->bind(':ex2', $ex2);
            $this->bind(':att', $att);
            $this->bind(':ex_date', date("Y-m-d"));
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
    }


    public function searchresult()
    {

        if (isset($_POST['btnFullPro'])) {

            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $this->query('SELECT * FROM exams WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id');
            $this->bind(':prog_id', $_POST['prog_id']);
            $this->bind(':dep_id', $_POST['dep_id']);
            $this->bind(':sec_id', $_POST['sec_id']);
            $this->bind(':lev_id', $_POST['lev_id']);
            $this->bind(':grp_id', $_POST['grp_id']);
            $this->bind(':sub_id',  $_POST['sub_id']);
            $rows = $this->resultSet();
            return json_encode($rows);
        }
    }


    public function stdelexam()
    {
        $id = intval($_GET['id']);
        if (isset($id)) {
            if (isset($_POST['delete_items'])) {
                $this->query('DELETE FROM exams WHERE ex_id=:id');
                $this->bind(':id',  $id);
                $this->execute();
                header('refresh:1;url=' . ROOT_URL . "/exams/" . $_GET['title']);
            }
            $this->query('SELECT * FROM exams WHERE ex_id=:id');
            $this->bind(':id',  $id);
            $select_to_delete = $this->resultSet();;
            return $select_to_delete;
        }
    }


    public function stupexam()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $id = intval($_GET['id']);
        if (isset($id)) {
            $_SESSION['stu_dep'] = $post['department'];
            $_SESSION['stu_sec'] = $post['section'];
            $_SESSION['stu_lev'] = $post['level'];
            $_SESSION['stu_grp'] = $post['group'];
            $_SESSION['sub_id']  = $post['subject'];
            $this->query('SELECT * FROM exams WHERE id=:id AND stu_dep =:stu_dep AND stu_sec =:stu_sec AND stu_lev =:stu_lev AND stu_grp =:stu_grp AND  sub_id=:sub_id');
            $this->bind(':id',  $id);
            $this->bind(':stu_dep', $_SESSION['stu_dep']);
            $this->bind(':stu_sec', $_SESSION['stu_sec']);
            $this->bind(':stu_lev', $_SESSION['stu_lev']);
            $this->bind(':stu_grp', $_SESSION['stu_grp']);
            $this->bind(':sub_id',  $_SESSION['sub_id']);
            $select_to_delete = $this->resultSet();;
            return $select_to_delete;
        }
    }

    public function updatestuexam()
    {
        $op = new Khas();
        if (isset($_POST['btnUpdate'])) {
            if (
                $_POST['stu_id'] != "" ||  $_POST['qu1'] != "" ||  $_POST['as1']
                || $_POST['ex1'] != "" ||  $_POST['qu2'] != "" ||  $_POST['as2'] != "" ||  $_POST['ex2'] != "" ||  $_POST['att']  != ""
            ) {
                $total = $_POST['qu1'] + $_POST['as1'] + $_POST['ex1'] + $_POST['qu2'] + $_POST['as2'] + $_POST['ex2'] + $_POST['att'];
                $this->query("UPDATE exams SET prog_id=:prog_id,dep_id=:dep_id,sec_id=:sec_id ,lev_id=:lev_id,grp_id=:grp_id,sub_id=:sub_id,ex_code=:ex_code,ex_crid=:ex_crid,qu1=:qu1,as1=:as1,ex1=:ex1,qu2=:qu2,as2=:as2,ex2=:ex2,att=:att,sub_gradPoint=:sub_gradPoint,sub_Point=:sub_Point  WHERE ex_id=:id");
                $this->bind(":prog_id", $_POST['prog_id']);
                $this->bind(":dep_id", $_POST['dep_id']);
                $this->bind(":sec_id", $_POST['sec_id']);
                $this->bind(":lev_id", $_POST['lev_id']);
                $this->bind(":grp_id", $_POST['grp_id']);
                $this->bind(":sub_id", $_POST['sub_id']);
                $this->bind(":ex_code", $_POST['ex_code']);
                $this->bind(":ex_crid", $_POST['ex_crid']);
                $this->bind(":qu1", $_POST['qu1']);
                $this->bind(":as1", $_POST['as1']);
                $this->bind(":ex1", $_POST['ex1']);
                $this->bind(":qu2", $_POST['qu2']);
                $this->bind(":as2", $_POST['as2']);
                $this->bind(":ex2", $_POST['ex2']);
                $this->bind(":att", $_POST['att']);
                $this->bind(":id", $_GET['id']);
                $this->bind(':sub_gradPoint', $op->getPoint($total));
                $this->bind(':sub_Point',   $op->getPoint($total) * $_POST['ex_crid']);
                $do_edit = $this->execute();
                $_SESSION['msg'] = SUCCESS;
            } else {
                echo $_SESSION['msg'] = ERR_EMPTY;
            }
        }
        if (isset($_GET['id'])) {
            $this->query('SELECT * FROM exams WHERE ex_id=:id ');
            $this->bind(':id',  $_GET['id']);
            $updatestuexam = $this->resultSet();;
            return json_encode($updatestuexam);
        }
    }



    public function showStuRecord()
    {
        global $stuLev;
        $id = intval($_GET['id']);
        if ($id) {
            $this->query('SELECT * FROM exams WHERE stu_num =:stu_num');
            $this->bind(':stu_num', $id);
            $this->single();
            $rows = $this->resultSet();
            return $rows;
        }
    }

    public function examselPro()
    {

        if (isset($_POST['Sel_Pro_cls'])) {
            header("refresh:0;url=" . ROOT_URL . '/exams/newexam/' . $_POST['FullPro']);
        } elseif (isset($_POST['Sel_Pro_stu'])) {
            header("refresh:0;url=" . ROOT_URL . '/exams/examsstuadd/' . $_POST['FullPro']);
        }
    }


    public function stuGpaprint()
    {
        $op = new Khas();
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query("SELECT * FROM stu_acadimi WHERE stu_id=:id AND prog_id=:prog_id");
            $this->bind(":id", $op->getStuInfoByStunm($_GET['id'], 'stu_id'));
            $this->bind(":prog_id",  $_GET['prog_id']);
            $row = $this->resultSet();
            if ($this->rowCount() >  0) {
                return $row;
            }
        } else {
            $_SESSION['msg'] = ERR_NUMBER;
        }
    }

    public function examsstuadd()
    {
        $op = new Khas();

        if (isset($_POST['addExamForStu'])) {
            if (empty($_POST['ex_code']) && empty($_POST['ex_crid']) && empty($_POST['stu_id'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif ($_POST['ex_crid'] <= 0) {
                $_SESSION['msg'] = MUST_INSERT_UP_OF_ZERO;
            } else {
                $total = $_POST['qu1'] + $_POST['as1'] + $_POST['ex1'] + $_POST['qu2'] + $_POST['as2'] + $_POST['ex2'] + $_POST['att'];
                if (isset($_POST['ex_code']) && isset($_POST['ex_crid']) && isset($_POST['stu_id'])) {
                    $this->query("INSERT INTO exams(stu_id,prog_id,  dep_id,    sec_id, lev_id, grp_id, sub_id, ex_code, ex_crid, qu1, as1, ex1, qu2, as2, ex2, att,sub_gradPoint, sub_Point , ex_date) VALUES 
                (:stu_id,:prog_id, :dep_id, :sec_id,:lev_id,:grp_id,:sub_id,:ex_code,:ex_crid,:qu1,:as1,:ex1,:qu2,:as2,:ex2,:att,:sub_gradPoint,:sub_Point,:ex_date)");
                    $this->bind(':stu_id', $op->getStuInfoByStunm($_POST['stu_id'], 'stu_id'));
                    $this->bind(':prog_id', $_GET['id']);
                    $this->bind(':dep_id', $_POST['dep_id']);
                    $this->bind(':sec_id', $_POST['sec_id']);
                    $this->bind(':lev_id', $_POST['lev_id']);
                    $this->bind(':grp_id', $_POST['grp_id']);
                    $this->bind(':sub_id', $_POST['sub_id']);
                    $this->bind(':ex_code', $_POST['ex_code']);
                    $this->bind(':ex_crid', $_POST['ex_crid']);
                    $this->bind(':qu1', $_POST['qu1']);
                    $this->bind(':as1', $_POST['as1']);
                    $this->bind(':ex1', $_POST['ex1']);
                    $this->bind(':qu2', $_POST['qu2']);
                    $this->bind(':as2', $_POST['as2']);
                    $this->bind(':ex2', $_POST['ex2']);
                    $this->bind(':att', $_POST['att']);
                    $this->bind(':sub_gradPoint', $op->getPoint($total));
                    $this->bind(':sub_Point',   $op->getPoint($total) * $_POST['ex_crid']);
                    $this->bind(':ex_date', date("Y-m-d"));
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                } else {
                    $_SESSION['msg'] = ERR_EMPTY;
                }
            }
        }
    }

    public function examsstu()
    {
        echo "asdcasdC";
    }


    public function stufullGpaprint()
    {
        $op = new Khas();
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query("SELECT * FROM stu_acadimi WHERE stu_id=:id AND prog_id=:prog_id");
            $this->bind(":id", $op->getStuInfoByStunm($_GET['id'], 'stu_id'));
            $this->bind(":prog_id",  $_GET['prog_id']);
            $row = $this->resultSet();
            if ($this->rowCount() >  0) {
                return $row;
            }
        } else {
            $_SESSION['msg'] = ERR_NUMBER;
        }
    }


    public function stuGpa()
    {
        $op = new Khas();
        if (isset($_POST['pos'])) {
            if (!empty($_POST['stu_id'])) {
                header("refresh:0;url=" . ROOT_URL . "/exams/stuGpa/" . $_POST['stu_id'] . "?prog_id=" . $_POST['pro_id']);
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }

        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query("SELECT * FROM stu_acadimi WHERE stu_id=:id AND prog_id=:prog_id LIMIT 1");
            $this->bind(":id", $op->getStuInfoByStunm($_GET['id'], 'stu_id'));
            $this->bind(":prog_id",  $_GET['prog_id']);
            $row = $this->resultSet();
            if ($row) {
                return $row;
            }else{
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }  
    }




    public function searchresultprint()
    {
        if (isset($_GET['prog_id']) && isset($_GET['dep_id']) && isset($_GET['sec_id']) && isset($_GET['lev_id']) && isset($_GET['grp_id'])  && isset($_GET['sub_id'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->query('SELECT * FROM exams WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id');
            $this->bind(':prog_id', $_GET['prog_id']);
            $this->bind(':dep_id', $_GET['dep_id']);
            $this->bind(':sec_id', $_GET['sec_id']);
            $this->bind(':lev_id', $_GET['lev_id']);
            $this->bind(':grp_id', $_GET['grp_id']);
            $this->bind(':sub_id',  $_GET['sub_id']);
            $rows = $this->resultSet();
            return json_encode($rows);
        }
    }


    public function updateexam()
    {

        $op = new Khas();
        if (isset($_POST['setData'])) {
            header("refresh:0;url=" . ROOT_URL . "/exams/updateexam?ids=" . $_POST['FullPro']);
        }

        if (isset($_GET['ids'])) {
            if (isset($_POST['sectionOne'])) {
                header("refresh:0;url=" . ROOT_URL . "/exams/updateexam?ids=" . $_GET['ids'] . "&type=sectionOne&dep_id=" . $_POST['dep_id'] . "&sec_id=" . $_POST['sec_id'] . "&lev_id=" . $_POST['lev_id'] . "&grp_id=" . $_POST['grp_id'] . "&sub_id=" . $_POST['sub_id']);
            }

            if (isset($_POST['sectionTwo'])) {
                header("refresh:0;url=" . ROOT_URL . "/exams/updateexam?ids=" . $_GET['ids'] . "&type=sectionTwo&dep_id=" . $_POST['dep_id'] . "&sec_id=" . $_POST['sec_id'] . "&lev_id=" . $_POST['lev_id'] . "&grp_id=" . $_POST['grp_id'] . "&sub_id=" . $_POST['sub_id']);
            }



            if (isset($_POST['sectionOneedite'])) {
                if (empty($_POST['ex_code'])) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM exams WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id 
                    AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id");
                    $this->bind(":prog_id", $_GET['ids']);
                    $this->bind(":dep_id", $_GET['dep_id']);
                    $this->bind(":sec_id", $_GET['sec_id']);
                    $this->bind(":lev_id", $_GET['lev_id']);
                    $this->bind(":grp_id", $_GET['grp_id']);
                    $this->bind(":sub_id", $_GET['sub_id']);
                    $row = $this->resultSet();
                    if ($row) {
                        $this->query("UPDATE exams SET ex_code=:ex_code   WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id 
                                    AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id");
                        $this->bind(":ex_code", $_POST['ex_code']);
                        $this->bind(":prog_id", $_GET['ids']);
                        $this->bind(":dep_id", $_GET['dep_id']);
                        $this->bind(":sec_id", $_GET['sec_id']);
                        $this->bind(":lev_id", $_GET['lev_id']);
                        $this->bind(":grp_id", $_GET['grp_id']);
                        $this->bind(":sub_id", $_GET['sub_id']);
                        $this->execute();
                        $_SESSION['msg'] = SUCCESS;
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }

            if (isset($_POST['sectionTwoedit'])) {

                if (empty($_POST['ex_crid'])) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } else {
                    $this->query("SELECT * FROM exams WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id 
                    AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id");
                    $this->bind(":prog_id", $_GET['ids']);
                    $this->bind(":dep_id", $_GET['dep_id']);
                    $this->bind(":sec_id", $_GET['sec_id']);
                    $this->bind(":lev_id", $_GET['lev_id']);
                    $this->bind(":grp_id", $_GET['grp_id']);
                    $this->bind(":sub_id", $_GET['sub_id']);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $item) {
                            $total = $item['qu1'] + $item['as1'] + $item['ex1'] + $item['qu2']+$item['as2']+$item['ex2']+$item['att'];
                            $this->query("UPDATE exams SET ex_crid=:ex_crid,sub_gradPoint=:sub_gradPoint,sub_Point=:sub_Point  WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id 
                                    AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id");
                            $this->bind(":ex_crid", $_POST['ex_crid']);
                            $this->bind(':sub_gradPoint', $op->getPoint($total));
                            $this->bind(':sub_Point',   $op->getPoint($total) * $_POST['ex_crid']);
                            $this->bind(":prog_id", $_GET['ids']);
                            $this->bind(":dep_id", $_GET['dep_id']);
                            $this->bind(":sec_id", $_GET['sec_id']);
                            $this->bind(":lev_id", $_GET['lev_id']);
                            $this->bind(":grp_id", $_GET['grp_id']);
                            $this->bind(":sub_id", $_GET['sub_id']);
                            $this->execute();
                            $_SESSION['msg'] = SUCCESS;
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }

            if(isset($_POST['do_action'])){
                
                    if(empty($_POST['qu1']) && empty($_POST['as1']) && empty($_POST['ex1']) && empty($_POST['qu2']) && empty($_POST['as2']) && empty($_POST['ex2']) && empty($_POST['att'])){
                        $_SESSION['msg'] = ERR_EMPTY;
                        echo $_POST['action_name'];
                } else {
                    $this->query("SELECT * FROM exams WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id 
                        AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id");
                    $this->bind(":prog_id", $_GET['ids']);
                    $this->bind(":dep_id", $_GET['dep_id']);
                    $this->bind(":sec_id", $_GET['sec_id']);
                    $this->bind(":lev_id", $_GET['lev_id']);
                    $this->bind(":grp_id", $_GET['grp_id']);
                    $this->bind(":sub_id", $_GET['sub_id']);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $item) {
                            $total = $item['qu1'] + $item['as1'] + $item['ex1'] + $item['qu2'] + $item['as2'] + $item['ex2'] + $item['att'];
                            $this->query("UPDATE exams SET qu1=:qu1,as1=:as1, ex1=:ex1,qu2=:qu2,as2=:as2,ex2=:ex2,att=:att,sub_gradPoint=:sub_gradPoint,sub_Point=:sub_Point 
                            WHERE   prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id AND stu_id=:stu_id");
                            if($_POST['action_name'] == 1):
                            $this->bind(":qu1", $item['qu1'] + $_POST['qu1']);
                            $this->bind(":as1", $item['as1'] + $_POST['as1']);
                            $this->bind(":ex1", $item['ex1'] + $_POST['ex1']);
                            $this->bind(":qu2", $item['qu2'] + $_POST['qu2']);
                            $this->bind(":as2", $item['as2'] + $_POST['as2']);
                            $this->bind(":ex2", $item['ex2'] + $_POST['ex2']);
                            $this->bind(":att", $item['att'] + $_POST['att']);
                             
                            elseif($_POST['action_name'] == 2):
                                $this->bind(":qu1", $item['qu1'] - $_POST['qu1']);
                                $this->bind(":as1", $item['as1'] - $_POST['as1']);
                                $this->bind(":ex1", $item['ex1'] - $_POST['ex1']);
                                $this->bind(":qu2", $item['qu2'] - $_POST['qu2']);
                                $this->bind(":as2", $item['as2'] - $_POST['as2']);
                                $this->bind(":ex2", $item['ex2'] - $_POST['ex2']);
                                $this->bind(":att", $item['att'] - $_POST['att']);
                                endif;
                            $this->bind(':sub_gradPoint', $op->getPoint($total));
                            $this->bind(':sub_Point',   $op->getPoint($total) * $item['ex_crid']);
                            $this->bind(":prog_id", $_GET['ids']);
                            $this->bind(":dep_id", $_GET['dep_id']);
                            $this->bind(":sec_id", $_GET['sec_id']);
                            $this->bind(":lev_id", $_GET['lev_id']);
                            $this->bind(":grp_id", $_GET['grp_id']);
                            $this->bind(":sub_id", $_GET['sub_id']);
                            $this->bind(":stu_id", $item['stu_id']);
                            $this->execute();
                            $_SESSION['msg'] = SUCCESS;
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }

            if(isset($_POST['deleteRec'])){
                if(isset($_GET['dep_id']) && isset($_GET['sec_id']) && isset($_GET['lev_id']) && isset($_GET['grp_id']) && isset($_GET['sub_id']) ):
                $this->query("DELETE FROM exams WHERE prog_id=:prog_id AND dep_id=:dep_id AND sec_id=:sec_id 
                AND lev_id=:lev_id AND grp_id=:grp_id AND sub_id=:sub_id");
                $this->bind(":prog_id", $_GET['ids']);
                $this->bind(":dep_id", $_GET['dep_id']);
                $this->bind(":sec_id", $_GET['sec_id']);
                $this->bind(":lev_id", $_GET['lev_id']);
                $this->bind(":grp_id", $_GET['grp_id']);
                $this->bind(":sub_id", $_GET['sub_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:0;url=" . ROOT_URL . "/exams/updateexam");
                else:
                    $_SESSION['msg'] = SELECT_ID;
                endif;
            }
        }

        }
    
}
