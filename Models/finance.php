<?php class FinanceModel extends Model
{
    public function Index()
    {
    }


    public function stuFee()
    {
    }

    public function deploma()
    {
    }

    public function stufeeindex()
    {
    }

    public function expenssfnc()
    {
    }


    public function getEmpoinf()
    {
        $id = $_GET['id'];
        if ($id) {
            $this->query("SELECT SUM(emp_allowance_amount) as emp_allowance_amount FROM emp_allowance WHERE emp_id=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                foreach ($row as $ftg) {
                    echo $ftg['emp_allowance_amount'];
                }
            } else {
                echo Data_Not_Founded;
            }
        }
    }



    public function employeefinc()
    {
    }


    public function PaymentRes()
    {

        $this->query("SELECT * FROM  PaymentRes  ");
        $rows = $this->resultSet();
        return json_encode($rows);
    }


    public function PaymentResedel()
    {


        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM  PaymentRes  WHERE Pay_Res_id=:id ");
            $this->bind(":id", $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/finance/PaymentRes');
        }
        $this->query("SELECT * FROM  PaymentRes   WHERE Pay_Res_id=:id ");
        $this->bind(":id", $_GET['id']);
        $rows = $this->resultSet();
        return $rows;
    }



    public function PaymentReseadd()
    {

        if (isset($_POST['addnewrec'])) {
            if (empty($_POST['PaymentRes'])) :
                $_SESSION['msg'] = ERR_EMPTY;
            elseif (is_numeric($_POST['PaymentRes'])) :
                $_SESSION['msg'] = ERR_NUMBER;
            else :
                $this->query("INSERT INTO paymentres(PaymentRes, active) VALUES (:PaymentRes, :active)");
                $this->bind(":PaymentRes", $_POST['PaymentRes']);
                $this->bind(":active", $_POST['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            endif;
        }
    }


    public function PaymentResedite()
    {
        if (isset($_POST['updateRec'])) {
            $this->query("UPDATE paymentres SET  PaymentRes=:PaymentRes,active=:active  WHERE Pay_Res_id=:id ");
            $this->bind(":PaymentRes", $_POST['PaymentRes']);
            $this->bind(":active", $_POST['active']);
            $this->bind(":id", $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }

        $this->query("SELECT * FROM  PaymentRes   WHERE Pay_Res_id=:id ");
        $this->bind(":id", $_GET['id']);
        $rows = $this->resultSet();
        return json_encode($rows);
    }



    public function feeinfo()
    {
        $this->query("SELECT * FROM  feeinfo ");
        $rows = $this->resultSet();
        return json_encode($rows);
    }

    public function feeinfoadd()
    {
        if (isset($_POST['addnewrec'])) {
            if (empty($_POST['fee_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (!is_numeric($_POST['fee_amount'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query('INSERT INTO feeinfo(Pay_Res_id, prog_id ,  fee_amount, active) VALUES (:Pay_Res_id, :prog_id,  :fee_amount, :active)');
                $this->bind(":Pay_Res_id", $_POST['PaymentRes']);
                $this->bind(":prog_id", $_POST['prog_id']);
                $this->bind(":fee_amount", $_POST['fee_amount']);
                $this->bind(":active", $_POST['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }
    }



    public function feeinfoedit()
    {
        if (isset($_POST['updateRec'])) {
            if (empty($_POST['fee_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (!is_numeric($_POST['fee_amount'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {

                $this->query('UPDATE feeinfo SET Pay_Res_id=:Pay_Res_id,prog_id=:prog_id,fee_amount=:fee_amount,active=:active    WHERE feeinfo_id=:id');
                $this->bind(":Pay_Res_id", $_POST['PaymentRes']);
                $this->bind(":prog_id", $_POST['prog_id']);
                $this->bind(":fee_amount", $_POST['fee_amount']);
                $this->bind(":active", $_POST['active']);
                $this->bind(":id", $_GET['id']);
                $do_edit = $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }

        $this->query('SELECT * FROM feeinfo WHERE feeinfo_id=:id');
        $this->bind(':id',  $_GET['id']);
        $item = $this->resultSet();;
        return json_encode($item);
    }


    public function feeinfodel()
    {

        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM  feeinfo  WHERE feeinfo_id=:id ");
            $this->bind(":id", $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 0; ' . ROOT_URL . '/finance/feeinfo');
        }
        $this->query('SELECT * FROM feeinfo WHERE feeinfo_id=:id');
        $this->bind(':id',  $_GET['id']);
        $item = $this->resultSet();;
        return $item;
    }

    public function feeclasstran()
    {

        $this->query("SELECT DISTINCT prog_id, lev_id,grp_id,dep_id,sec_id, statues     FROM stu_acadimi WHERE statues='مستمر'");
        $item = $this->resultSet();
        return json_encode($item);
    }

    public function feeclasstrando()
    {
        $op = new Khas();
        if (isset($_POST['upLoadfee'])) {
            $this->query("SELECT *   FROM stu_acadimi WHERE prog_id AND  lev_id AND grp_id AND dep_id AND sec_id  AND statues='مستمر'");
            $this->bind(":prog_id", $_GET['id']);
            $item = $this->resultSet();
            foreach ((array) $item as $upFee) {
                $this->query("INSERT INTO paymentinfo(lev_id, grp_id, sec_id, dep_id, prog_id, Pay_Res_id, stu_id, want, Discount, AccountStatuse, AccountClase, AccountOppDate) 
                VALUES (:lev_id,:grp_id,:sec_id,:dep_id,:prog_id,:Pay_Res_id,:stu_id,:want,:Discount,:AccountStatuse,:AccountClase,:AccountOppDate)");
                $this->bind(":lev_id", $upFee['lev_id']);
                $this->bind(":grp_id", $upFee['grp_id']);
                $this->bind(":sec_id", $upFee['sec_id']);
                $this->bind(":dep_id", $upFee['dep_id']);
                $this->bind(":prog_id", $upFee['prog_id']);
                $this->bind(":Pay_Res_id", $_POST['PyRes']);
                $this->bind(":stu_id", $upFee['stu_id']);
                $this->bind(":want", ($_POST['activeDisc'] == 1) ? ($upFee['Prog_Discount'] == 0) ? $op->getFeeamout($_GET['prog_id'], $_POST['PyRes'])  : $op->getFeeamout($_GET['prog_id'], $_POST['PyRes']) - $upFee['Prog_Discount'] :  $op->getFeeamout($_GET['prog_id'], $_POST['PyRes']));
                $this->bind(":Discount", 0);
                $this->bind(":AccountStatuse", 1);
                $this->bind(":AccountClase", 1);
                $this->bind(":AccountOppDate", '');
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        if (isset($_GET['prog_id']) && isset($_GET['dep_id']) && isset($_GET['lev_id']) && isset($_GET['sec_id']) && isset($_GET['grp_id'])) {
            $this->query("SELECT DISTINCT prog_id, lev_id,grp_id,dep_id,sec_id, statues   FROM stu_acadimi WHERE prog_id=:prog_id AND  lev_id=:lev_id AND grp_id=:grp_id AND dep_id=:dep_id AND sec_id=:sec_id AND statues='مستمر'");
            $this->bind(":prog_id", $_GET['prog_id']);
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $item = $this->resultSet();
            return  $item;
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }



    public function stufeeclasstrando()
    {
        $op = new Khas();
        if (isset($_POST['upLoadfee'])) {
            $this->query("SELECT *   FROM stu_acadimi WHERE prog_id=:prog_id AND  lev_id=:lev_id AND grp_id=:grp_id AND dep_id=:dep_id AND sec_id=:sec_id AND stu_id=:stu_id  AND statues='مستمر'");
            $this->bind(":prog_id", $_GET['prog_id']);
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $this->bind(":stu_id", $_GET['id']);
            $item = $this->resultSet();
            foreach ((array) $item as $upFee) {
                $this->query("INSERT INTO paymentinfo(lev_id, grp_id, sec_id, dep_id, prog_id, Pay_Res_id, stu_id, want, Discount, AccountStatuse, AccountClase, AccountOppDate) 
                VALUES (:lev_id,:grp_id,:sec_id,:dep_id,:prog_id,:Pay_Res_id,:stu_id,:want,:Discount,:AccountStatuse,:AccountClase,:AccountOppDate)");
                $this->bind(":lev_id", $upFee['lev_id']);
                $this->bind(":grp_id", $upFee['grp_id']);
                $this->bind(":sec_id", $upFee['sec_id']);
                $this->bind(":dep_id", $upFee['dep_id']);
                $this->bind(":prog_id", $upFee['prog_id']);
                $this->bind(":Pay_Res_id", $_POST['PyRes']);
                $this->bind(":stu_id", $_GET['id']);
                $this->bind(":want", ($_POST['activeDisc'] == 1) ? ($upFee['Prog_Discount'] == 0) ? $op->getFeeamout($_GET['prog_id'], $_POST['PyRes'])  : $op->getFeeamout($_GET['prog_id'], $_POST['PyRes']) - $upFee['Prog_Discount'] :  $op->getFeeamout($_GET['prog_id'], $_POST['PyRes']));
                $this->bind(":Discount", 0);
                $this->bind(":AccountStatuse", 1);
                $this->bind(":AccountClase", 1);
                $this->bind(":AccountOppDate", '');
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        if (isset($_GET['id']) && isset($_GET['prog_id']) && isset($_GET['dep_id']) && isset($_GET['lev_id']) && isset($_GET['sec_id']) && isset($_GET['grp_id'])) {
            $this->query("SELECT * FROM stu_acadimi WHERE prog_id=:prog_id AND  lev_id=:lev_id AND grp_id=:grp_id AND dep_id=:dep_id AND sec_id=:sec_id AND stu_id=:stu_id  AND statues='مستمر'");
            $this->bind(":prog_id", $_GET['prog_id']);
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $this->bind(":stu_id", $_GET['id']);
            $item = $this->resultSet();
            return  $item;
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function feepaid()
    {

        $this->query("SELECT * FROM paymentinfo");
        $row = $this->resultSet();
        if ($row) {
            return json_encode($row);
        }
    }


    public function updatetransfee()
    {

        $this->query("SELECT DISTINCT lev_id, grp_id, sec_id, dep_id, prog_id, Pay_Res_id  FROM paymentinfo");
        $row = $this->resultSet();
        if ($this->rowCount() > 0) {
            return json_encode($row);
        } else {
            $_SESSION['msg'] = Data_Not_Founded;
        }
    }

    public function updatetransfeedo()
    {
        if (isset($_POST['doUpload'])) {
            if ($_POST['opname'] == 1) {
                $this->query("UPDATE paymentinfo SET want=want + :want WHERE lev_id=:lev_id AND  grp_id=:grp_id AND  sec_id=:sec_id AND  dep_id=:dep_id AND  prog_id=:prog_id AND  Pay_Res_id=:Pay_Res_id");
                $this->bind(":want", $_POST['opnum']);
                $this->bind(":lev_id", $_GET['lev_id']);
                $this->bind(":grp_id", $_GET['grp_id']);
                $this->bind(":sec_id", $_GET['sec_id']);
                $this->bind(":dep_id", $_GET['dep_id']);
                $this->bind(":prog_id", $_GET['prog_id']);
                $this->bind(":Pay_Res_id", $_GET['Pay_Res_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            } elseif ($_POST['opname'] == 2) {
                $this->query("UPDATE paymentinfo SET want=want - :want WHERE lev_id=:lev_id AND  grp_id=:grp_id AND  sec_id=:sec_id AND  dep_id=:dep_id AND  prog_id=:prog_id AND  Pay_Res_id=:Pay_Res_id");
                $this->bind(":want", $_POST['opnum']);
                $this->bind(":lev_id", $_GET['lev_id']);
                $this->bind(":grp_id", $_GET['grp_id']);
                $this->bind(":sec_id", $_GET['sec_id']);
                $this->bind(":dep_id", $_GET['dep_id']);
                $this->bind(":prog_id", $_GET['prog_id']);
                $this->bind(":Pay_Res_id", $_GET['Pay_Res_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        if (isset($_GET['prog_id']) && isset($_GET['dep_id']) && isset($_GET['lev_id']) && isset($_GET['sec_id']) && isset($_GET['grp_id']) && isset($_GET['Pay_Res_id'])) :
            $this->query("SELECT DISTINCT lev_id, grp_id, sec_id, dep_id, prog_id, Pay_Res_id   FROM paymentinfo WHERE 
                        lev_id=:lev_id AND  grp_id=:grp_id AND  sec_id=:sec_id AND  dep_id=:dep_id AND  prog_id=:prog_id AND  Pay_Res_id=:Pay_Res_id");
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $this->bind(":prog_id", $_GET['prog_id']);
            $this->bind(":Pay_Res_id", $_GET['Pay_Res_id']);
            $row = $this->resultSet();
            if ($this->rowCount() > 0) {
                return json_encode($row);
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            } else :
            $_SESSION['msg'] = Data_Not_Founded;
        endif;
    }


    public function updatestuFee()
    {

        $id = $_GET['id'];
        if (isset($_POST['updateStuFee'])) {
            if (empty($_POST['amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("UPDATE paymentinfo SET want=:want WHERE Invoice_id=:Invoice_id");
                $this->bind(":want", $_POST['amount']);
                $this->bind(":Invoice_id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        if (isset($id)) :
            $this->query("SELECT  *   FROM paymentinfo WHERE Invoice_id=:Invoice_id");
            $this->bind(":Invoice_id", $id);
            $row = $this->resultSet();
            if ($this->rowCount() > 0) {
                return $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            } else :
            $_SESSION['msg'] = Data_Not_Founded;
        endif;
    }



    public function deletestuFee()
    {
        $id = $_GET['id'];
        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM paymentinfo WHERE   Invoice_id=:Invoice_id");
            $this->bind(":Invoice_id", $id);
            $this->execute();
            header('Refresh: 2; ' . ROOT_URL . '/finance/feepaid');
            $_SESSION['msg'] = SUCCESS;
        }
        if (isset($id)) :
            $this->query("SELECT  *   FROM paymentinfo WHERE Invoice_id=:Invoice_id");
            $this->bind(":Invoice_id", $id);
            $row = $this->resultSet();
            if ($this->rowCount() > 0) {
                return $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            } else :
            $_SESSION['msg'] = Data_Not_Founded;
        endif;
    }



    public function paidstufee()
    {
        $op = new Khas();
        $id = $_GET['id'];
        if (isset($_POST['paidFee'])) {
            if (!empty($_POST['Discount']) || !empty($_POST['amount']) || !empty($_POST['statment_num'])) {
                $this->query("INSERT INTO fee_trans(Invoice_id, payDate, Discount, amount, statment_num, note) 
                VALUES (:Invoice_id, :payDate, :Discount, :amount, :statment_num, :note)");
                $this->bind(":Invoice_id",  $id);
                $this->bind(":payDate",  $_POST['payDate']);
                $this->bind(":Discount", $_POST['Discount']);
                $this->bind(":amount", $_POST['amount']);
                $this->bind(":statment_num", $_POST['statment_num']);
                $this->bind(":note", $_POST['note']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $op->add_to_account_mov("in", $_POST['acc_mov'], $_POST['amount'], $_POST['payDate'], "paidstufee-" . $this->lastInsertId());
                    $_SESSION['msg'] = SUCCESS;
                }
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
        if (isset($id)) :
            $this->query("SELECT  *   FROM paymentinfo WHERE Invoice_id=:Invoice_id");
            $this->bind(":Invoice_id", $id);
            $row = $this->resultSet();
            if ($this->rowCount() > 0) {
                return $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            } else :
            $_SESSION['msg'] = Data_Not_Founded;
        endif;
    }

    public function deletetransfeedo()
    {
        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM  paymentinfo  WHERE  lev_id=:lev_id AND  grp_id=:grp_id AND  sec_id=:sec_id AND  dep_id=:dep_id AND  prog_id=:prog_id AND  Pay_Res_id=:Pay_Res_id");
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $this->bind(":prog_id", $_GET['prog_id']);
            $this->bind(":Pay_Res_id", $_GET['Pay_Res_id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        if (isset($_GET['prog_id']) && isset($_GET['dep_id']) && isset($_GET['lev_id']) && isset($_GET['sec_id']) && isset($_GET['grp_id']) && isset($_GET['Pay_Res_id'])) :
            $this->query("SELECT DISTINCT lev_id, grp_id, sec_id, dep_id, prog_id, Pay_Res_id   FROM paymentinfo WHERE 
                        lev_id=:lev_id AND  grp_id=:grp_id AND  sec_id=:sec_id AND  dep_id=:dep_id AND  prog_id=:prog_id AND  Pay_Res_id=:Pay_Res_id");
            $this->bind(":lev_id", $_GET['lev_id']);
            $this->bind(":grp_id", $_GET['grp_id']);
            $this->bind(":sec_id", $_GET['sec_id']);
            $this->bind(":dep_id", $_GET['dep_id']);
            $this->bind(":prog_id", $_GET['prog_id']);
            $this->bind(":Pay_Res_id", $_GET['Pay_Res_id']);
            $row = $this->resultSet();
            if ($this->rowCount() > 0) {
                return  $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            } else :
            $_SESSION['msg'] = Data_Not_Founded;
        endif;
    }


    public function delpaidstufee()
    {
        $op = new Khas();
        $id = $_GET['id'];
        if (isset($_POST['delete_items'])) {
            $this->query("DELETE FROM fee_trans WHERE sta_id=:sta_id");
            $this->bind(":sta_id", $id);
            $row = $this->execute();
            $_SESSION['msg'] = SUCCESS;
            //$op->delete_to_account_mov("in", $amount, $date , $parem)
            header('Refresh: 0;' . ROOT_URL . '/finance/paidstufee/' . $_GET['sta_id']);
        }
        if ($id) {
            $this->query("SELECT *  FROM fee_trans WHERE sta_id=:sta_id");
            $this->bind(":sta_id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }



    public function updatepaidstufee()
    {
        $id = $_GET['id'];
        if (isset($_GET['sta_id'])) {
            if (isset($_POST['stupaidfeeupdate'])) {
                $this->query("UPDATE fee_trans SET payDate=:payDate,Discount=:Discount,amount=:amount,statment_num=:statment_num,note=:note WHERE sta_id=:sta_id");
                $this->bind(":payDate",  $_POST['payDate']);
                $this->bind(":Discount", $_POST['Discount']);
                $this->bind(":amount", $_POST['amount']);
                $this->bind(":statment_num", $_POST['statment_num']);
                $this->bind(":note", $_POST['note']);
                $this->bind(":sta_id", $_GET['sta_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }


        if ($id) {
            $this->query("SELECT *  FROM paymentinfo WHERE Invoice_id=:Invoice_id");
            $this->bind(":Invoice_id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function paidstufeePrint()
    {
        $id = $_GET['id'];
        if ($id) {
            $this->query("SELECT *  FROM paymentinfo WHERE Invoice_id=:Invoice_id");
            $this->bind(":Invoice_id", $id);
            $row = $this->resultSet();
            if ($row) {
                return $row;
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function stufeereport()
    {
        if (isset($_POST['btngenirateGetdata'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/stufeereport?prog=" . $_POST['prog'] . "&dep=" . $_POST['dep'] . "&sec=" . $_POST['sec'] . "&lev=" . $_POST['lev'] . "&grp=" . $_POST['grp'] . "&Pay_Res_id=" . $_POST['Pay_Res_id']);
        }

        if (isset($_POST['btngenirateGetStudata'])) {
            if (!empty($_POST['stu_id'])) {
                header("refresh:0;url=" . ROOT_URL . "/finance/stufeereport/" . $_POST['stu_id'] . "?stu_prog=" . $_POST['stu_prog'] . "&stu_Pay_Res_id=" . $_POST['stu_Pay_Res_id']);
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
    }


    public function stufeereportprint()
    {
        if (isset($_GET['prog']) && isset($_GET['dep']) && isset($_GET['sec']) && isset($_GET['lev']) && isset($_GET['grp']) && isset($_GET['Pay_Res_id'])) {
            $this->query("SELECT paymentinfo.lev_id AS lev_id, paymentinfo.grp_id AS grp_id, paymentinfo.sec_id AS sec_id, paymentinfo.dep_id AS dep_id, paymentinfo.prog_id AS prog_id, paymentinfo.Pay_Res_id AS Pay_Res_id, paymentinfo.stu_id AS stu_id, paymentinfo.Discount AS Discount, Sum(fee_trans.amount) AS amount, paymentinfo.Invoice_id AS Invoice_id
            FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
            GROUP BY paymentinfo.lev_id, paymentinfo.grp_id, paymentinfo.sec_id, paymentinfo.dep_id, paymentinfo.prog_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id, paymentinfo.Discount, paymentinfo.Invoice_id
            HAVING (((paymentinfo.lev_id)=:lev) AND ((paymentinfo.grp_id)=:grp) AND ((paymentinfo.sec_id)=:sec) AND ((paymentinfo.dep_id)=:dep) AND ((paymentinfo.prog_id)=:prog) AND ((paymentinfo.Pay_Res_id)=:Pay_Res_id)) ");
            $this->bind(":prog", $_GET['prog']);
            $this->bind(":dep", $_GET['dep']);
            $this->bind(":sec", $_GET['sec']);
            $this->bind(":lev", $_GET['lev']);
            $this->bind(":grp", $_GET['grp']);
            $this->bind(":Pay_Res_id", $_GET['Pay_Res_id']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function singlestufeereportprint()
    {
        $op = new Khas();
        if (isset($_GET['id']) && isset($_GET['stu_prog']) && isset($_GET['stu_Pay_Res_id'])) {
            $this->query("SELECT paymentinfo.Invoice_id AS Invoice_id, paymentinfo.lev_id, paymentinfo.grp_id, paymentinfo.sec_id, paymentinfo.dep_id, paymentinfo.prog_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id, paymentinfo.want, paymentinfo.Discount, paymentinfo.AccountStatuse, paymentinfo.AccountClase, paymentinfo.AccountOppDate
            FROM paymentinfo
            GROUP BY paymentinfo.Invoice_id, paymentinfo.lev_id, paymentinfo.grp_id, paymentinfo.sec_id, paymentinfo.dep_id, paymentinfo.prog_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id, paymentinfo.want, paymentinfo.Discount, paymentinfo.AccountStatuse, paymentinfo.AccountClase, paymentinfo.AccountOppDate
            HAVING (((paymentinfo.prog_id)=:stu_prog) AND ((paymentinfo.Pay_Res_id)=:stu_Pay_Res_id) AND ((paymentinfo.stu_id)=:id))");
            $this->bind(":stu_prog", $_GET['stu_prog']);
            $this->bind(":stu_Pay_Res_id", $_GET['stu_Pay_Res_id']);
            $this->bind(":id", $op->getStuInfoByStunm($_GET['id'], 'stu_id'));
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }



    /** *************************** */
    /** ******** expensetype ********** */
    /** *************************** */

    public  function expensetype()
    {
        $this->query("SELECT * FROM exptype");
        $row = $this->resultSet();

        return json_encode($this->resultSet());
    }


    public function expensetypeadd()
    {
        if (isset($_POST['addexpensetype'])) {

            if (empty($_POST['exptype'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric(($_POST['exptype']))) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("INSERT INTO exptype(exptype, active) VALUES (:exptype, :active)");
                $this->bind(":exptype", $_POST['exptype']);
                $this->bind(":active", $_POST['active']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
    }


    public  function expensetypeupdate()
    {
        $id = $_GET['id'];
        if ($id) {
            if (isset($_POST['updateexpensetype'])) {
                if (empty($_POST['exptype'])) {
                    $_SESSION['msg'] = ERR_EMPTY;
                } elseif (is_numeric(($_POST['exptype']))) {
                    $_SESSION['msg'] = ERR_NUMBER;
                } else {
                    $this->query("UPDATE  exptype SET exptype=:exptype , active=:active WHERE exptypeid=:id");
                    $this->bind(":id", $id);
                    $this->bind(":exptype", $_POST['exptype']);
                    $this->bind(":active", $_POST['active']);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                }
            }
            $this->query("SELECT * FROM exptype WHERE exptypeid=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return   $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        } else {
            $_SESSION['msg'] = SELECT_ID;
        }
    }



    public function expensetypedelete()
    {
        $id = $_GET['id'];
        if ($id) {
            if (isset($_POST['delete_items'])) {
                $this->query("DELETE FROM  exptype WHERE exptypeid=:id");
                $this->bind(":id", $id);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                $this->bind(":id", $id);
                header("refresh:0;url=" . ROOT_URL . "/finance/expensetype");
            }
            $this->query("SELECT * FROM exptype WHERE exptypeid=:id");
            $this->bind(":id", $id);
            $row = $this->resultSet();
            if ($row) {
                return   $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        } else {
            $_SESSION['msg'] = SELECT_ID;
        }
    }


    //** =============================================================== */
    //** ========================== empfinance ========================= */
    //** =============================================================== */

    public function empfinance()
    {
        $op = new Khas();
        if (isset($_POST['addRecDept'])) {
            if (empty($_POST['emp_debt_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("INSERT INTO emp_debt( emp_id,action_month, emp_debt_date, emp_debt_amount) 
                 VALUES (:emp_id,:action_month, :emp_debt_date, :emp_debt_amount)");
                $this->bind(":emp_id", $_POST['emp_id']);
                $this->bind(":action_month", $_POST['action_month']);
                $this->bind(":emp_debt_date", $_POST['emp_debt_date']);
                $this->bind(":emp_debt_amount", $_POST['emp_debt_amount']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $op->add_to_account_mov("out", $_POST['acc_mov'] ,$_POST['emp_debt_amount'] ,  $_POST['emp_debt_date'] ,"debt-". $this->lastInsertId()   );
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        } elseif (isset($_POST['updateRecDept'])) {
            $this->query("UPDATE emp_debt SET  emp_id=:emp_id,action_month=:action_month, emp_debt_date=:emp_debt_date, emp_debt_amount=:emp_debt_amount WHERE emp_debt_id=:id");
            $this->bind(":emp_id", $_POST['emp_id']);
            $this->bind(":action_month", $_POST['action_month']);
            $this->bind(":emp_debt_date", $_POST['emp_debt_date']);
            $this->bind(":emp_debt_amount", $_POST['emp_debt_amount']);
            $this->bind(":id", $_GET['ids']);
            $this->execute();
             $op->update_to_account_mov( "out" ,"debt-".$_GET['ids'] ,$_POST['acc_mov'], $_POST['emp_debt_amount'], $_POST['emp_debt_date']);
            $_SESSION['msg'] = SUCCESS;
        } elseif (isset($_POST['DeleteRecDept'])) {
            $this->query("DELETE FROM emp_debt  WHERE emp_debt_id=:id");
            $this->bind(":id", $_GET['ids']);
            $this->execute();
            $op->delete_to_account_mov("debt-".$_GET['ids'] );
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/finance/empfinance?type=debt");
        }

        if (isset($_POST['addRecallowance'])) {
            if (empty($_POST['emp_allowance_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("INSERT INTO emp_allowance(  emp_id,action_month, allowancetype_id, emp_allowance_date, emp_allowance_amount) 
                 VALUES (:emp_id,:action_month, :allowancetype_id, :emp_allowance_date, :emp_allowance_amount)");
                $this->bind(":emp_id", $_POST['emp_id']);
                $this->bind(":action_month", $_POST['action_month']);
                $this->bind(":allowancetype_id", $_POST['allowancetype_id']);
                $this->bind(":emp_allowance_date", $_POST['emp_allowance_date']);
                $this->bind(":emp_allowance_amount", $_POST['emp_allowance_amount']);
                $this->execute();
                if ($this->lastInsertId()) {
                    //$op->add_to_account_mov("in" , $_POST['acc_mov'] ,$_POST['emp_allowance_amount'], $_POST['emp_allowance_date'] , "allowance-". $this->lastInsertId()   );
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        } elseif (isset($_POST['updateRecallowance'])) {
            if (empty($_POST['emp_allowance_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("UPDATE  emp_allowance SET  emp_id=:emp_id,action_month=:action_month, allowancetype_id=:allowancetype_id, emp_allowance_date=:emp_allowance_date, emp_allowance_amount=:emp_allowance_amount WHERE emp_allowance_id=:id");
                $this->bind(":emp_id", $_POST['emp_id']);
                $this->bind(":action_month", $_POST['action_month']);
                $this->bind(":allowancetype_id", $_POST['allowancetype_id']);
                $this->bind(":emp_allowance_date", $_POST['emp_allowance_date']);
                $this->bind(":emp_allowance_amount", $_POST['emp_allowance_amount']);
                $this->bind(":id",  $_GET['ids']);
                $this->execute();
                //$op->update_to_account_mov( "in" ,"allowance-".$_GET['ids'] ,$_POST['acc_mov'], $_POST['emp_allowance_amount'], $_POST['emp_allowance_date']);
                $_SESSION['msg'] = SUCCESS;
            }
        } elseif (isset($_POST['Deleteemp_allowance'])) {
            $this->query("DELETE FROM emp_allowance WHERE emp_allowance_id=:id");
            $this->bind(":id",  $_GET['ids']);
            $this->execute();
            //$op->delete_to_account_mov("allowance-".$_GET['ids'] );
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/finance/empfinance?type=allowance");
        }

        //***************************************************************** */



        if (isset($_POST['addRecdeduction'])) {
            if (empty($_POST['emp_deductiont_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("INSERT INTO emp_deductiont(  emp_id,action_month, deductiontype_id, emp_deductiont_date, emp_deductiont_amount) 
                 VALUES (:emp_id,:action_month, :deductiontype_id, :emp_deductiont_date, :emp_deductiont_amount)");
                $this->bind(":emp_id", $_POST['emp_id']);
                $this->bind(":action_month", $_POST['action_month']);
                $this->bind(":deductiontype_id", $_POST['deductiontype_id']);
                $this->bind(":emp_deductiont_date", $_POST['emp_deductiont_date']);
                $this->bind(":emp_deductiont_amount", $_POST['emp_deductiont_amount']);
                $this->execute();
                if ($this->lastInsertId()) {
                    //$op->add_to_account_mov("in" , $_POST['acc_mov'] ,$_POST['emp_deductiont_amount'], $_POST['emp_deductiont_date'] , "deduction-". $this->lastInsertId()   );
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        } elseif (isset($_POST['updateRecdeduction'])) {
            if (empty($_POST['emp_deductiont_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("UPDATE  emp_deductiont SET  emp_id=:emp_id,action_month=:action_month, deductiontype_id=:deductiontype_id, emp_deductiont_date=:emp_deductiont_date, emp_deductiont_amount=:emp_deductiont_amount WHERE emp_deductiont_id=:id");
                $this->bind(":emp_id", $_POST['emp_id']);
                $this->bind(":action_month", $_POST['action_month']);
                $this->bind(":deductiontype_id", $_POST['deductiontype_id']);
                $this->bind(":emp_deductiont_date", $_POST['emp_deductiont_date']);
                $this->bind(":emp_deductiont_amount", $_POST['emp_deductiont_amount']);
                $this->bind(":id",  $_GET['ids']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        } elseif (isset($_POST['Deleteemp_deduction'])) {
            $this->query("DELETE FROM emp_deductiont WHERE emp_deductiont_id=:id");
            $this->bind(":id",  $_GET['ids']);
            $this->execute();
            //$op->delete_to_account_mov("deduction-".$_GET['ids'] );
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/finance/empfinance?type=deduction");
        }


        if (isset($_POST['btnUpSellary'])) {

            //$op->gaar($_POST['action_month'] , $_POST['upDates']);
            $this->query("SELECT * FROM empjobs");
            $btyu = $this->resultSet();
            if ($btyu) {
                foreach ($btyu as $poiu) {
                    $this->query("INSERT INTO emp_sellary( emp_id, em_sec_id,em_lev_id,action_month, upDates, emp_deductiont,emp_debt,emp_allowance,  empSellary) 
                    VALUES  (:emp_id,:em_sec_id,:em_lev_id, :action_month, :upDates, :emp_deductiont, :emp_debt,:emp_allowance,  :empSellary)");
                    $this->bind(":emp_id", $poiu['emp_id']);
                    $this->bind(":em_sec_id", $op->getempjobsInfo($poiu['emp_id'], "em_sec_id"));
                    $this->bind(":em_lev_id", $op->getempjobsInfo($poiu['emp_id'], "em_lev_id"));
                    $this->bind(":action_month", $_POST['action_month']);
                    $this->bind(":upDates",  $_POST['upDates']);
                    $this->bind(":emp_deductiont", $op->getdeductiont($poiu['emp_id'], $_POST['action_month']));
                    $this->bind(":emp_debt", $op->getEmpdebt($poiu['emp_id'], $_POST['action_month']));
                    $this->bind(":emp_allowance", $op->getallowance($poiu['emp_id'], $_POST['action_month']));
                    $this->bind(":empSellary",  $poiu['empjob_sellary']);

                    $this->execute();
                    if ($this->lastInsertId()) {
                        $_SESSION['msg'] = SUCCESS;
                    }
                }
            }
        }
    }


    public function getempSellay()
    {
        $id = $_GET['actionmonth'];
        if ($id) {
            $this->query("SELECT * FROM emp_sellary WHERE action_month=:action_month");
            $this->bind(":action_month", $id);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        }
    }


    public function empsellarypaid()
    {
        $id = $_GET['id'];
        $op = new Khas();
        if ($id) {
            if (isset($_POST['PaidempSellary']) && isset($_GET['empSellary_id'])) {
                $this->query("SELECT * FROM emp_sellary_paid WHERE empSellary_id=:empSellary_id");
                $this->bind(":empSellary_id", $id);
                $row = $this->resultSet();
                if (!$row) {
                    $this->query("INSERT INTO emp_sellary_paid(action_month,empSellary_id, emp_sellary_paid_ampount, emp_sellary_paid_date) 
                                VALUES (:action_month,:empSellary_id, :emp_sellary_paid_ampount, :emp_sellary_paid_date)");
                    $this->bind(":action_month",  $_GET['action_month']);
                    $this->bind(":empSellary_id", $id);
                    $this->bind(":emp_sellary_paid_ampount", $_GET['sellery']);
                    $this->bind(":emp_sellary_paid_date", $_POST['PaidDate']);
                    $this->execute();
                    if ($this->lastInsertId()) {
                        $op->add_to_account_mov("out", $_POST['acc_mov'], $_GET['sellery'], $_POST['PaidDate'], "empSellaryPaid-" . $this->lastInsertId());
                        if($this->lastInsertId()){
                            if($_POST['getemp_debt'] > 0){
                            $this->query("INSERT INTO emp_debt(emp_id, action_month,emp_debt_date,emp_debt_amount_buy) 
                            VALUES (:emp_id, :action_month,:emp_debt_date,:emp_debt_amount_buy)");
                            $this->bind(":emp_id", $_POST['emp_ids']);
                            $this->bind(":action_month",  $_GET['action_month']);
                            $this->bind(":emp_debt_date", $_POST['PaidDate']);
                            $this->bind(":emp_debt_amount_buy", $_POST['getemp_debt'] ); 
                            $this->execute();
                            if($this->lastInsertId()){
                                $_SESSION['msg'] = SUCCESS;
                             }                               
                            }
                        }
                    }
                } else {
                    $_SESSION['msg'] = SUCCESS;
                }
            }

            $this->query("SELECT * FROM emp_sellary WHERE empSellary_id=:id");
            $this->bind(":id", $_GET['empSellary_id']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        }
    }

    public function empsellarypaidprint()
    {
        $id = $_GET['id'];
        $op = new Khas();
        if ($id) {
            $this->query("SELECT * FROM emp_sellary WHERE empSellary_id=:id");
            $this->bind(":id", $_GET['id']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            }
        }
    }


    public function allowancetype()
    {
        if (isset($_POST['addRecDept'])) {
            if (empty($_POST['allowancetype'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['allowancetype'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("INSERT INTO allowancetype( allowancetype, active) 
                VALUES (:allowancetype, :active)");
                $this->bind(":allowancetype", $_POST['allowancetype']);
                $this->bind(":active", $_POST['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        } elseif (isset($_POST['updateRecDept'])) {
            if (empty($_POST['allowancetype'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['allowancetype'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("UPDATE  allowancetype SET allowancetype=:allowancetype, active=:active WHERE allowancetype_id=:id");
                $this->bind(":allowancetype", $_POST['allowancetype']);
                $this->bind(":active", $_POST['active']);
                $this->bind(":id", $_GET['ids']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        } elseif (isset($_POST['DeleteRecDept'])) {

            $this->query("DELETE FROM   allowancetype   WHERE allowancetype_id=:id");
            $this->bind(":id", $_GET['ids']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/finance/allowancetype");
        }
    }


    //** ======================================================= */
    //** ======================================================= */
    //** ======================================================= */
    public function deductiontype()
    {
        if (isset($_POST['addRec'])) {
            if (empty($_POST['deductiontype'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['deductiontype'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("INSERT INTO deductiontype( deductiontype, active) 
                VALUES (:deductiontype, :active)");
                $this->bind(":deductiontype", $_POST['deductiontype']);
                $this->bind(":active", $_POST['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        } elseif (isset($_POST['updateRecDept'])) {
            if (empty($_POST['deductiontype'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($_POST['deductiontype'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query("UPDATE  deductiontype SET deductiontype=:deductiontype, active=:active WHERE deductiontype_id=:id");
                $this->bind(":deductiontype", $_POST['deductiontype']);
                $this->bind(":active", $_POST['active']);
                $this->bind(":id", $_GET['ids']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        } elseif (isset($_POST['DeleteRecDept'])) {

            $this->query("DELETE FROM   deductiontype   WHERE deductiontype_id=:id");
            $this->bind(":id", $_GET['ids']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/finance/deductiontype");
        }
    }








    //** ============================================ */
    //** ================== expensess =============== */
    //** ============================================ */


    public function expensess()
    {
        $op = new Khas();
        if (isset($_POST['addRecExpeness'])) {
            if (empty($_POST['expensess_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("INSERT INTO expensess(exptypeid , expensess_date ,  expensess_amount ,expensess_note) 
                VALUES (:exptypeid , :expensess_date ,  :expensess_amount ,:expensess_note)");
                $this->bind(":exptypeid", $_POST['exptypeid']);
                $this->bind(":expensess_date", $_POST['expensess_date']);
                $this->bind(":expensess_amount", $_POST['expensess_amount']);
                $this->bind(":expensess_note", $_POST['expensess_note']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $op->add_to_account_mov("out", $_POST['acc_mov'], $_POST['expensess_amount'], $_POST['expensess_date'], "exp-" . $_POST['exptypeid']);
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }

        if (isset($_POST['updateRecExpeness'])) {
            if (empty($_POST['expensess_amount'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } else {
                $this->query("UPDATE  expensess SET exptypeid=:exptypeid, expensess_date=:expensess_date , expensess_amount=:expensess_amount ,expensess_note=:expensess_note  WHERE expensess_id=:id");
                $this->bind(":exptypeid", $_POST['exptypeid']);
                $this->bind(":expensess_date", $_POST['expensess_date']);
                $this->bind(":expensess_amount", $_POST['expensess_amount']);
                $this->bind(":expensess_note", $_POST['expensess_note']);
                $this->bind(":id", $_GET['ids']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }


        if (isset($_POST['DeleteRecExpeness'])) {
            $this->query("DELETE FROM   expensess     WHERE expensess_id=:id");
            $this->bind(":id", $_GET['ids']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header("refresh:0;url=" . ROOT_URL . "/finance/expensess");
        }
    }





    public function reports()
    {
        $op = new Khas();
        if (isset($_POST['searchdeductionBydate'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/empdeductionprint?DFrm=" . $_POST['dateFrom'] . "&Dto=" . $_POST['dateTo']);
        }

        if (isset($_POST['searchdeductionBydateAndempId'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/empdeductionprint?DFrm=" . $_POST['empdateTo'] . "&Dto=" . $_POST['empdateTo'] . "&emp=" . $_POST['emp_id']);
        }

        if (isset($_POST['searchdebtBydate'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/emprepdebtprint?DFrm=" . $_POST['dateFrom'] . "&Dto=" . $_POST['dateTo']);
        }

        if (isset($_POST['searchdebtBydateAndempId'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/emprepdebtprint?DFrm=" . $_POST['empdateTo'] . "&Dto=" . $_POST['empdateTo'] . "&emp=" . $_POST['emp_id']);
        }

        if (isset($_POST['searchallowanceBydate'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/emprepallowanceprint?DFrm=" . $_POST['dateFrom'] . "&Dto=" . $_POST['dateTo']);
        }

        if (isset($_POST['searchallowanceBydateAndempId'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/emprepallowanceprint?DFrm=" . $_POST['empdateFrom'] . "&Dto=" . $_POST['empdateTo'] . "&emp=" . $_POST['emp_id']);
        }

        if (isset($_POST['searchdbankDataBydate'])) {
            header("refresh:0;url=" . ROOT_URL . "/finance/bankaccountreportprint?banacc=" . $_POST['Ban_id'] . "&DFrm=" . $_POST['bandateFrom'] . "&Dto=" . $_POST['bandateTo']);
        }


        if(isset($_POST['ClosAcc'])){
            $ToDay = date("Y-m-d");
            $op->closeAccounts($ToDay, $_POST['ClosdateFrom'], $_POST['ClosdateTo']) ;
        }
    }




    public function empdeductionprint()
    {
        if (isset($_GET['DFrm']) && isset($_GET['Dto'])) {
            if (isset($_GET['emp'])) {
                $this->query("SELECT * FROM emp_deductiont WHERE emp_deductiont_date     BETWEEN :DFrm AND :Dto AND emp_id=:emp_id");
                $this->bind(":DFrm", $_GET['DFrm']);
                $this->bind(":Dto", $_GET['Dto']);
                $this->bind(":emp_id", $_GET['emp']);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            $this->query("SELECT * FROM emp_deductiont WHERE emp_deductiont_date BETWEEN :DFrm AND :Dto");
            $this->bind(":DFrm", $_GET['DFrm']);
            $this->bind(":Dto", $_GET['Dto']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function emprepdebtprint()
    {
        if (isset($_GET['DFrm']) && isset($_GET['Dto'])) {
            if (isset($_GET['emp'])) {
                $this->query("SELECT * FROM emp_debt WHERE emp_debt_date     BETWEEN :DFrm AND :Dto AND emp_id=:emp_id");
                $this->bind(":DFrm", $_GET['DFrm']);
                $this->bind(":Dto", $_GET['Dto']);
                $this->bind(":emp_id", $_GET['emp']);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            $this->query("SELECT * FROM emp_debt WHERE emp_debt_date BETWEEN :DFrm AND :Dto");
            $this->bind(":DFrm", $_GET['DFrm']);
            $this->bind(":Dto", $_GET['Dto']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function emprepallowanceprint()
    {
        if (isset($_GET['DFrm']) && isset($_GET['Dto'])) {
            if (isset($_GET['emp'])) {
                $this->query("SELECT * FROM emp_allowance WHERE emp_allowance_date     BETWEEN :DFrm AND :Dto AND emp_id=:emp_id");
                $this->bind(":DFrm", $_GET['DFrm']);
                $this->bind(":Dto", $_GET['Dto']);
                $this->bind(":emp_id", $_GET['emp']);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            $this->query("SELECT * FROM emp_allowance WHERE emp_allowance_date BETWEEN :DFrm AND :Dto");
            $this->bind(":DFrm", $_GET['DFrm']);
            $this->bind(":Dto", $_GET['Dto']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }


    public function emprepsellaryprint()
    {
        if (isset($_GET['DFrm']) && isset($_GET['Dto'])) {
            if (isset($_GET['emp'])) {
                $this->query("SELECT * FROM emp_allowance WHERE emp_allowance_date     BETWEEN :DFrm AND :Dto AND emp_id=:emp_id");
                $this->bind(":DFrm", $_GET['DFrm']);
                $this->bind(":Dto", $_GET['Dto']);
                $this->bind(":emp_id", $_GET['emp']);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            $this->query("SELECT * FROM emp_allowance WHERE emp_allowance_date BETWEEN :DFrm AND :Dto");
            $this->bind(":DFrm", $_GET['DFrm']);
            $this->bind(":Dto", $_GET['Dto']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }

    public function bankaccountreportprint()
    {
        if (isset($_GET['DFrm']) && isset($_GET['Dto'])) {
             
            $this->query("SELECT * FROM account_movement WHERE mov_date BETWEEN :DFrm AND :Dto");
            $this->bind(":DFrm", $_GET['DFrm']);
            $this->bind(":Dto", $_GET['Dto']);
            $row = $this->resultSet();
            if ($row) {
                return $this->resultSet();
            } else {
                $_SESSION['msg'] = Data_Not_Founded;
            }
        }
    }
    
}
