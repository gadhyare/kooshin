<?php class ProgramsModel extends Model
{
    public  $rowss;
    public function Index()
    {

        $this->query('SELECT * FROM    programs  ORDER BY edulev_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit_update'])) {
            $this->query('UPDATE programs SET  edulev_id=:edulev_id, fac_id=:fac_id, academics_id=:academics_id, active=:active WHERE prog_id=:id');
            $this->bind(':edulev_id',  $post['edulev_id']);
            $this->bind(':fac_id',  $post['fac_id']);
            $this->bind(':academics_id',  $post['academics_id']);
            $this->bind(':active',  $post['active']);
            $this->bind(':id',  $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] = SUCCESS;
            //header("refresh:0;url=" . ROOT_URL . '/programs');

        }
        $this->query('SELECT * FROM programs WHERE prog_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }


    public function add()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($post['submit'])) {

            $this->query('INSERT INTO programs(edulev_id ,  fac_id, academics_id, active) VALUES (:edulev_id,  :fac_id, :academics_id, :active)');
            $this->bind(':edulev_id', $post['edulev_id']);
            $this->bind(':fac_id', $post['fac_id']);
            $this->bind(':academics_id', $post['academics_id']);
            $this->bind(':active', $post['active']);
            $this->execute();
            if ($this->lastInsertId()) {
                $_SESSION['msg'] = SUCCESS;
            }
        }
    }


    public function delete()
    {
        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM programs WHERE prog_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('Refresh: 2; ' . ROOT_URL . '/programs');
        }
        $this->query('SELECT * FROM programs WHERE prog_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }



    public function prosub()
    {
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_GET['prog_id'])){
        if(isset($_POST['submit'])){
            if($post['subject_name'] == ''){
                $_SESSION['msg'] =  ERR_EMPTY;
            }
            elseif(is_numeric($post['subject_name'])){
                $_SESSION['msg'] =  ERR_NUMBER;
            }
            else{
                $this->query('INSERT INTO subject( subject_name ,  prog_id, active) VALUES (:subject_name,:prog_id,:active)');
                $this->bind(':subject_name' , $post['subject_name']);
                $this->bind(':prog_id' , $_GET['prog_id']);            
                $this->bind(':active', $post['active']);
                $this->execute();
                if($this->lastInsertId()){
                    $_SESSION['msg'] =   SUCCESS;
                     //header ('refresh:1;url=' . ROOT_URL .'/subject');
                }
            }
        }            
        }

    }


    public function setprogreport()
    {
        $op = new Khas();
        if (isset($_POST['seledulev_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/programs/setprogreport?edulev_id=" . $_POST['edulev_id']);
        }
        if (isset($_POST['prog_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/programs/setprogreport?edulev_id=" . $_GET['edulev_id'] . "&prog_id=" . $_POST['prog_id']);
        }

        if (isset($_GET['selprog_id'])) {
            $data = explode(",",$_GET['selprog_id']);
            foreach( $data as $item){
                if($op->get_report_type($item)) continue;
                    $this->query('INSERT INTO  exam_reports (  prog_id ,  report ) VALUES (:prog_id ,  :report)');
                    $this->bind(":prog_id", $item);
                    $this->bind(":report", "custom");
                    $this->execute();                    
                 
            }
            if($this->lastInsertId()){
                $_SESSION['msg'] = SUCCESS;
            }
        }

        

        if (isset($_GET['prog_id'])) {
            $this->query('SELECT * FROM programs WHERE prog_id=:prog_id');
            $this->bind(":prog_id", $_GET['prog_id']);
            $rows = $this->resultSet();
            return  json_encode($rows);
        }
    }


 

    
}
