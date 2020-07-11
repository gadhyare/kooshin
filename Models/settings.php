<?php class settingsModel extends Model
{
    public  $rowss;
    public function Index()
    {
        $this->query('SELECT * FROM settings');
        $rows = $this->resultSet();
        return $rows;
    }


    public function setemail(){
        if(isset($_POST['updateBtn'])){
            if( ! empty($_POST['em_Host']) && ! empty($_POST['em_userName']) && ! empty($_POST['em_userPass']) && ! empty($_POST['em_SmtpSecure']) && ! empty($_POST['em_Port']) && ! empty($_POST['em_site']))    {
                $this->query("UPDATE emailset SET em_Host=:em_Host,em_userName=:em_userName,em_userPass=:em_userPass,em_SmtpSecure=:em_SmtpSecure,em_Port=:em_Port,em_site=:em_site");
                $this->bind(":em_Host" , $_POST['em_Host'] );
                $this->bind(":em_userName" , $_POST['em_userName'] );
                $this->bind(":em_userPass" , $_POST['em_userPass'] );
                $this->bind(":em_SmtpSecure" , $_POST['em_SmtpSecure'] );
                $this->bind(":em_Port" , $_POST['em_Port'] );
                $this->bind(":em_site" , $_POST['em_site'] );
                $this->execute();
                $_SESSION['msg'] = SUCCESS;
            }
            else{
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
        $this->query("SELECT * FROM emailset");
        $row = $this->resultSet();
        return $row;
    }


    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['updateSiteInfo'])) {

            $this->query('UPDATE settings SET  siteName= :siteName,siteDisc=:siteDisc,siteAddr=:siteAddr,sitePhones=:sitePhones,siteEmail= :siteEmail ,siteUrl= :siteUrl ,siteTags= :siteTags,siteStatus= :siteStatus,siteColsemsg= :siteColsemsg ');
            $this->bind(':siteName',  $post['siteName']);
            $this->bind(':siteDisc',  $post['siteDisc']);
            $this->bind(':siteAddr',  $post['siteAddr']);
            $this->bind(':sitePhones',  $post['sitePhones']);
            $this->bind(':siteEmail',  $post['siteEmail']);
            $this->bind(':siteUrl',  $post['siteUrl']);
            $this->bind(':siteTags',  $post['siteTags']);
            $this->bind(':siteStatus',  $post['siteStatus']);
            $this->bind(':siteColsemsg',  $post['siteColsemsg']);
            $this->execute();
            $_SESSION['msg'] = SUCCESS;
        }
        $this->query('SELECT * FROM settings');
        $rows = $this->resultSet();
        return $rows;
    }


    public function export()
    {
        if (isset($_POST["export"])) {
            $connection = mysqli_connect(GDB_HOST, GDB_USER, GDB_PASS, GDB_NAME);
            $tables = array();
            $result = mysqli_query($connection, "SHOW TABLES");
            while ($row = mysqli_fetch_row($result)) {
                $tables[] = $row[0];
            }

            $return = '';
            foreach ($tables as $table) {
                $result = mysqli_query($connection, "SELECT * FROM " . $table);
                $num_fields = mysqli_num_fields($result);

                $return .= 'DROP TABLE ' . $table . ';';
                $row2 = mysqli_fetch_row(mysqli_query($connection, "SHOW CREATE TABLE " . $table));
                $return .= "\n\n" . $row2[1] . ";\n\n";

                for ($i = 0; $i < $num_fields; $i++) {
                    while ($row = mysqli_fetch_row($result)) {
                        $return .= "INSERT INTO " . $table . " VALUES(";
                        for ($j = 0; $j < $num_fields; $j++) {
                            $row[$j] = addslashes($row[$j]);
                            if (isset($row[$j])) {
                                $return .= '"' . $row[$j] . '"';
                            } else {
                                $return .= '""';
                            }
                            if ($j < $num_fields - 1) {
                                $return .= ',';
                            }
                        }
                        $return .= ");\n";
                    }
                }
                $return .= "\n\n\n";
            }

            //save file

            $NowDate = date("y-m-d-h-i-sa");

            $currentFileName = "gollis/filesdir/backup-$NowDate.sql";

            $handle = fopen($_SERVER["DOCUMENT_ROOT"] . "/" .  $currentFileName, "w+");
            fwrite($handle, $return);

            $op = new Khas();

            setcookie("currentSqlFile", "", time() - 3600);

            setcookie("currentSqlFile", "filesdir/backup-$NowDate.sql", time() + 500);


            $_SESSION['msg']  = SUCCESS_EXPORT_DATABASE;
        }
    }


    public function delexportfile()
    {
        if (isset($_POST['DelFiles'])) {
            array_map('unlink', glob( getcwd(). "/filesdir/*.sql"));
            $_SESSION['msg'] = SUCCESS;
        }
    }

    public function socialmedia()
    {

        $this->query("SELECT * FROM socialmedia");
        $rows = $this->resultSet();

        return $rows;
    }


    public function socialmediadd()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        if (isset($_POST['socialmediadd'])) {
            if (!empty($post['socialmedia_name']) || !empty($post['socialmedia_link']) || !empty($post['socialmedia_logo'])) {
                $this->query("INSERT INTO socialmedia(socialmedia_name, socialmedia_link,socialmedia_logo, active) VALUES (:socialmedia_name, :socialmedia_link ,:socialmedia_logo , :active)");
                $this->bind(":socialmedia_name", $post['socialmedia_name']);
                $this->bind(":socialmedia_link", $post['socialmedia_link']);
                $this->bind(":socialmedia_logo", $post['socialmedia_logo']);
                $this->bind(":active", $post['active']);
                $this->execute();
                if ($this->lastInsertId()) {
                    $_SESSION['msg'] = SUCCESS;
                }
            } else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
    }


    public function socialmediadel()
    {

        if (isset($_POST['delete_items'])) {
            $this->query('DELETE FROM socialmedia WHERE socialmedia_id=:id');
            $this->bind(':id',  $_GET['id']);
            $this->execute();
            header('refresh:0.1;url=' . ROOT_URL . '/settings/socialmedia');
        }
        $this->query('SELECT * FROM socialmedia WHERE socialmedia_id=:id');
        $this->bind(':id',  $_GET['id']);
        $select_to_delete = $this->resultSet();;
        return $select_to_delete;
    }






    public function socialmediaedit()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['socialmediaedite'])) {
            if (!empty($post['socialmedia_name']) || !empty($post['socialmedia_link']) || !empty($post['socialmedia_logo'])) {
                $this->query("UPDATE socialmedia SET socialmedia_name = :socialmedia_name, socialmedia_link=:socialmedia_link,socialmedia_logo=:socialmedia_logo, active=:active   WHERE socialmedia_id=:id");
                $this->bind(":socialmedia_name", $post['socialmedia_name']);
                $this->bind(":socialmedia_link", $post['socialmedia_link']);
                $this->bind(":socialmedia_logo", $post['socialmedia_logo']);
                $this->bind(":active", $post['active']);
                $this->bind(':id',  $_GET['id']);
                $do_edit = $this->execute();
                $_SESSION['msg'] = SUCCESS;
                header("refresh:1;url=" . ROOT_URL . '/settings/socialmedia');
            }else {
                $_SESSION['msg'] = ERR_EMPTY;
            }
        }
        $this->query('SELECT * FROM socialmedia WHERE socialmedia_id=:id');
        $this->bind(':id',  $_GET['id']);
        $rom = $this->resultSet();;
        return $rom;
    }
    /**
     * her we can manage all files 
     */
     public function filemanager(){

     }
}
