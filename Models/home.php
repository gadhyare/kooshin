<?php 
 
class HomeModel extends Model{
    public  $rowss;
 
    public function Index(){
        $op = new Khas();
        
        $this->query('SELECT * FROM levels ORDER BY id ASC');
		$rows = $this->resultSet();
		return $rows;
    }


    public function update(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['edit_submit'])){ 
            if($post['level_name_edit'] == '' || empty($post['level_name_edit']) || is_null($post['level_name_edit'])){
                echo ERR_EMPTY;
            }
            elseif(is_numeric($post['level_name_edit'])){
                echo ERR_NUMBER;
            }
            else{
            $this->query('UPDATE levels SET  level_name= :level_name_edit,active= :active_edit WHERE id=:id');
            $this->bind(':level_name_edit' ,  $post['level_name_edit']);
            $this->bind(':active_edit' ,  $post['active_edit']);
            $this->bind(':id' ,  $_GET['id']);
            $do_edit = $this->execute();
            echo SUCCESS;
                header ("refresh:1;url=" . ROOT_URL .'/home');
               // header( "refresh:1;url=".path  );
            }

        }
        $this->query('SELECT * FROM levels WHERE id=:id');
        $this->bind(':id' ,  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
}


    public function add(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_POST['submit'])){
            if($post['level_name'] == ''){
                echo 'sss';
            }
            elseif(is_numeric($post['level_name'])){
                echo "adcasd";
            }
            else{
                $this->query('INSERT INTO levels( level_name , active) VALUES (:level_name,:active)');
                $this->bind(':level_name' , $post['level_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                     header ('Location: ' . ROOT_URL .'/home');
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

        if($_POST['delete_items']){
            $this->query('DELETE FROM levels WHERE id=:id');
            $this->bind(':id' ,  $_GET['id']);
            $this->execute();
            header ('Location: ' . ROOT_URL .'/home');
        }
        $this->query('SELECT * FROM levels WHERE id=:id');
        $this->bind(':id' ,  $_GET['id']);
        $select_to_delete= $this->resultSet();;
        return $select_to_delete ;
    }

   

}