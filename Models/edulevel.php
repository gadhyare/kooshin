<?php class edulevelModel extends Model{
    public  $rowss;
    public function Index(){
           
        $this->query('SELECT * FROM edulevel ORDER BY edulev_id ASC');
		$rows = $this->resultSet();
		return $rows;
    }


    public function update(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['edit_submit'])){ 
            if($post['edulev_name_edit'] == '' ){
                
                $_SESSION['msg'] = ERR_EMPTY;
                
            }
            elseif(is_numeric($post['edulev_name_edit'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{
            $this->query('UPDATE edulevel SET  edulev_name= :edulev_name_edit,active= :active_edit WHERE edulev_id=:edulev_id');
            $this->bind(':edulev_name_edit' ,  $post['edulev_name_edit']);
            $this->bind(':active_edit' ,  $post['active_edit']);
            $this->bind(':edulev_id' ,  $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
                //header ("refresh:0;url=" . ROOT_URL .'/edulevel');
               // header( "refresh:1;url=".path  );
               
            }

        }
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:edulev_id');
        $this->bind(':edulev_id' ,  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
}


    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submitAdd'])){
            if($post['edulev_name'] == ''){
                
                $_SESSION['msg'] = ERR_EMPTY;
                
            }
            elseif(is_numeric($post['edulev_name'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{

                $this->query('INSERT INTO edulevel( edulev_name , active) VALUES (:edulevel,:active)');
                $this->bind(':edulevel' , $post['edulev_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] = SUCCESS;
                    //header ('Refresh: 2; ' . ROOT_URL .'/edulevel');                   
                }
            }
        }
    }


    public function search(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            $this->query('SELECT * FROM edulevel WHERE edulevel = :edulevel');
            $this->bind(':edulevel' ,  'dfsv');
            $this->single();
                $rec = $this->resultSet();
                return $rec;
        }
    }

    public function delete(){
        if(isset($_POST['delete_items'])){
            $this->query('DELETE FROM edulevel WHERE edulev_id=:edulev_id');
            $this->bind(':edulev_id' ,  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ('Refresh: 2; ' . ROOT_URL .'/edulevel');
            
            
            
        }
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:edulev_id');
        $this->bind(':edulev_id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

   

}