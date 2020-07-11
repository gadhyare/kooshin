<?php class GroupModel extends Model{
    public  $rowss;
    public function Index(){
        $this->query('SELECT * FROM groups ORDER BY grp_id ASC');
		$rows = $this->resultSet();
		return json_encode($rows);
    }

    public function print(){
        $this->query('SELECT * FROM groups ORDER BY grp_id ASC');
		$rows = $this->resultSet();
		return json_encode($rows);
    }
    
    public function update(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['edit_submit'])){ 
            if($post['group_name_edit'] == '' || empty($post['group_name_edit']) || is_null($post['group_name_edit'])){
                $_SESSION['msg'] =  ERR_EMPTY;
            }
            elseif(is_numeric($post['group_name_edit'])){
                $_SESSION['msg'] =  ERR_NUMBER;
            }
            else{
                $this->query('UPDATE groups SET  group_name= :group_name_edit,active= :active_edit WHERE grp_id=:grp_id');
                $this->bind(':group_name_edit' ,  $post['group_name_edit']);
                $this->bind(':active_edit' ,  $post['selected_value']);
                $this->bind(':grp_id' ,  $_GET['id']);
                $do_edit = $this->execute();
                $_SESSION['msg'] =  SUCCESS;
            }
        }
        $this->query('SELECT * FROM groups WHERE grp_id=:grp_id');
        $this->bind(':grp_id' ,  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
}


    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            if($post['group_name'] == ''){
                $_SESSION['msg'] =  ERR_EMPTY;
            }
            elseif(is_numeric($post['group_name'])){
                $_SESSION['msg'] =  ERR_NUMBER;
            }
            else{
                $this->query('INSERT INTO groups( group_name , active) VALUES (:group_name,:active)');
                $this->bind(':group_name' , $post['group_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertid()){
                    $_SESSION['msg'] =   SUCCESS;
                    // header ('refresh:1;url=' . ROOT_URL .'/group');
                }
            }
        }
    }


    public function search(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            $this->query('SELECT * FROM groups WHERE group_name = :group_name');
            $this->bind(':group_name' ,  'dfsv');
            $this->single();
                $rec = $this->resultSet();
                return $rec;
        }
    }

    public function delete(){
        if(isset($_POST['delete_items'])){
            $this->query('DELETE FROM groups WHERE grp_id=:grp_id');
            $this->bind(':grp_id' ,  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] =  SUCCESS;
            header ('refresh:1;url=' . ROOT_URL .'/group');
        }
        $this->query('SELECT * FROM groups WHERE grp_id=:grp_id');
        $this->bind(':grp_id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

}