<?php class AcademicsModel extends Model{
    public  $rowss;
    public function Index(){
           
        $this->query('SELECT * FROM academics ORDER BY academics_id ASC');
		$rows = $this->resultSet();
		return $rows;
    }


    public function update(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['edit_submit'])){ 
            if($post['academics_edit'] == '' ){
                
                $_SESSION['msg'] = ERR_EMPTY;
                
            }
            elseif(is_numeric($post['academics_edit'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{
            $this->query('UPDATE academics SET  academics= :academics_edit,active= :active_edit WHERE academics_id=:academics_id');
            $this->bind(':academics_edit' ,  $post['academics_edit']);
            $this->bind(':active_edit' ,  $post['selected_value']);
            $this->bind(':academics_id' ,  $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
                header ("refresh:0;url=" . ROOT_URL .'/academics');
               // header( "refresh:1;url=".path  );
               
            }

        }
        $this->query('SELECT * FROM academics WHERE academics_id=:academics_id');
        $this->bind(':academics_id' ,  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
}


    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            if($post['academics_name'] == ''){
                
                $_SESSION['msg'] = ERR_EMPTY;
                
            }
            elseif(is_numeric($post['academics_name'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{

                $this->query('INSERT INTO academics( academics , active) VALUES (:academics,:active)');
                $this->bind(':academics' , $post['academics_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] = SUCCESS;
                    header ('Refresh: 2; ' . ROOT_URL .'/academics');
                    
                    
                    
                     
                }
            }
        }
    }


    public function search(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            $this->query('SELECT * FROM academics WHERE academics = :academics');
            $this->bind(':academics' ,  'dfsv');
            $this->single();
                $rec = $this->resultSet();
                return $rec;
        }
    }

    public function delete(){
        if(isset($_POST['delete_items'])){
            $this->query('DELETE FROM academics WHERE academics_id=:academics_id');
            $this->bind(':academics_id' ,  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ('Refresh: 2; ' . ROOT_URL .'/academics');
            
            
            
        }
        $this->query('SELECT * FROM academics WHERE academics_id=:academics_id');
        $this->bind(':academics_id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

   

}