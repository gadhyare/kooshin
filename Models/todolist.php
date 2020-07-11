<?php class todolistModel extends Model{
    public function index(){
        $this->query('SELECT * FROM todo ORDER BY id ASC');
		$rows = $this->resultSet();
		return $rows;
    }

    public function add(){
         $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         if(isset($_POST['submit'])){
             if(! empty($post['title']) || ! empty($post['topic'])){
                $this->query('INSERT INTO todo( title , topic , user , status , active) VALUES (:title , :topic , :user , :status , :active)');
                $this->bind(':title' , $post['title']);
                $this->bind(':topic', $post['topic']);
                $this->bind(':user', $_SESSION['log_id']);
                $this->bind(':status', $post['status']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] =  SUCCESS;
                     header ('refresh:1;url=' . ROOT_URL .'/todolist');
                }
             }
         }
    }

   public function update(){
    $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    if(isset($_POST['edit_submit'])){ 
        if($post['title_edit'] == '' || empty($post['title_edit']) || is_null($post['title_edit'])){
             $_SESSION['msg'] = ERR_EMPTY;
        }
        elseif(is_numeric($post['title_edit'])){
             $_SESSION['msg'] = ERR_NUMBER;
        }
        else{
            $this->query('UPDATE todo SET  title= :title, topic =:topic,user =:user,status=:status,active=:active WHERE id=:id');  
            $this->bind(':title' , $post['title_edit']);
            $this->bind(':topic', $post['topic_edit']);
            $this->bind(':user', $_SESSION['log_id']);
            $this->bind(':status', $post['status_edit']);
            $this->bind(':active', $post['active_edit']);
            $this->bind(':id', $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header ("refresh:1;url=" . ROOT_URL .'/todolist');
           // header( "refresh:1;url=".path  );
        }
    }
    $this->query('SELECT * FROM todo WHERE id=:id');
    $this->bind(':id' ,  $_GET['id']);
    $rom = $this->resultSet();;
    return $rom;
   }

   


   public function show(){
    $this->query('SELECT * FROM todo WHERE id=:id');
    $this->bind(':id' ,  $_GET['id']);
    $row_to_do = $this->resultSet();;
    return $row_to_do;    
   }
}