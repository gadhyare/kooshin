<?php class departmentModel extends Model
{
    public  $rowss;
    public function Index()
    {
        $this->query('SELECT * FROM department ORDER BY dep_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }


    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['edit_submit'])) {
            if ($post['department_name_edit'] == '' || empty($post['department_name_edit']) || is_null($post['department_name_edit'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($post['department_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } else {
                $this->query('UPDATE department SET  department_name= :department_name_edit,active= :active_edit WHERE dep_id=:id');
                $this->bind(':department_name_edit',  $post['department_name_edit']);
                $this->bind(':active_edit',  $post['selected_value']);
                $this->bind(':id',  $_GET['id']);
                $do_edit = $this->execute();
                $_SESSION['msg'] =   SUCCESS;;
                header('refresh:1;url=' . ROOT_URL . '/department');
            }
        }
        $this->query('SELECT * FROM department WHERE dep_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }


    public function add()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            if ($post['department_name'] == '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($post['department_name'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } else {
                $this->query('INSERT INTO department( department_name , active) VALUES (:department_name,:active)');
                $this->bind(':department_name', $post['department_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                    header('refresh:1;url=' . ROOT_URL . '/department');
                }
            }
        }
    }


    public function search()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            $this->query('SELECT * FROM department WHERE department_name = :department_name');
            $this->bind(':department_name',  'dfsv');
            $this->single();
            $rec = $this->resultSet();
            return $rec;
        }
    }

    public function delete()
    {

        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM department WHERE dep_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('refresh:1;url=' . ROOT_URL . '/department');
        }
        $this->query('SELECT * FROM department WHERE dep_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }


    public function doupload()
    { }

    public function showStuRecordLev()
    {
        global $stu_lev;
        $id = intval($_GET['id']);
        if ($id) {
            $this->query('SELECT * FROM exams WHERE stu_num =:stu_num AND stu_lev=:stu_lev');
            $this->bind(':stu_num', $id);
            $this->bind(':stu_num', $stu_lev);
            $this->single();
            $rows = $this->resultSet();
            return $rows;
        }
    }
}
