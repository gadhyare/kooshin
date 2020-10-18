<?php class facultyModel extends Model{
    public  $rowss;
    public function Index(){
           
        $this->query('SELECT * FROM faculty ORDER BY fac_id ASC');
		$rows = $this->resultSet();
		return $rows;
    }


    public function update(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['edit_submit'])){ 
            if($post['fac_name_edit'] == '' ){
                
                $_SESSION['msg'] = ERR_EMPTY;
                
            }
            elseif(is_numeric($post['fac_name_edit'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{
            $this->query('UPDATE faculty SET  fac_name= :fac_name_edit,code=:code_edit,active= :active_edit WHERE fac_id=:fac_id');
            $this->bind(':fac_name_edit' ,  $post['fac_name_edit']);
            $this->bind(':code_edit',  $post['code_edit']);
            $this->bind(':active_edit' ,  $post['active_edit']);
            $this->bind(':fac_id' ,  $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
                //header ("refresh:0;url=" . ROOT_URL .'/faculty');
               // header( "refresh:1;url=".path  );
               
            }

        }
        $this->query('SELECT * FROM faculty WHERE fac_id=:fac_id');
        $this->bind(':fac_id' ,  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
}


    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submitAdd'])){
            if($post['fac_name'] == ''){
                
                $_SESSION['msg'] = ERR_EMPTY;
                
            }
            elseif(is_numeric($post['fac_name'])){
                
                $_SESSION['msg'] = ERR_NUMBER;
                
            }
            else{

                $this->query('INSERT INTO faculty( fac_name, code , active) VALUES (:faculty,:code,:active)');
                $this->bind(':faculty' , $post['fac_name']);
                $this->bind(':code', $post['code']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] = SUCCESS;
                    //header ('Refresh: 2; ' . ROOT_URL .'/faculty');                   
                }
            }
        }
    }


    public function search(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            $this->query('SELECT * FROM faculty WHERE faculty = :faculty');
            $this->bind(':faculty' ,  'dfsv');
            $this->single();
                $rec = $this->resultSet();
                return $rec;
        }
    }

    public function delete(){
        if(isset($_POST['delete_items'])){
            $this->query('DELETE FROM faculty WHERE fac_id=:fac_id');
            $this->bind(':fac_id' ,  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ('Refresh: 2; ' . ROOT_URL .'/faculty');
            
            
            
        }
        $this->query('SELECT * FROM faculty WHERE fac_id=:fac_id');
        $this->bind(':fac_id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

   

}