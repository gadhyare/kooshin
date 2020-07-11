<?php class levelModel extends Model{
    public  $rowss;
    public function Index(){
        if(isset($_POST['btns'])){
            $chk = $_REQUEST['chid'];

            $a = implode(", " , $chk);

            $this->query("DELETE FROM levels WHERE lev_id in ($a)");
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM levels ORDER BY lev_id ASC');
		$rows = $this->resultSet();
		return $rows;
    }


    public function update(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['edit_submit'])){ 
            if($post['level_name_edit'] == '' || empty($post['level_name_edit']) || is_null($post['level_name_edit'])){
                $_SESSION['msg'] = ERR_EMPTY;
            }
            elseif(is_numeric($post['level_name_edit'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{
            $this->query('UPDATE levels SET  level_name= :level_name_edit,active= :active_edit WHERE lev_id=:id');
            $this->bind(':level_name_edit' ,  $post['level_name_edit']);
            $this->bind(':active_edit' ,  $post['selected_value']);
            $this->bind(':id' ,  $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
                header ("refresh:0;url=" . ROOT_URL .'/level');
            }

        }
        $this->query('SELECT * FROM levels WHERE lev_id=:id');
        $this->bind(':id' ,  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
}


    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            if($post['level_name'] == ''){
                $_SESSION['msg'] = ERR_EMPTY;
            }
            elseif(is_numeric($post['level_name'])){
                $_SESSION['msg'] = ERR_NUMBER;
            }
            else{
                $this->query('INSERT INTO levels( level_name , active) VALUES (:level_name,:active)');
                $this->bind(':level_name' , $post['level_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] = SUCCESS;
                    header ('Refresh: 2; ' . ROOT_URL .'/level');
                }
            }
        }
    }


    public function search(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            $this->query('SELECT * FROM levels WHERE level_name = :level_name');
            $this->bind(':level_name' ,  'dfsv');
            $this->single();
                $rec = $this->resultSet();
                return $rec;
        }
    }

    public function delete(){
        if(isset($_POST['delete_items'])){
            $this->query('DELETE FROM levels WHERE lev_id=:id');
            $this->bind(':id' ,  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ('Refresh: 2; ' . ROOT_URL .'/level');
            
            
            
        }
        $this->query('SELECT * FROM levels WHERE lev_id=:id');
        $this->bind(':id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

   

}