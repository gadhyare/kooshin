<?php class baninfoModel extends Model{
    public  $rowss;
    public function Index(){
        
         if(isset($_POST['addRec'])){
            if(empty($_POST['Ban_name']) || empty($_POST['Ban_num'])){
                $_SESSION['msg'] = ERR_EMPTY;
            }else{
                $this->query("INSERT INTO ban_info(Ban_name, Ban_num, Ban_date,Ban_op_acc, Ban_active) 
                VALUES (:Ban_name, :Ban_num, :Ban_date,:Ban_op_acc, :Ban_active)");
                $this->bind(":Ban_name" , $_POST['Ban_name']);
                $this->bind(":Ban_num" , $_POST['Ban_num']);
                $this->bind(":Ban_date" , $_POST['Ban_date']);
                $this->bind(":Ban_op_acc" , $_POST['Ban_op_acc']);
                $this->bind(":Ban_active" , $_POST['Ban_active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }

        if(isset($_POST['updateRec'])){
            if(empty($_POST['UpBan_name']) || empty($_POST['UpBan_num'])){
                $_SESSION['msg'] = ERR_EMPTY;
            }else{
                $this->query("UPDATE  ban_info SET Ban_name=:Ban_name, Ban_num=:Ban_num, Ban_date=:Ban_date,Ban_op_acc=:Ban_op_acc, Ban_active=:Ban_active WHERE  Ban_id=:id");
                $this->bind(":Ban_name" , $_POST['UpBan_name']);
                $this->bind(":Ban_num" , $_POST['UpBan_num']);
                $this->bind(":Ban_date" , $_POST['UpBan_date']);
                $this->bind(":Ban_op_acc" , $_POST['UpUpBan_op_acc']);
                $this->bind(":Ban_active" , $_POST['UpBan_active']);
                $this->bind(":id" , $_GET['id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }

        $this->query('SELECT * FROM ban_info ORDER BY ban_id ASC');
		$rows = $this->resultSet();
        return $rows;
    }



    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->query("DELETE FROM  ban_info   WHERE  Ban_id=:id");
            $this->bind(":id", $_GET['id']);
            $this->execute();
            header("refresh:0;url=".ROOT_URL."/baninfo");
            $_SESSION['msg'] = SUCCESS;
        }
    }



}