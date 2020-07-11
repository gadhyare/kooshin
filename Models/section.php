<?php class SectionModel extends Model
{
    public  $rowss;
    public function Index()
    {
        $this->query('SELECT * FROM section ORDER BY sec_id ASC');
        $rows = $this->resultSet();
        return $rows;
    }
    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['edit_submit'])) {
            if ($post['section_name_edit'] == '' || empty($post['section_name_edit']) || is_null($post['section_name_edit'])) {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($post['section_name_edit'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query('UPDATE section SET  section_name= :section_name_edit,active= :active_edit WHERE sec_id=:id');
                $this->bind(':section_name_edit',  $post['section_name_edit']);
                $this->bind(':active_edit',  $post['selected_value']);
                $this->bind(':id',  $_GET['id']);
                $do_edit = $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/section');
                // header( "refresh:1;url=".path  );
            }
        }
        $this->query('SELECT * FROM section WHERE sec_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }


    public function add()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            if ($post['section_name'] == '') {
                $_SESSION['msg'] = ERR_EMPTY;
            } elseif (is_numeric($post['section_name'])) {
                $_SESSION['msg'] = ERR_NUMBER;
            } else {
                $this->query('INSERT INTO section( section_name , active) VALUES (:section_name,:active)');
                $this->bind(':section_name', $post['section_name']);
                $this->bind(':active', $post['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                    header('refresh:1;url=' . ROOT_URL . '/section');
                }
            }
        }
    }


    public function search()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
            $this->query('SELECT * FROM section WHERE section_name = :section_name');
            $this->bind(':section_name',  'dfsv');
            $this->single();
            $rec = $this->resultSet();
            return $rec;
        }
    }

    public function delete()
    {
        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM section WHERE sec_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('refresh:1;url=' . ROOT_URL . '/section');
        }
        $this->query('SELECT * FROM section WHERE sec_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }
}
