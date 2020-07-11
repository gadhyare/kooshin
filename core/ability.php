<?php class Abillity
{
    public $userName;
    public $userApl;
    public $get_usr_rol;
    public $arr = [];

    public function __construct()
    {
        $this->userApl  = (isset($_SESSION['log_role'])) ? $_SESSION['log_role'] : "user";
        $this->userName = (isset($_SESSION['log_user'])) ? $_SESSION['log_user'] : '';
    }

    public function chkLink($val)
    {
        $log_role = isset($_SESSION['log_role']) ? $_SESSION['log_role'] : 'emptylog_role';
        if ($log_role ) {
            $b = $log_role;
            $t = $this->$b();
            if (array_key_exists($val, $this->arr)) {
                return true;
            } else {
                return false;
            }
            return;
        }
    }


    public function chkapli(){
        if( isset($_SESSION['log_role'])  && $_SESSION['log_role'] == "manager" ){
            return true;
        } else{
            return false;
        }
        return ;
    }

    public  function get_menu($fun)
    {
        if (isset($_SESSION['log_role']) || $_SESSION['log_role'] != '') {
            if (method_exists(get_class($this), $fun)) {
                $this->$fun();
                foreach ($this->arr  as $kay => $val) {
                    echo '<li class="list-group-item bg-dark  rounded-0 text-right  p-2" id="' . $kay . '"> <a href="' . ROOT_URL . '/' . $kay . '" class="text-white font-weight-bold" >' . $val . '</a> </li>';
                }
            } else {
                echo 'Sorry';
                die;
            }
        } else {
            die;
        }
    }

    public function   emptylog_role()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "user"          => "المستخدمين",
        );
    }


    public function   manager()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "employees"       => "الموظفين",
            "edulevel"       => "المراحل الدراسية",
            "faculty"       => "الكليات",
            "academics"     => "الأقسام الأكاديمية",
            "department"    => "الفترات",
            "section"       => "الأقسام",
            "group"         => "المجموعات",
            "programs"         => "البرامج",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "exams"         => "الإختبارات",
            "finance"       => "المالية",
            "settings"      => "الإعدادات",
            "todolist"      => "المهام",
            "user"          => "المستخدمين",
            "links"         => "الروابط",
            "baninfo"         => "حسابات بنكية",
            "filemanager"         => "مدير الملفات",
            "usrprofile"     => "معلومات العضوية" 
             
        );
    }

    public function   admin()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "faculty"       => "الكليات",
            "department"    => "الفترات",
            "section"       => "الأقسام",
            "group"         => "المجموعات",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "settings"      => "الإعدادات",
            "exams"         => "الإختبارات",
            "todolist"      => "المهام",
            "user"          => "المستخدمين",
            "usrprofile"     => "معلومات العضوية",

        );
    }


    public function   students_Affairs()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "department"    => "الفترات",
            "section"       => "الأقسام",
            "group"         => "المجموعات",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "exams"         => "الإختبارات",
            "todolist"      => "المهام",
            "user"          => "المستخدمين",
            "usrprofile"     => "معلومات العضوية"
        );
    }


    public function   finance()
    {
        $this->arr =  array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "finance"       => "المالية",
            "todolist"      => "المهام",
            "usrprofile"     => "معلومات العضوية"
        );
    }
    public function   teacher()
    {
    }
    public function   parent()
    {
    }
    public function   student()
    {
        $this->arr = array(
            "usrprofile"     => "معلومات العضوية"
        );
        if (in_array($_GET['controller'], $this->arr)) :
            foreach ($this->arr  as $kay => $val) {
                echo '<li class="list-group-item bg-dark  rounded-0 text-right " id="' . $kay . '"> <a href="' . ROOT_URL . '/' . $kay . '" class="text-white font-weight-bold" >' . $val . '</a> </li>';
            } else :
            if ($_GET['controller'] != "home") :
                header('refresh:0;url=' . ROOT_URL . '/home');
                foreach ($this->arr  as $kay => $val) {
                    echo '<li class="list-group-item bg-dark  rounded-0 text-right " id="' . $kay . '"> <a href="' . ROOT_URL . '/' . $kay . '" class="text-white font-weight-bold" >' . $val . '</a> </li>';
                }
            endif;
        endif;
    }
}
