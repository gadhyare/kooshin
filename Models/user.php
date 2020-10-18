<?php

class UserModel extends Model
{

    public function register()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($_POST['submit'])) {
            $pass = md5($post['password']);
            if (empty($post['user_name']) || empty($post['email']) || empty($pass)) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (md5($post['password'])  != md5($post['confirm_password'])) {
                $_SESSION['msg'] =  ERR_CONFIRM;
            } else {
                date_default_timezone_set('Asia/Kuwait');
                $reg_date = date('Y-m-d');
                $this->query("INSERT INTO users(user_name, email, user_password, reg_date, role , active) VALUES (:user_name, :email, :user_password, :reg_date, :role, :active)");
                $this->bind(':user_name', $post['user_name']);
                $this->bind(':email', $post['email']);
                $this->bind(':user_password', $pass);
                $this->bind(':reg_date', $reg_date);
                $this->bind(':role', $post['role']);
                $this->bind(':active', $post['active']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/user');
            }
        }
    }

    public function index()
    {
        $this->query('SELECT * FROM users');
        $rows = $this->resultSet();
        return $rows;
    }




    public function update()
    {
        $op = new Khas();
        // update users passwords 
        if (isset($_POST['edit_usr_info'])) {
            if ($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } elseif (!$op->is_email($_POST['user_email_edit'])) {
                $_SESSION['msg'] = NOT_EMAIL;
            } else {
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name",  $_POST['user_name_edit']);
                $this->bind(":email", $_POST['user_email_edit']);
                $this->bind(":id", $_GET['id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        // update users levels  
        if (isset($_POST['edit_usr_lev'])) {
            $this->query("UPDATE users SET role=:role,active=:active WHERE usrid=:id");
            $this->bind(":role",  $_POST['role']);
            $this->bind(":active", $_POST['active']);
            $this->bind(":id", $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        // update users password  

        if (isset($_POST['edit_usr_pass'])) {
            if ($_POST['user_password_edit'] == '' || empty($_POST['user_password_edit']) || is_null($_POST['user_password_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (md5($_POST['user_password_edit'])  != md5($_POST['user_password_confirm'])) {

                $_SESSION['msg'] =  ERR_CONFIRM;
            } else {
                $pass = md5($_POST['user_password_edit']);
                $this->query("UPDATE users SET  user_password=:user_password WHERE usrid=:id");
                $this->bind(":user_password", $pass);
                $this->bind(":id", $_GET['id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }

    public function delete()
    {
        if ($_POST['delete_items']) {
            $this->query('DELETE FROM users WHERE usrid=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
            header('refresh:1;url= ' . ROOT_URL . '/user');
        }
        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }




    public function login()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['login_submit'])) {
            $pass = md5($post['password']);
            if (!empty($post['user_name'] || !empty($post['password']))) {
                $this->query('SELECT * FROM users WHERE user_name = :user_name and user_password=:password and active= 1');
                $this->bind(':user_name',  $post['user_name']);
                $this->bind(':password',  $pass);
                $rows = $this->single();
                if ($rows) {
                    $_SESSION['loged_in'] = true;
                    $_SESSION['log_id'] = $rows['usrid'];
                    $_SESSION['log_user'] = $rows['user_name'];
                    $_SESSION['log_role'] = $rows['role'];
                    $_SESSION['msg'] =  SUCCESS_LOGIN;
                    header("refresh:0.5;url=" . ROOT_URL ."/home");
                    exit;
                } else {
                    $_SESSION['msg'] = ERR_LOGIN;
                    return;
                }
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
                return;
            }
        }

        return;
    }

    public function logout()
    {
        unset($_SESSION['loged_in']);
        unset($_SESSION['log_id']);
        unset($_SESSION['log_user']);
        session_destroy();
        header("refresh:1;url=" . ROOT_URL . '/user/login');
    }

    public function upload_image()
    {
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmpname = $_FILES['avatar']['tmp_name'];
        $avatar_size = $_FILES['avatar']['size'] . "<br/>";
        $avatar_type = $_FILES['avatar']['type'] . "<br/>";
        $avatar_ext = pathinfo($avatar_name, PATHINFO_EXTENSION);
        if (!empty($avatar_name)) {
            if ($avatar_size <= 1000000) {
                echo " عفواً لكن حجم الصورة كبير جداً ";
            } else {
                if ($avatar_ext == 'jpg' || $avatar_ext == 'jpeg' || $avatar_ext == 'png') {
                    $final_file = ROOT_URL . "/" . "upload/";
                    $upload = move_uploaded_file($avatar_tmpname, $final_file);
                    if ($upload) echo "تم تحميل الصورة بنجاح";
                } else {
                    echo  " الصورة المحملة يجب أن تكون بتنسيق  jpg,jpeg,png";
                }
            }
        } else {
            echo "فضلاً اختر الصورة المراد رفعها";
        }
    }


    public function profile()
    {
        $op  = new Khas();
        if (isset($_POST['edit_usr_info'])) {
            if ($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } elseif (!$op->is_email($_POST['user_email_edit'])) {
                $_SESSION['msg'] = NOT_EMAIL;
            } else {
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name",  $_POST['user_name_edit']);
                $this->bind(":email", $_POST['user_email_edit']);
                $this->bind(":id", $_SESSION['log_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        if (isset($_POST['edit_usr_pass'])) {
            if ($_POST['user_name_edit'] == '' || empty($_POST['user_name_edit']) || is_null($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } elseif (is_numeric($_POST['user_name_edit'])) {
                $_SESSION['msg'] =  ERR_NUMBER;
            } elseif (!$op->is_email($_POST['user_email_edit'])) {
                $_SESSION['msg'] = NOT_EMAIL;
            } else {
                $this->query("UPDATE users SET user_name=:user_name,email=:email WHERE usrid=:id");
                $this->bind(":user_name",  $_POST['user_name_edit']);
                $this->bind(":email", $_POST['user_email_edit']);
                $this->bind(":id", $_SESSION['log_id']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
        }
        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }



    public function profileupdate()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['user_name_edit'] == '' || empty($post['user_name_edit']) || is_null($post['user_name_edit'])) {
            $_SESSION['msg'] =  ERR_EMPTY;
        } elseif (is_numeric($post['user_name_edit'])) {
            $_SESSION['msg'] =  ERR_NUMBER;
        } else {
            $this->query('UPDATE users SET  user_name= :user_name_edit,user_code= :user_code_edit,active= :active_edit WHERE usrid=:id');
            $this->bind(':user_name_edit',  $post['user_name_edit']);
            $this->bind(':user_code_edit',  $post['user_code_edit']);
            $this->bind(':active_edit',  $post['selected_value']);
            $this->bind(':id',  $_GET['id']);
            $do_edit = $this->execute();
            $_SESSION['msg'] =  SUCCESS;
            header("refresh:1;url=" . ROOT_URL . '/user');
            // header( "refresh:1;url=".path  );
        }

        $this->query('SELECT * FROM users WHERE usrid=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }


    public function usrRole()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            if (empty($post['usrRol'])) {
                $_SESSION['msg'] =  ERR_EMPTY;
            } else {
                date_default_timezone_set('Asia/Kuwait');
                $reg_date = date('Y-m-d');
                $this->query("INSERT INTO usr_rol(role, home, student, department, section, group, level, subject, exams, finance, todolist, user, myaccount) VALUES (:role,:home, :student, :department, :section, :group, :level, :subject, :exams, :finance, :todolist, :user, :myaccount)");
                $this->bind(':role', $post['role']);
                $this->bind(':home', $post['home']);
                $this->bind(':student', $post['student']);
                $this->bind(':department', $post['department']);
                $this->bind(':section', $post['section']);
                $this->bind(':group', $post['group']);
                $this->bind(':level', $post['level']);
                $this->bind(':subject', $post['subject']);
                $this->bind(':exams', $post['exams']);
                $this->bind(':finance', $post['finance']);
                $this->bind(':todolist', $post['todolist']);
                $this->bind(':user', $post['user']);
                $this->bind(':myaccount', $post['myaccount']);
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/user');
            }
        }
    }

    /**
     * here we can get folder name from usr_rol session  
     * @param string $fun 
     *  
     */

    public function userrols()
    {
        $op = new Khas();
        if (isset($_GET['info']) && isset($_GET['userid'])) {
            $arr = $_POST;
            unset($arr['btn-']);
            $b = array_keys($arr);
            $values = implode(",", $b);
            if (strlen($values) > 0) {
                if (!$op->chk_if_user_rol_pages_in($_GET['userid'], $_GET['info'])) {
                    $this->query("INSERT INTO auth_pages (main_pages,sub_pages,usrid) VALUES (:main_pages,:sub_pages,:usrid) ");
                    $this->bind(":main_pages",  $_GET['info']);
                    $this->bind(":sub_pages", $values);
                    $this->bind(":usrid", $_GET['userid']);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                } else {
                    $this->query("UPDATE auth_pages SET  sub_pages=:sub_pages  WHERE main_pages=:main_pages AND usrid=:usrid");
                    $this->bind(":sub_pages", $values);
                    $this->bind(":main_pages",  $_GET['info']);
                    $this->bind(":usrid", $_GET['userid']);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                }
            }
        }

        if (isset($_GET['info']) && isset($_GET['userid']) && isset($_GET['act']) && $_GET['act'] == 'reset') {
            $this->query("DELETE FROM  auth_pages   WHERE main_pages=:main_pages AND usrid=:usrid");
            $this->bind(":main_pages",  $_GET['info']);
            $this->bind(":usrid", $_GET['userid']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
    }

    public function usrsectanddep()
    {
        
        if (isset($_POST['seledulev_id'])) {
            header("refresh:0;url=" . ROOT_URL . "/user/usrsectanddep?userid=".$_GET['userid']."&edulev_id=" . $_POST['edulev_id']);
        }

        if(isset($_POST['add_roles'])){
           $ar = explode("," , $_REQUEST['services']);
           foreach($ar as $item){
               if($this->chk_usr_role_before_insert($_GET['userid'],    $item)){
                    continue;
               }else{
                    $this->query("INSERT INTO  auth_roles (   usrid ,     prog_id ) VALUES (:usrid   ,:prog_id)");
                    $this->bind(":usrid" , $_GET['userid'] );
                    $this->bind(":prog_id", $item);
                    $this->execute();   
               }
               
           }
        }

        if (isset($_GET['edulev_id'])) :
            $this->query("SELECT * FROM programs edulev_id=:id");
            $this->bind(":id", $_GET['edulev_id']);
            $row = $this->resultSet();
            return $row;
          
        endif;

        
    }


    public function chk_usr_role_before_insert(int $usrid, int  $prog_id)
    {
        $op = new Khas();
        $ar = $op->chk_if_user_rol_in($usrid,   $prog_id);
        if ($ar) {
            return true ;
        }
    }
}
