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
                    echo '<li class="list-group-item w-100  rounded-0 text-right  p-1" style="background-color:'.$this->active_navbar($kay).'"  id="' . $kay . '"> <a href="' . ROOT_URL . '/' . $kay . '" class="text-white font-weight-bold w-100" >' . $val . '</a> </li>';
                }
            } else {
                echo 'Sorry';
                die;
            }
        } else {
            die;
        }
    }
    /**
     * here we can change background color of active navabar 
     * @param string $nav
     */

    public function active_navbar(string $nav)
    {
        if ($_GET['controller'] == $nav) {
            return "#1AB196";
        }else{
            return "#344352";
        }
    }



    public function   emptylog_role()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "user"          => "العضوية",
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
            "section"       => "الأقسام الدراسية",
            "group"         => "المجموعات",
            "programs"         => "البرامج الدراسية",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "exams"         => "الإختبارات",
            "finance"       => "المالية",
            "courses"       => "الدورات",
            "coulesson"       => "دروس الدورة",
            "settings"      => "الإعدادات",
            "todolist"      => "المهام",
            "user"          => "العضوية",
            "baninfo"         => "حسابات بنكية",
            "filemanager"         => "مدير الملفات",
            "usrprofile"     => "معلومات العضوية" 
             
        );

        return $this->arr;
    }

    public function   Director_of_the_Department()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "employees"       => "الموظفين",
            "edulevel"       => "المراحل الدراسية",
            "faculty"       => "الكليات",
            "academics"     => "الأقسام الأكاديمية",
            "department"    => "الفترات",
            "section"       => "الأقسام الدراسية",
            "group"         => "المجموعات",
            "programs"         => "البرامج الدراسية",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "exams"         => "الإختبارات",
            "finance"       => "المالية",
            "courses"       => "الدورات",
            "coulesson"       => "دروس الدورة",
            "usrprofile"     => "معلومات العضوية" 
        );

        return $this->arr;
    }
    

    public function   admin()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "faculty"       => "الكليات",
            "department"    => "الفترات",
            "section"       => "الأقسام الدراسية",
            "group"         => "المجموعات",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "settings"      => "الإعدادات",
            "exams"         => "الإختبارات",
            "courses"         => "الدورات",
            "todolist"      => "المهام",
            "user"          => "العضوية",
            "filemanager"  => "مدير الملفات",
            "usrprofile"     => "معلومات العضوية",

        );
        return $this->arr;
    }


    public function   students_Affairs()
    {
        $this->arr = array(
            "home"          => "الرئيسية",
            "student"       => "الطلاب",
            "department"    => "الفترات",
            "section"       => "الأقسام الدراسية",
            "group"         => "المجموعات",
            "level"         => "المستوى",
            "subject"       => "المواد",
            "exams"         => "الإختبارات",
            "todolist"      => "المهام",
            "usrprofile"     => "معلومات العضوية"
        );
        return $this->arr;
    }
    public function   exams()
    {
        $this->arr =  array(
            "home"          => "الرئيسية",
            "exams"         => "الإختبارات",
            "todolist"      => "المهام",
            "usrprofile"     => "معلومات العضوية"
        );
        return $this->arr;
    }
    public function   finance()
    {
        $this->arr =  array(
            "home"          => "الرئيسية",
            "finance"       => "المالية",
            "todolist"      => "المهام",
            "usrprofile"     => "معلومات العضوية"
        );
        return $this->arr;
    }
 
 
    public function top_menu($fun)
    {
        if (isset($_SESSION['log_role']) || $_SESSION['log_role'] != '') {
            if (method_exists(get_class($this), $fun)) {
                $this->$fun();
                foreach ($this->arr  as $kay => $val) {
                    echo '<a class="nav-link text-white col-6" href="' . ROOT_URL . '/' . $kay . '">' . $val . '</a>';
                }
            } else {
                die('Sorry');
                
            }
        } else {
             die('Sorry');
        }
    }
}

                                 