<?php require_once('Models.php'); ?>
<?php class Khas extends Model
{



    public function breadcrumb()
    {
        $controller_breadcrumb = $_GET['controller'];
        $action_breadcrumb = $_GET['action'];
        if (isset($action_breadcrumb)) {
            $link  = "<a href='" . $this->siteSetting('siteUrl') . $controller_breadcrumb . "' class='text-dark'>" . $controller_breadcrumb . "</a>/" . $action_breadcrumb;
            $_SESSION['link'] = $link;
        }
    }


    public function lang($attr)
    {
        $lan_se = (isset($_SESSION['lan_se'])) ? $_SESSION['lan_se'] : "en";
        $contents = file_get_contents(DIR . SB . "lang" . SB . $lan_se . ".json");
        $results = json_decode($contents);

        if (!empty($results->$attr)) {
            return $results->$attr;
        } else {
            return  $attr;
        }
    }


    public function get_main_style_sheet($css = "")
    {
        if (isset($_SESSION['lan_se'])) {
            if ($_SESSION['lan_se'] ==  "en") {
                $css = "ltr";
            } else {
                $css = $this->lang("dir");
            }
            return $css;
        }
    }


    
    public function is_email($email)
    {
        $chemail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($chemail) {
            return true;
        } else {
            return false;
        }
    }


    public function siteSetting($val)
    {
        $this->query('SELECT * FROM settings');
        $settings = $this->resultSet();

        foreach ($settings as $setting) {
        }

        return $setting[$val];
    }

    public function setPosts($val)
    {
        if (isset($_POST[$val])) {
            return $_POST[$val];
        } else {
            return null;
        }
    }

    public function setSelectValue($sel)
    {
    }
    public function get_relType()
    {
        $this->query('SELECT * FROM department WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $fd = ($dc === 1) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fd; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getLastStuInfo()
    {
        $this->query("SELECT * FROM stu_info ORDER BY stu_id DESC LIMIT 2");
        $row = $this->resultSet();
        if ($row) {
            return  $this->resultSet();
        }
    }

    public function getLastfee_trans()
    {
        $this->query("SELECT * FROM fee_trans ORDER BY sta_id DESC LIMIT 3");
        $row = $this->resultSet();
        if ($row) {
            return  $this->resultSet();
        }
    }


    public function FullProgInfo()
    {

        $this->query("SELECT * FROM programs  ORDER BY edulev_id ASC");
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['prog_id']; ?>"><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>

        <?php
        }
    }


    public function FullSelProgInfo($val)
    {

        $this->query("SELECT * FROM programs");
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['prog_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['prog_id']; ?>" <?php echo $sel; ?>><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>
        <?php
        }
    }

    public function FullSelProgInfotxt($val)
    {

        $this->query("SELECT * FROM programs");
        $menu = $this->resultSet();
   
        foreach ($menu as $bv) {  
 
           return  $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ;
       
        }
    }
    public function FullSelProgInfobyEdulevid($val)
    {

        $this->query("SELECT * FROM programs WHERE edulev_id=:id");
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>

            <option value="<?php echo $bv['prog_id']; ?>"><?php echo $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']) ?> </option>
        <?php
        }
    }


    public function FulltextProgInfo($id)
    {

        $this->query("SELECT * FROM programs WHERE prog_id=:id");
        $this->bind(":id", $id);
        $row = $this->resultSet();
        if ($row) {
            foreach ($row as $item) {
                return    $this->GetSeleduleveltxt($item['edulev_id']) . ' - ' . $this->GetSelfacultytxt($item['fac_id']) . ' - ' . $this->GetSelacademicstxt($item['academics_id']);
            }
        }
    }


    public function GetSelProgInfoTxt($id)
    {
        $this->query("SELECT * FROM programs WHERE prog_id=:id");
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return    $this->GetSeleduleveltxt($bv['edulev_id']) . ' - ' . $this->GetSelfacultytxt($bv['fac_id']) . ' - ' . $this->GetSelacademicstxt($bv['academics_id']);
        }
    }

    public function getSelrelType($val)
    {
        $this->query('SELECT * FROM strurel');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['Rel_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['Rel_id']; ?>" <?php echo $sel; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getStuName($val)
    {
        if (isset($_SESSION['stu_id_info'])) {
            $this->query("SELECT * FROM stu_info WHERE  stu_num=:id");
            $this->bind(":id", $_SESSION['stu_id_info']);
            $stuNames = $this->resultSet();
            foreach ($stuNames as $stuName) {
            }
            return  $stuName[$val];
        }
    }

    public function getFeeTansByInvoiceId($val)
    {

        $this->query("SELECT *   FROM fee_trans     WHERE  Invoice_id=:Invoice_id");
        $this->bind(":Invoice_id", $val);
        $Invoice  = $this->resultSet();
        if ($Invoice) {
            return $this->resultSet();
        }
    }

    public function getStuNameById($val)
    {

        $this->query("SELECT * FROM stu_info WHERE  stu_id=:id");
        $this->bind(":id", $val);
        $stuNames = $this->resultSet();
        foreach ($stuNames as $stuName) {
            return   $stuName['StuName'];
        }
    }


    public function getStuInfoByStunm($val, $data)
    {
        $this->query("SELECT * FROM stu_info WHERE  stu_num=:id");
        $this->bind(":id", $val);
        $stuNames = $this->resultSet();
        foreach ($stuNames as $stuName) {
            return  $stuName[$data];
        }
    }



    public function getStuInfoById($val, $data)
    {
        $this->query("SELECT * FROM stu_info WHERE  stu_id=:id");
        $this->bind(":id", $val);
        $stuNames = $this->resultSet();
        if ($stuNames) {
            foreach ($stuNames as $stuName) {
                return $stuName[$data];
            }
        } else {
            return "--";
        }
    }

    public function getPayReso()
    {
        $this->query('SELECT * FROM paymentres');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['Pay_Res_id']; ?>"><?php echo $bv['PaymentRes']; ?></option>
        <?php
        }
    }

    public function getPayResoTxt($val)
    {
        $this->query('SELECT * FROM paymentres WHERE Pay_Res_id=:id');
        $this->bind(":id", $val);
        $menus = $this->resultSet();
        foreach ($menus as $bvs) {
            echo $bvs['PaymentRes'];
        }
    }

    public function getSelPayReso($val)
    {
        $this->query('SELECT * FROM paymentres');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['Pay_Res_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['Pay_Res_id']; ?>" <?php echo $sel; ?>><?php echo $bv['PaymentRes']; ?></option>
        <?php
        }
    }


    public function getFeeamout($prog_id, $Pay_Res_id)
    {
        $this->query("SELECT * FROM feeinfo WHERE prog_id=:prog_id AND Pay_Res_id=:Pay_Res_id AND active=1");
        $this->bind(":prog_id", $prog_id);
        $this->bind(":Pay_Res_id", $Pay_Res_id);
        $row = $this->resultSet();
        foreach ($row as $feeInfo) {
        }
        return $feeInfo['fee_amount'];
    }



    public function get_department()
    {
        $this->query('SELECT * FROM department WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $fd = ($dc === 1) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['dep_id']; ?>" <?php echo $fd; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getSelDepartment($val)
    {
        $this->query('SELECT * FROM department WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['dep_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['dep_id']; ?>" <?php echo $sel; ?>><?php echo $bv['department_name']; ?></option>
        <?php
        }
    }


    public function getSelDepartmentTxt($val)
    {
        $this->query('SELECT * FROM department WHERE dep_id=:id ');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            echo $bv['department_name'];
        }
    }

    public function GetSelProgram($val)
    {
        $this->query('SELECT * FROM programs WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['prog_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['prog_id']; ?>" <?php echo $sel; ?>><?php echo $bv['prog_name']; ?></option>
        <?php
        }
    }

    public function Getedulevel()
    {
        $this->query('SELECT * FROM edulevel WHERE active=1');
        $row = $this->resultSet();
        foreach ($row as $item) {
            echo '<option value="' . $item['edulev_id'] . '" >' . $item['edulev_name'] . '</option>';
        }
    }


    public function GetSeledulevel($id)
    {
        $this->query('SELECT * FROM edulevel');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($id === $bv['edulev_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['edulev_id']; ?>" <?php echo $sel; ?>><?php echo $bv['edulev_name']; ?></option>
        <?php
        }
    }

    public function GetSeleduleveltxt($id)
    {
        $this->query('SELECT * FROM edulevel WHERE edulev_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return  $bv['edulev_name'];
        }
    }

    public function GetSellevels($val)
    {
        $this->query('SELECT * FROM levels  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['lev_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['lev_id']; ?>" <?php echo $sel; ?>><?php echo $bv['level_name']; ?></option>
        <?php
        }
    }

    public function GetSellevelsTxt($val)
    {
        $this->query('SELECT * FROM levels  WHERE lev_id=:id');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) {
            return $bv['level_name'];
        }
    }


    public function GetSelfaculty($val)
    {
        $this->query('SELECT * FROM faculty  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['fac_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['fac_id']; ?>" <?php echo $sel; ?>><?php echo $bv['fac_name']; ?></option>
        <?php
        }
    }

    public function GetSelfacultytxt($id)
    {
        $this->query('SELECT * FROM faculty  WHERE fac_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return $bv['fac_name'];
        }
    }


    public function GetSelgroups($val)
    {
        $this->query('SELECT * FROM groups  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['grp_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['grp_id']; ?>" <?php echo $sel; ?>><?php echo $bv['group_name']; ?></option>
        <?php
        }
    }

    public function GetSelgroupsTxt($val)
    {
        $this->query('SELECT * FROM groups  WHERE grp_id=:id ');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            echo $bv['group_name'];
        }
    }


    public function GetSelFeeinfo($id, $val)
    {
        $this->query('SELECT * FROM paymentinfo  WHERE Invoice_id=:id ');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
        }
        echo $bv[$val];
    }


    public function getStuInfoByInvoiceNum($id)
    {
        $this->query('SELECT * FROM paymentinfo  WHERE Invoice_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
        }
        return  $bv['stu_id'];
    }


    public function GetSelacademics($val)
    {
        $this->query('SELECT * FROM academics  WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['academics_id']) ? 'selected' : ''; ?>
            <?php $dc++; ?>
            <option value="<?php echo $bv['academics_id']; ?>" <?php echo $sel; ?>><?php echo $bv['academics']; ?></option>
            <?php
        }
    }

    public function GetSelacademicstxt($id)
    {
        $this->query('SELECT * FROM academics  WHERE academics_id=:id');
        $this->bind(":id", $id);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            return  $bv['academics'];
        }
    }

    public function getprog_id($val)
    {

        $this->query("SELECT * FROM subject WHERE prog_id=:prog_id AND active = 1");
        $this->bind(":prog_id", $val);
        $menu = $this->resultSet();
        if (count($menu) > 0) :
            foreach ($menu as $bv) : ?>
                <option value="<?php echo $bv['id']; ?>"><?php echo $bv['subject_name']; ?></option>
            <?php
            endforeach;
        else :
            echo "<div class='alert alert-dangert'>لا توجد مواد</div>";
        endif;
    }



    public function get_section()
    {
        $this->query('SELECT * FROM section WHERE active=1 ');
        $menu = $this->resultSet();
        $sc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fs = ($sc === 1) ? 'selected' : ''; ?>
            <?php $sc++; ?>
            <option value="<?php echo $bv['sec_id']; ?>" <?php echo $fs; ?>><?php echo $bv['section_name']; ?></option>
        <?php
        }
    }


    public function getActiveInfo($val)
    {
        if ($val == 1) {
            return "مفعل";
        } else {
            return "غير مفعل";
        }
    }


    public function getSelesection($val)
    {
        $this->query('SELECT * FROM section WHERE active=1 ');
        $menu = $this->resultSet();
        $dc = 1;

        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['sec_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['sec_id']; ?>" <?php echo $sel; ?>><?php echo $bv['section_name']; ?></option>
        <?php
        }
    }

    public function getSelesectionTxt($val)
    {
        $this->query('SELECT * FROM section WHERE sec_id=:id');
        $this->bind(":id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            $sel = ($val == $bv['sec_id']) ? 'selected' : '';
            echo $bv['section_name'];
        }
    }

    public function get_group()
    {
        $this->query('SELECT * FROM groups WHERE active=1 ');
        $menu = $this->resultSet();
        $gc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fg = ($gc === 1) ? 'selected' : ''; ?>
            <?php $gc++; ?>
            <option value="<?php echo $bv['grp_id']; ?>" <?php echo $fg; ?>><?php echo $bv['group_name']; ?></option>
        <?php
        }
    }

    public function get_level()
    {
        $this->query('SELECT * FROM levels WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['lev_id']; ?>" <?php echo $fl; ?>><?php echo $bv['level_name']; ?></option>
        <?php
        }
    }

    public function get_subject()
    {
        $this->query('SELECT * FROM subject WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name'] . ' | ' . $bv['subject_code']; ?></option>

        <?php
        }
    }

    public function getsubjectByPro($id)
    {
        $this->query("SELECT * FROM subject WHERE  ");
        $menu = $this->resultSet();
    }

    public function get_ex_level()
    {
        $this->query('SELECT * FROM levels WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <option value="<?php echo $bv['id']; ?>"><?php echo $bv['level_name']; ?></option>
        <?php
        }
    }
    public function get_ex_subject()
    {
        $this->query('SELECT * FROM subject WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name']; ?></option>

        <?php
        }
    }


    public function getSeleExsubject($val)
    {
        $this->query('SELECT * FROM subject WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['sub_id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name']; ?></option>
        <?php
        }
    }

    public function getSelExsubTxt($val)
    {
        $this->query('SELECT * FROM subject WHERE  sub_id=:val');
        $this->bind(":val", $val);
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) {
        }

        return $bv['subject_name'];
    }


    public function getSeleExsubjectByProgId($val)
    {
        $this->query('SELECT * FROM subject WHERE prog_id=:prog_id AND  active=1 ');
        $this->bind(":prog_id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $fl = ($bv['sub_id'] == 1) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['sub_id']; ?>" <?php echo $fl; ?>><?php echo $bv['subject_name']; ?></option>
        <?php
        }
    }

    public function getSelExsubByProgIdTxt($prog_id, $sub_id)
    {
        $this->query('SELECT * FROM subject WHERE   prog_id prog_id=:prog_id AND   sub_id=:sub_id');
        $this->bind(":prog_id", $prog_id);
        $this->bind(":sub_id", $sub_id);
        $menu = $this->resultSet();
        if ($menu) {
            foreach ($menu as $bv) {
                return $bv['subject_name'];
            }
        }
    }


    public function getSelpaymentres($val)
    {
        $this->query('SELECT * FROM paymentres WHERE active=1 ');
        $menu = $this->resultSet();
        foreach ($menu as $bv) { ?>
            <?php $sel = ($val == $bv['Pay_Res_id']) ? 'selected' : ''; ?>
            <option value="<?php echo $bv['Pay_Res_id']; ?>" <?php echo $sel; ?>><?php echo $bv['PaymentRes']; ?></option>
        <?php
        }
    }


    public function getSelpaymentrestxt($val)
    {
        $this->query('SELECT * FROM paymentres WHERE Pay_Res_id=:Pay_Res_id AND  active=1 ');
        $this->bind(":Pay_Res_id", $val);
        $menu = $this->resultSet();
        foreach ($menu as $bv) {
            echo $bv['PaymentRes'];
        }
    }

    public function get_students_number()
    {
        $this->query('SELECT * FROM stu_info WHERE active=1 ');
        $menu = $this->resultSet();
        $lc = 1;
        foreach ($menu as $bv) { ?>
            <?php $fl = ($lc === 1) ? 'selected' : ''; ?>
            <?php $lc++; ?>
            <option value="<?php echo $bv['id']; ?>" <?php echo $fl; ?>><?php echo $bv['StuNum'] . ' | ' . $bv['StuName']; ?></option>
        <?php
        }
    }

    public function get_user_status()
    {
        $this->query('SELECT * FROM users');
        $user_st = $this->resultSet();
        $usr_st = 1;
        foreach ($user_st as $st) { ?>
            <?php $fl = ($usr_st === 1) ? 'selected' : ''; ?>
            <?php $usr_st++; ?>
            <option value="1"> مفعل </option>
            <option value="2"> غير مفعل </option>
            <?php
        }
    }


    public function get_last_stu_num()
    {
        $this->query('SELECT * FROM stu_info');
        $results = $this->resultSet();
        if ($this->rowCount() > 0) {
            foreach ($results as $rows) {
            }
            return  $rows['stu_id'] + 1;
        } else {
            return  1;
        }
    }



    /**
     * here we can get number of registerd students 
     * 
     */
    public function get_stu_num()
    {
        $this->query('SELECT * FROM stu_info');
        $results = $this->resultSet();
        if ($this->rowCount() > 0) {
            return $this->rowCount();
        } else {
            return  0;
        }
    }

    public function countfaculty()
    {
        $this->query('SELECT COUNT(fac_id) AS  fac_id FROM faculty');
        $rows = $this->resultSet();
        return $rows[0]['fac_id'];
    }


    public function countPrograms()
    {
        $this->query('SELECT COUNT(prog_id) AS  prog_id FROM programs');
        $rows = $this->resultSet();
        return $rows[0]['prog_id'];
    }

    public function countSection()
    {
        $this->query('SELECT COUNT(sec_id) AS  sec_id FROM section');
        $rows = $this->resultSet();
        return $rows[0]['sec_id'];
    }

    public function countGrp()
    {
        $this->query('SELECT COUNT(grp_id) AS  grp_id FROM groups');
        $rows = $this->resultSet();
        return $rows[0]['grp_id'];
    }


    public function countLev()
    {
        $this->query('SELECT COUNT(lev_id) AS  lev_id FROM levels');
        $rows = $this->resultSet();
        return $rows[0]['lev_id'];
    }

    public function countSub()
    {
        $this->query('SELECT COUNT(sub_id) AS  sub_id FROM subject');
        $rows = $this->resultSet();
        return $rows[0]['sub_id'];
    }



    public function countUsers()
    {
        $this->query('SELECT COUNT(usrid) AS  usrid FROM users');
        $rows = $this->resultSet();
        return $rows[0]['usrid'];
    }


    public function get_last_registed_students()
    {
        $this->query('SELECT * FROM stu_info ORDER BY id DESC LIMIT 10');
        $rows = $this->resultSet();
        return $rows;
    }



    public function PrintSub()
    {
        $this->query('SELECT * FROM  levels limit 3');
        $rows  = $this->resultSet();

        return json_encode($rows);
    }




    public function get_student_rel()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('SELECT * FROM stu_rel  INNER JOIN stu_info ON stu_rel.StuNum =:id');
        $this->bind(':id',  $post['stu_num']);
        $stu_rel_select = $this->resultSet();
        foreach ($stu_rel_select as $relinfo) :

        endforeach;
        echo $relinfo['relname'];;
    }


    public function getSeltudent_rel($val)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $this->query('SELECT * FROM strurel  WHERE stu_id=:id');
        $this->bind(':id',  $val);
        $stu_rel_select = $this->resultSet();
        foreach ($stu_rel_select as $relinfo) :

        endforeach;
        echo $relinfo['relname'];;
    }


    public function showStuRecordLev()
    {
        $id = intval($_GET['id']);
        if ($id) {
            $this->query('SELECT * FROM exams WHERE stu_num =:stu_num');
            $this->bind(':stu_num', $id);
            $this->single();
            $rows = $this->resultSet();
            return $rows;
        }
    }

    public function get_stuLev($id, $prog_id)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $i = 1;
        $x = 1;
        $p = 1;
        $v = 1;
        $subname = 1;
        $sessions = 1;
        $sessionsVal = 1;
        $ty = 1;
        if (isset($_GET['id']) && isset($_GET['prog_id'])) {
            $this->query('SELECT DISTINCT  lev_id FROM exams   WHERE stu_id =:stu_id and prog_id=:prog_id ORDER BY lev_id ASC');
            $this->bind(':stu_id', $id);
            $this->bind(':prog_id', $prog_id);
            $this->single();
            $rows = $this->resultSet();
            $no = 1;
            $mysub = 1;
            foreach ((array) $rows as $stulev) : ?>
                <?php $gettStulev = $this->GetSellevelsTxt($stulev['lev_id']); ?>
                <?php $CurrentLevId = $stulev['lev_id']; ?>


                <table class="table border-0 text-center  m-auto">
                    <tr>
                        <td class="p-1 ">
                            المستوى: <?php echo $gettStulev; ?>
                        </td>
                    </tr>
                </table>

                <table class="print-table text-center   m-auto">
                    <tr>
                        <td class="p-0 text-dark text-center" rowspan="2"> م</td>
                        <td class="p-0 text-dark text-center" rowspan="2"> المادة </td>
                        <td class="p-0 text-dark text-center" colspan="3">
                            الفترة الأولى
                        </td>
                        <td class="p-0 text-dark text-center" colspan="3">
                            الفترة الثاني
                        </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> الحضور </td>
                        <td class="p-0 text-dark text-center" rowspan="2"> المجموع</td>
                        <td class="p-0 text-dark text-center" rowspan="2"> التقدير</td>
                        <?php if ($_GET['action'] == 'stuGpa') : ?>
                            <td class="p-0 text-dark text-center" rowspan="2"> العمليات</td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td class="p-0 text-dark text-center"> الأسئلة</td>
                        <td class="p-0 text-dark text-center"> البحث</td>
                        <td class="p-0 text-dark text-center"> الإختبار</td>
                        <td class="p-0 text-dark text-center"> الأسئلة</td>
                        <td class="p-0 text-dark text-center"> البحث</td>
                        <td class="p-0 text-dark text-center"> الإختبار </td>
                    </tr>
                    <tbody>
                        <?php
                        $this->query('SELECT * FROM exams  WHERE stu_id =:stu_id AND lev_id=:lev_id');
                        $this->bind(':stu_id', $id);
                        $this->bind(':lev_id', $CurrentLevId);
                        $rowss = $this->resultSet();
                        $x = 1;
                        foreach ($rowss as $ecStuLev) :
                            $total =  $ecStuLev['qu1'] + $ecStuLev['as1'] + $ecStuLev['ex1'] + $ecStuLev['qu2'] + $ecStuLev['as2'] + $ecStuLev['ex2'] + $ecStuLev['att']; ?>
                            <?php $exSatuse = ($total < 50) ? 'class ="ex-Failed  "' : ''; ?>
                            <?php $bgexSatuse = ($total < 50) ? 'ex-Failed p-0 rounded-0 ' : 'bg-white p-0 rounded-0  '; ?>
                            <tr>
                                <td class="p-1 text-center" width="5%"> <?php echo $x++; ?> </td>
                                <td class="p-1 text-center" width="15%">
                                    <span style="font-size:80% !important;"> <?php echo $this->getSelExsubTxt($ecStuLev['sub_id']); ?> </span>
                                </td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['qu1']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['as1']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['ex1']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['qu2']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['as2']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['ex2']; ?></td>
                                <td class="p-1 text-center"> <?php echo $ecStuLev['att']; ?></td>
                                <td class="p-1 text-center"> <?php echo $total; ?></td>
                                <td class="p-1 text-center"> <?php echo $this->get_gpa($total); ?></td>
                                <?php if ($_GET['action'] == 'stuGpa') : ?>
                                    <td class="p-1 text-center">
                                        <a href="<?php echo ROOT_URL; ?>/exams/updatestuexam/<?php echo $ecStuLev['ex_id']; ?>/<?php echo $_GET['action']; ?>" target="_blank" class="unique-color-dark  text-white rounded-0  px-1 ml-1 py-0  mt-2"> <i class="fa fa-pencil p-1" aria-hidden="true"></i> </a>
                                        <a href="<?php echo ROOT_URL; ?>/exams/stdelexam/<?php echo $ecStuLev['ex_id']; ?>/<?php echo $_GET['action']; ?>" target="_blank" class="bg-danger  text-white rounded-0  px-1 ml-1 py-0  mt-2"> <i class="fa fa-trash-o p-1" aria-hidden="true"></i> </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach;
                    endforeach;
                    echo '<tbody></table>';
                }
            }



            public function get_stuLevGPA($id, $prog_id)
            {
                $x = 1;
                if (isset($_GET['id']) && isset($_GET['prog_id'])) {
                    $this->query('SELECT DISTINCT  lev_id FROM exams   WHERE stu_id =:stu_id and prog_id=:prog_id ORDER BY lev_id ASC');
                    $this->bind(':stu_id', $id);
                    $this->bind(':prog_id', $prog_id);

                    $rows = $this->resultSet();
                    $no = 1;
                    $mysub = 1;
                    foreach ((array) $rows as $stulev) : ?>
                        <?php $gettStulev = $this->GetSellevelsTxt($stulev['lev_id']); ?>
                        <?php $CurrentLevId = $stulev['lev_id']; ?>
                        <table class="table border-0 text-center  m-auto">
                            <tr>
                                <td class="p-1 ">
                                    المستوى: <?php echo $gettStulev; ?>
                                </td>
                            </tr>
                        </table>
                        <table class="print-table text-center   m-auto">
                            <tr>
                                <td class="p-0 text-dark text-center" rowspan="2"> م</td>
                                <td class="p-0 text-dark text-center" rowspan="2"> المادة </td>
                                <td class="p-0 text-dark text-center" rowspan="2"> كود المادة </td>
                                <td class="p-0 text-dark text-center" rowspan="2"> الدرجة </td>
                                <td class="p-0 text-dark text-center" rowspan="2"> عدد الساعات </td>
                                <td class="p-0 text-dark text-center" rowspan="2"> التقدير </td>
                                <td class="p-0 text-dark text-center" rowspan="2"> الدرجة المعدلة </td>
                                <td class="p-0 text-dark text-center" rowspan="2"> نقاط المادة </td>
                            </tr>
                            <tbody>
                                <?php
                                $this->query('SELECT * FROM exams  WHERE stu_id =:stu_id AND lev_id=:lev_id');
                                $this->bind(':stu_id', $id);
                                $this->bind(':lev_id', $CurrentLevId);
                                $rowss = $this->resultSet();
                                $x = 1;
                                foreach ($rowss as $ecStuLev) :
                                    $total =  $ecStuLev['qu1'] + $ecStuLev['as1'] + $ecStuLev['ex1'] + $ecStuLev['qu2'] + $ecStuLev['as2'] + $ecStuLev['ex2'] + $ecStuLev['att']; ?>
                                    <?php $exSatuse = ($total < 50) ? 'class ="ex-Failed  "' : ''; ?>
                                    <?php $bgexSatuse = ($total < 50) ? 'ex-Failed p-0 rounded-0 ' : 'bg-white p-0 rounded-0  '; ?>
                                    <tr>
                                        <td class="p-1 text-center" width="5%"> <?php echo $x++; ?> </td>
                                        <td class="p-1 text-center" width="15%"><?php echo $this->getSelExsubTxt($ecStuLev['sub_id']); ?> </td>
                                        <td class="p-1 text-center"> <?php echo $ecStuLev['ex_code']; ?></td>
                                        <td class="p-1 text-center"> <?php echo $total; ?></td>
                                        <td class="p-1 text-center"> <?php echo $ecStuLev['ex_crid']; ?></td>
                                        <td class="p-1 text-center"> <?php echo $this->get_gpa($total); ?></td>
                                        <td class="p-1 text-center"> <?php echo  $ecStuLev['sub_gradPoint']; ?></td>
                                        <td class="p-1 text-center"> <?php echo  $ecStuLev['sub_Point']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <tbody>
                        </table>
                        <?php $this->getexamInfo($this->getStuInfoByStunm($_GET['id'], 'stu_id'), $_GET['prog_id'], $stulev['lev_id']); ?>
                <?php
                    endforeach;
                }
            }



            public function  getLevTotal($id, $prog_id, $lev, $val)
            {
                $this->query("SELECT exams.stu_id, count(exams.stu_id) as coStu, exams.prog_id, exams.lev_id, 
                Sum(as1+qu1+ex1+as2+qu2+ex2+att) AS total, 
                Sum(exams.sub_Point) AS sub_Point, Sum(exams.ex_crid) AS ex_crid, Sum(sub_Point)/count(exams.stu_id) AS CRGPA
                FROM exams
                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
            }

            public function  getLevsub_gradPoint($id, $prog_id, $lev, $val)
            {
                $this->query("SELECT exams.stu_id, exams.prog_id, exams.lev_id, Sum(exams.sub_gradPoint)/Sum(exams.ex_crid) AS CRGPA
                FROM exams
                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id
                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
            }

            public function  getLevGrandTotal($id, $prog_id, $lev, $val)
            {
                $this->query("SELECT exams.stu_id, exams.prog_id, exams.lev_id, Sum(exams.sub_Point)/Sum(exams.ex_crid)   AS GGPA
                FROM exams
                GROUP BY exams.stu_id, exams.prog_id, exams.lev_id 
                HAVING (((exams.stu_id)=:stu_id) AND ((exams.prog_id)=:prog_id) AND ((exams.lev_id)<=:lev_id))");
                $this->bind(":stu_id", $id);
                $this->bind(":prog_id", $prog_id);
                $this->bind(":lev_id", $lev);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return $rows[$val];
                } else {
                    echo SUCCESS;
                }
            }
            public function getexamInfo($id, $prog_id, $lev)
            {
                ?>
                <table class="print-table m-auto">
                    <tr>
                        <td class="p-1 alert alert-info">مجموع الدرجات:<?php echo number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'total'), 0, '.', ''); ?> </td>
                        <td class="p-1 alert alert-info">مجموع الساعات: <?php echo number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'ex_crid'), 0, '.', ''); ?></td>
                        <td class="p-1 alert alert-info"> النقاط الفصلية : <?php echo number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'CRGPA'), 0, '.', ''); ?> </td>
                        <td class="p-1 alert alert-info"> التقدير الفصلي : <?php echo $this->getGradeFromPoint(number_format((float) $this->getLevTotal($id, $prog_id, $lev, 'CRGPA'), 0, '.', '')); ?> </td>
                        <td class="p-1 alert alert-info"> النقاط التراكمية:<?php echo number_format((float) $this->getLevGrandTotal($id, $prog_id, $lev, 'GGPA'), 0, '.', ''); ?> </td>
                        <td class="p-1 alert alert-info"> التقدير التراكمي : <?php echo $this->getGradeFromPoint(number_format((float) $this->getLevGrandTotal($id, $prog_id, $lev, 'GGPA'), 0, '.', '')); ?> </td>
                    </tr>
                </table>
            <?php
            }
            public function get_gpa($totals)
            {
                if ($total >= 96) {
                    $avg =  "*A";
                } elseif ($total >= 91) {
                    $avg =  "A";
                } elseif ($total >= 86) {
                    $avg =  "-A";
                } elseif ($total >= 80) {
                    $avg =  "*B";
                } elseif ($total >= 75) {
                    $avg =  "B";
                } elseif ($total >= 70) {
                    $avg =  "-B";
                } elseif ($total >= 65) {
                    $avg =  "*C";
                } elseif ($total >= 60) {
                    $avg =  "C";
                } elseif ($total >= 55) {
                    $avg =  "-C";
                } elseif ($total >= 50) {
                    $avg =  "D";
                } else {
                    $avg =  "F";
                }
                 return $avg;
            }
            public function getPoint($totals)
            {
                if ($totals >= 96) {
                    $getPon =  4;
                } elseif ($totals >= 91) {
                    $getPon =  3.75;
                } elseif ($totals >= 86) {
                    $getPon =  3.50;
                } elseif ($totals >= 80) {
                    $getPon =  3.25;
                } elseif ($totals >= 75) {
                    $getPon =  3;
                } elseif ($totals >= 70) {
                    $getPon =  2.75;
                } elseif ($totals >= 65) {
                    $getPon =  2.5;
                } elseif ($totals >= 60) {
                    $getPon =  2.25;
                } elseif ($totals >= 55) {
                    $getPon =  2;
                } elseif ($totals >= 50) {
                    $getPon =  1;
                } else {
                    $getPon =  0;
                }
                return $getPon;
            }

            public function getGradeFromPoint($Point)
            {
                if ($Point >= 4) {
                    $avg =  "A";
                    return $avg;
                } elseif ($Point >= 3.70) {
                    $avg =  "-A";
                    return $avg;
                } elseif ($Point >= 3.50) {
                    $avg =  "+B";
                    return $avg;
                } elseif ($Point >= 3.35) {
                    $avg =  "B";
                    return $avg;
                } elseif ($Point >= 3.00) {
                    $avg =  "-B";
                    return $avg;
                } elseif ($Point >= 2.70) {
                    $avg =  "+C";
                    return $avg;
                } elseif ($Point >= 3.35) {
                    $avg =  "C";
                    return $avg;
                } elseif ($Point >= 2) {
                    $avg =  "-C";
                    return $avg;
                } else {
                    $avg =  "F";
                    return $avg;
                }
            }






            public function upSub($crdhoure, $totals)
            {
                $result =  $crdhoure  * $totals;
                return $result;
            }

            public function getUsrAppilty($role = '')
            {
                $this->query('SELECT * FROM usr_rol WHERE role=:role');
                $this->bind(':role',  $role);
                $logrole = $this->resultSet();
                return $logrole;
            }




            public function getStuRelInfo()
            {
                $id = intval($_GET['id']);
                if ($id) {
                    $this->query("SELECT * FROM strurel WHERE stu_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($this->rowCount() > 0) :

                        return $row;

                    else :
                        $_SESSION['msg'] = Data_Not_Founded;
                    endif;
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }

            public function getStuRelIquali()
            {
                $id = intval($_GET['id']);
                if ($id) {
                    $this->query("SELECT * FROM edu_quali WHERE stu_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($this->rowCount() > 0) :

                        return $row;

                    else :
                        $_SESSION['msg'] = Data_Not_Founded;
                    endif;
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }


            public function getStudentacademicPro()
            {
                $id = intval($_GET['id']);
                if ($id) {
                    $this->query("SELECT * FROM stu_acadimi WHERE stu_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($this->rowCount() > 0) :
                        return $row;
                    else :
                        $_SESSION['msg'] = Data_Not_Founded;
                    endif;
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }




            public function getallstuUpFeeExcCuLev($stu_id, $lev_id, $Pay_Res_id)
            {
                $this->query("SELECT * FROM paymentinfo WHERE stu_id=:stu_id AND lev_id<:lev_id AND Pay_Res_id =:Pay_Res_id");
                $this->bind(":stu_id", $stu_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $row = $this->resultSet();
                if ($row) {
                    $this->query("SELECT sum(want) AS TotalWant  FROM paymentinfo WHERE stu_id=:stu_id AND lev_id<:lev_id AND Pay_Res_id =:Pay_Res_id");
                    $this->bind(":stu_id", $stu_id);
                    $this->bind(":lev_id", $lev_id);
                    $this->bind(":Pay_Res_id", $Pay_Res_id);
                    $val = $this->resultSet();
                    foreach ($val as $rows) {
                        return $rows['TotalWant'];
                    }
                } else {
                    return  0;
                }
            }

            public function getallstupaidFeeExcCuLev($stu_id, $lev_id, $Pay_Res_id)
            {
                $this->query("SELECT paymentinfo.lev_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id, Sum(fee_trans.Discount) AS Discount, Sum(fee_trans.amount) AS amount
                            FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                            GROUP BY paymentinfo.lev_id, paymentinfo.Pay_Res_id, paymentinfo.stu_id
                            HAVING (((paymentinfo.lev_id)<:lev_id) AND ((paymentinfo.Pay_Res_id)=:Pay_Res_id) AND ((paymentinfo.stu_id)=:stu_id))");
                $this->bind(":stu_id", $stu_id);
                $this->bind(":lev_id", $lev_id);
                $this->bind(":Pay_Res_id", $Pay_Res_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                        return    $this->getallstuUpFeeExcCuLev($stu_id, $lev_id, $Pay_Res_id)    -  $rows['amount'] - $rows['Discount'];
                    }
                } else {
                    return  0;
                }
            }

            public function getallstupaidFeeCuLev($Invoice_id, $val)
            {
                $this->query("SELECT sum(Discount) AS Discount, sum(amount) AS amount FROM fee_trans  WHERE Invoice_id=:Invoice_id");
                $this->bind(":Invoice_id", $Invoice_id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $rows) {
                    }
                    return  $rows[$val];
                } else {
                    return  0;
                }
            }





            public function getstuFeetranstion($val)
            {
                $this->query("SELECT * FROM   fee_trans  WHERE Invoice_id=:Invoice_id");
                $this->bind(":Invoice_id", $val);
                $row = $this->resultSet();
                if ($row) {
                    return   $this->resultSet();
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function getcurrentFeeInfo($id, $amount, $Discount)
            {
            ?>
                إجمالي المدفوع
                <?php
                echo ($this->getallstupaidFeeCuLev($id, $amount) > 0)  ? $this->getallstupaidFeeCuLev($id, $amount) : 0; ?>
                $ | إجمالي الخصوم
                <?php echo ($this->getallstupaidFeeCuLev($id, $Discount) > 0) ? $this->getallstupaidFeeCuLev($id, $Discount) : 0; ?>$

        <?php
            }


            public function stufeelevplance($id, $amount, $Discount)
            {
                $this->query("SELECT * FROM   paymentinfo  WHERE Invoice_id=:Invoice_id");
                $this->bind(":Invoice_id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ((array) $row as $item) {
                        return   $item['want'] - $this->getallstupaidFeeCuLev($id, $amount) - $this->getallstupaidFeeCuLev($id, $Discount);
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function getstuWantFee($val)
            {
                $this->query("SELECT paymentinfo.stu_id AS stu_id, Sum(paymentinfo.want) AS want
                FROM paymentinfo   GROUP BY paymentinfo.stu_id HAVING (((paymentinfo.stu_id)=:id))  ");
                $this->bind(":id", $val);
                $want = $this->resultSet();
                if ($want) {
                    foreach ($want as $rowswant) {
                        return $rowswant['want'];
                    }
                }
            }

            public function getstuDiscountFee($val)
            {
                $this->query("SELECT paymentinfo.stu_id AS stu_id, Sum(fee_trans.Discount) AS Discount
                FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                GROUP BY paymentinfo.stu_id HAVING (((paymentinfo.stu_id)=:id))");
                $this->bind(":id", $val);
                $Discount = $this->resultSet();
                if ($Discount) {
                    foreach ($Discount as $Discountrows) {
                        return $Discountrows['Discount'];
                    }
                }
            }

            public function getstuPaidFee($val)
            {
                $this->query("SELECT paymentinfo.stu_id AS stu_id, Sum(fee_trans.amount) AS amount
                FROM paymentinfo INNER JOIN fee_trans ON paymentinfo.Invoice_id = fee_trans.Invoice_id
                GROUP BY paymentinfo.stu_id HAVING (((paymentinfo.stu_id)=:id))");
                $this->bind(":id", $val);
                $amount = $this->resultSet();
                if ($amount) {
                    foreach ($amount as $amountrows) {
                        return $amountrows['amount'];
                    }
                }
            }

            public function getAllStuBlnace($val, $data)
            {

                $want =  $this->getstuWantFee($this->getStuInfoByStunm($val, $data));
                $Discount =  $this->getstuDiscountFee($this->getStuInfoByStunm($val, $data));
                $amount =  $this->getstuPaidFee($this->getStuInfoByStunm($val, $data));

                return $want - $Discount - $amount;
            }


            public function getstupaidfeetoupdate($id)
            {
                $this->query("SELECT * FROM   fee_trans  WHERE sta_id=:sta_id");
                $this->bind(":sta_id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $row;
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }







            public function get_Rel_type($val)
            {
                switch ($val) {
                    case 1:
                        return "الأب";
                        break;
                    case 2:
                        return "الأم";
                        break;
                    case 3:
                        return "الأخ";
                        break;
                    case 4:
                        return "الأخت";
                        break;
                    case 5:
                        return "العم";
                        break;
                    case 6:
                        return "العمة";
                        break;
                    case 7:
                        return "الخال";
                        break;
                    case 8:
                        return "الخالة";
                        break;
                    case 9:
                        return "الجد";
                        break;
                    case 10:
                        return "الجدة";
                        break;
                    case 11:
                        return "غير ذلك";
                        break;
                    default:
                        return "غير ذلك";
                }
            }

            public function getrel_lev($val)
            {
                switch ($val) {
                    case 1:
                        return "الأولى";
                        break;
                    case 2:
                        return "الثانية";
                        break;
                    case 3:
                        return "الثالثة";
                        break;
                    default:
                        return "غير ذلك";
                }
            }


            public function getusr_lev($val)
            {
                if ($val == "manager") :
                    return '<option value="manager">مدير</option>
                            <option value="finance"> محاسب </option>
                            <option value="admin"> الشؤون الإدارية </option>
                            <option value="students_Affairs"> شؤون الطلاب </option>';
                elseif ($val == "finance") :
                    return '<option value="finance"> محاسب </option>
                            <option value="manager">مدير</option>
                            <option value="admin"> الشؤون الإدارية </option>
                            <option value="students_Affairs"> شؤون الطلاب </option>';
                elseif ($val == "admin") :
                    return '<option value="admin"> الشؤون الإدارية </option>
                            <option value="manager">مدير</option>
                            <option value="finance"> محاسب </option>
                            <option value="students_Affairs"> شؤون الطلاب </option>';
                elseif ($val == "manager") :
                    return '<option value="students_Affairs"> شؤون الطلاب </option>
                            <option value="manager">مدير</option>
                            <option value="finance"> محاسب </option>
                            <option value="admin"> الشؤون الإدارية </option>';
                else :
                    return '<option value="manager">مدير</option>
                            <option value="finance"> محاسب </option>
                            <option value="admin"> الشؤون الإدارية </option>
                            <option value="students_Affairs"> شؤون الطلاب </option>';
                endif;
            }

            /** =========================================================== */
            /** EMPLOYEE information **/ /** emp information  */
            /** =========================================================== */

            public function getempList()
            {
                $this->query("SELECT * FROM empinfo WHERE emp_stustatus=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo "<option value='" . $item['emp_id'] . "'>" . $item['emp_name'] . "</option>";
                    }
                }
            }

            public function getempinfoById($id, $val)
            {
                $this->query("SELECT * FROM empinfo WHERE emp_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item[$val];
                    }
                }
            }
            /** =========================================================== */
            /** EMPLOYEE Finance Dep **/ /** emp section  */
            /** =========================================================== */

            public function getempDept()
            {
                $this->query("SELECT * FROM emp_debt ORDER BY emp_debt_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }

            public function getEmpDepToUpdate($id)
            {
                $this->query("SELECT * FROM emp_debt  WHERE  emp_debt_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }




            /** =========================================================== */
            /** allowancetype Finance   **/ /** allowancetype  */
            /** =========================================================== */


            public function getallowancetype()
            {
                $this->query("SELECT * FROM allowancetype ORDER BY  allowancetype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getallowancetypeList()
            {
                $this->query("SELECT * FROM allowancetype WHERE active=1 ORDER BY  allowancetype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo '<option value="' . $item['allowancetype_id'] . '">' . $item['allowancetype'] . '</option>';
                    }
                }
            }

            public function gSeltallowancetypeList($val)
            {
                $this->query("SELECT * FROM allowancetype WHERE active=1 ORDER BY  allowancetype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['allowancetype_id'] == $val) ? 'selected' : '';
                        echo '<option value="' . $item['allowancetype_id'] . '"  ' . $sel . '>' . $item['allowancetype'] . '</option>';
                    }
                }
            }


            public function getSeltallowancetypetxt($id)
            {
                $this->query("SELECT * FROM allowancetype WHERE allowancetype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['allowancetype'];
                    }
                }
            }

            public function getallowancetypeToUpdate($id)
            {
                $this->query("SELECT * FROM allowancetype  WHERE allowancetype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            /** =========================================================== */
            /** deductiontype Finance   **/ /** deductiontype  */
            /** =========================================================== */


            public function getdeductiontype()
            {
                $this->query("SELECT * FROM deductiontype ORDER BY  deductiontype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getdeductiontypeList()
            {
                $this->query("SELECT * FROM deductiontype WHERE active=1 ORDER BY  deductiontype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo '<option value="' . $item['deductiontype_id'] . '">' . $item['deductiontype'] . '</option>';
                    }
                }
            }

            public function getSelltdeductiontypeList($val)
            {
                $this->query("SELECT * FROM deductiontype WHERE active=1 ORDER BY  deductiontype_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['deductiontype_id'] == $val) ? 'selected' : '';
                        echo '<option value="' . $item['deductiontype_id'] . '"  ' . $sel . '>' . $item['deductiontype'] . '</option>';
                    }
                }
            }


            public function getSeltdeductiontypetxt($id)
            {
                $this->query("SELECT * FROM deductiontype WHERE deductiontype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['deductiontype'];
                    }
                }
            }

            public function getdeductiontypeToUpdate($id)
            {
                $this->query("SELECT * FROM deductiontype  WHERE deductiontype_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }
            /** =========================================================== */
            /** EMPLOYEE getallowance  **/ /** EMPLOYEE getallowance  */
            /** =========================================================== */
            public function getemp_allowance()
            {
                $this->query("SELECT * FROM emp_allowance ORDER BY  emp_allowance_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }

            public function getEmpallowanceoUpdate($id)
            {
                $this->query("SELECT * FROM emp_allowance  WHERE   emp_allowance_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }




            public function getemp_deductiont()
            {
                $this->query("SELECT * FROM emp_deductiont ORDER BY  emp_deductiont_id DESC");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }

            public function getEmpdeductiontoUpdate($id)
            {
                $this->query("SELECT * FROM emp_deductiont  WHERE   emp_deductiont_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }
            /** =========================================================== */
            /** EMPLOYEE SECTIONS **/ /** emp section  */
            /** =========================================================== */

            public function getEmpSec()
            {
                $this->query("SELECT * FROM  em_sections WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo '<option value="' . $item['em_sec_id'] . '">' . $item['em_sec_name'] . '</option>';
                    }
                }
            }
            public function getEmpSecTxt()
            {
                $this->query("SELECT * FROM  em_sections WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['em_sec_name']  ;
                    }
                }
            }




            public function getSelEmpSecById($val)
            {
                $this->query("SELECT * FROM em_sections  WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['em_sec_id'] === $val) ? " selected " : "";
                        echo '<option value="' . $item['em_sec_id'] . '" ' . $sel . '>' . $item['em_sec_name'] . '</option>';
                    }
                }
            }


            public function getSelEmpSecByIdTxt($id)
            {
                $this->query("SELECT * FROM  em_sections WHERE em_sec_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                    }
                    return  $item['em_sec_name'];
                }
            }




            /** =========================================================== */
            /** EMPLOYEE SECTIONS **/ /** emp leves */
            /** =========================================================== */

            public function getEmpLev()
            {
                $this->query("SELECT * FROM em_lev WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo  '<option value="' . $item['em_lev_id'] . '">' . $item['em_lev_name'] . '</option>';
                    }
                }
            }


            public function getSelEmpLevById($val)
            {
                $this->query("SELECT * FROM em_lev WHERE active=1");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        $sel = ($item['em_lev_id'] === $val) ? " selected " : "";
                        echo  '<option value="' . $item['em_lev_id']  . '" ' . $sel . '>'   . $item['em_lev_name'] . '</option>';
                    }
                }
            }


            public function getSelEmpLevByIdTxt($val)
            {
                $this->query("SELECT * FROM em_lev WHERE em_lev_id=:id AND active=1");
                $this->bind(":id", $val);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                    return $item['em_lev_name'];

                    }
                }
            }


            public function getEmpLevById($val)
            {
                $this->query("SELECT * FROM em_lev WHERE em_lev_id=:em_lev_id");
                $this->bind(":em_lev_id", $val);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['em_lev_name'];
                    }
                }
            }


            /** ********************************************** */
            /** ************  Files Upload Section *********** */
            /** ********************************************** */

            public function uploadPic($file, $size)
            {

                $files = $file;
                $f_name    = $files['name'];
                $f_tmp     = $files['tmp_name'];
                $f_size    = $files['size'];
                $f_error   = $files['error'];
                $f_exe     = explode('.', $f_name);
                $f_exe     = strtolower(end($f_exe));
                $f_allow   = array('jpg', 'gif', 'png');
                if (in_array($f_exe, $f_allow)) {
                    if ($f_error === 0) {
                        if ($f_size < $size) {
                            $f_upload_dir =   getcwd() . "/uplouds/";
                            if (move_uploaded_file($f_tmp, $f_upload_dir . $f_name)) {
                                $_SESSION['msg'] = SUCCESS;
                            }
                        } else {
                            $_SESSION['msg']  = FILE_SIZE_ERR;
                        }
                    } else {
                        echo "هناك علة ما ";
                    }
                } else {
                    $_SESSION['msg']  = FILE_TYPE_ERR;
                }
            }
            public function uploadDoc($file, $size)
            {


                $files = $file;
                $f_name    = $files['name'];
                $f_tmp     = $files['tmp_name'];
                $f_size    = $files['size'];
                $f_error   = $files['error'];
                $f_exe     = explode('.', $f_name);
                $f_exe     = strtolower(end($f_exe));
                $f_allow   = array('.docx', 'doc', 'pdf');
                if (in_array($f_exe, $f_allow)) {
                    if ($f_error === 0) {
                        if ($f_size < $size) {
                            $f_upload_dir =   getcwd() . "/uplouds/";
                            $f_origenal_tmp = "";
                            if (move_uploaded_file($f_tmp, $f_upload_dir . $f_name)) {
                                $_SESSION['msg'] = SUCCESS;
                            }
                        } else {
                            $_SESSION['msg']  = FILE_SIZE_ERR;
                        }
                    } else {
                        echo "هناك علة ما ";
                    }
                } else {
                    $_SESSION['msg']  = FILE_TYPE_ERR;
                }
            }
            public function uploadFiles($file,$exe,$size )
            {


                $files = $file;
                $f_name    = $files['name'];
                $f_tmp     = $files['tmp_name'];
                $f_size    = $files['size'];
                $f_error   = $files['error'];
                $f_exe     = explode('.', $f_name);
                $f_exe     = strtolower(end($f_exe));
                $f_allow   = array($exe);
                if (in_array($f_exe, $f_allow)) {
                    if ($f_error === 0) {
                        if ($f_size < $size) {
                            $f_upload_dir =   getcwd() . "/uplouds/";
                            $f_origenal_tmp = "";
                            if (move_uploaded_file($f_tmp, $f_upload_dir . $f_name)) {
                                $_SESSION['msg'] = SUCCESS;
                            }
                        } else {
                            $_SESSION['msg']  = FILE_SIZE_ERR;
                        }
                    } else {
                        $_SESSION['msg'] = ERR_UPLOADS;
                    }
                } else {
                    $_SESSION['msg']  = FILE_TYPE_ERR;
                }
            }
            public function emp_qual($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM emp_qual WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function empexpe($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM empexpe WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }



            public function emptracou($id)
            {


                if ($id != '') {
                    $this->query("SELECT * FROM  tra_cou  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function empjobs($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  empjobs  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            public function getempjobsInfo($id, $val)
            {
                $this->query("SELECT * FROM  empjobs  WHERE emp_id=:emp_id AND empjob_levdate=''");
                $this->bind(":emp_id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $empJobs) {
                        return $empJobs[$val];
                    }
                }
            }

            /**
             * asdlsadkjc ;sadkjc sakdc lkjdsac ;lkdsajc ;sakdjc ;dsakjc ;dsac sad;c adscsadc j;dsajc sa;djc dsa;lc dsa
             */

            public function getjobssectiobbyEmpId($id, $val)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  empjobs  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $jobsinfo) {
                            return $jobsinfo[$val];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }


            public function getJobsSecByempId($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  em_sections  WHERE em_sec_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $em_sec) {
                            return $em_sec["em_sec_name"];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            public function getJobsLevByempId($id)
            {
                if ($id != '') {
                    $this->query("SELECT * FROM  em_lev  WHERE em_lev_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $em_sec) {
                            return $em_sec["em_lev_name"];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }
            public function empfile($id)
            {


                if ($id != '') {
                    $this->query("SELECT * FROM  emp_file  WHERE emp_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = Data_Not_Founded;
                }
            }





            /** ==================================================================  */
            /** expensess & expensess types  **/ /** expensess & expensess types   */
            /** ================================================================= */


            public function getexptype()
            {
                $this->query("SELECT * FROM exptype");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getexptypeList()
            {
                $this->query("SELECT * FROM exptype");
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        echo "<option value='" . $item['exptypeid'] . "'>" . $item['exptype'] . "</option>";
                    }
                }
            }



            public function getSelexptypetxt($id)
            {
                $this->query("SELECT * FROM exptype WHERE exptypeid=:id");
                $this->bind(":id", intval($id));
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['exptype'];
                    }
                }
            }



            public function getexpensess()
            {
                $this->query("SELECT * FROM expensess");
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();
                }
            }


            public function getgetexpensessToUpdate($id)
            {
                $this->query("SELECT * FROM expensess WHERE expensess_id=:id");
                $this->bind(":id", intval($id));
                $row = $this->resultSet();
                if ($row) {
                    return $this->resultSet();;
                }
            }



            public function cheIdsdata()
            {
                if (
                    isset($_GET['dep_id']) && isset($_GET['sec_id']) && isset($_GET['lev_id']) && isset($_GET['grp_id'])
                    && intval($_GET['dep_id']) != "" && intval($_GET['sec_id']) != ""
                    && intval($_GET['lev_id']) != "" && intval($_GET['grp_id']) != ""
                ) {
                    return true;
                } else {
                    return false;
                }
            }



            public function getSelBankInfoById($id, $val)
            {
                $this->query("SELECT * FROM ban_info WHERE  Ban_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item[$val];
                    }
                }
            }



            public function getBankOpingamount($id)
            {
                $this->query("SELECT * FROM ban_info WHERE  Ban_id=:id");
                $this->bind(":id", $id);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['Ban_op_acc'];
                    }
                }
            }

            public function getaccountOutboundTotal($accid, $DFrom, $DTo)
            {
                $this->query("SELECT SUM(Outbound) as Outbound FROM account_movement WHERE mov_date BETWEEN :DFrm AND :Dto AND Ban_id=:id");
                $this->bind(":DFrm", $DFrom);
                $this->bind(":Dto", $DTo);
                $this->bind(":id", $accid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['Outbound'];
                    }
                } else {
                    return  0;
                }
            }

            public function getaccountIncomingTotal($accid, $DFrom, $DTo)
            {
                $this->query("SELECT SUM(Incoming) as Incoming FROM account_movement WHERE mov_date BETWEEN :DFrm AND :Dto AND Ban_id=:id");
                $this->bind(":DFrm", $DFrom);
                $this->bind(":Dto", $DTo);
                $this->bind(":id", $accid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return $item['Incoming'];
                    }
                } else {
                    return  0;
                }
            }




            public function getaccountCurrentBlance($accid)
            {
                $this->query("SELECT SUM(Incoming) as Incoming , SUM(Outbound) as Outbound FROM account_movement WHERE Ban_id=:id");
                $this->bind(":id", $accid);
                $row = $this->resultSet();
                if ($row) {
                    foreach ($row as $item) {
                        return ($this->getBankOpingamount($accid) +  $item['Incoming']) - $item['Outbound'];
                    }
                } else {
                    return  0;
                }
            }


            public function getBankData($id)
            {
                if ($id) {
                    $this->query("SELECT * FROM ban_info WHERE Ban_id=:id");
                    $this->bind(":id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                } else {
                    $_SESSION['msg'] = SELECT_ID;
                }
            }


            public function getBankDataList()
            {
                $this->query("SELECT * FROM ban_info WHERE Ban_active=1");
                $row = $this->resultSet();
                if ($row) :
                    foreach ($row as $rowItem) :
                        echo '<option value="' . $rowItem['Ban_id'] . '">' . $rowItem['Ban_name'] . ' | ' . $rowItem['Ban_num'] . '</option>';
                    endforeach;
                endif;
            }





            public function add_to_account_mov($type, $accNumber, $amount, $date, $parem)
            {
                if ($type != "" && $accNumber != "" && $date != ""  && $amount != "") {
                    if ($type == "in") {
                        $this->query("INSERT INTO account_movement( Ban_id,  Incoming , mov_date,parem) 
                    VALUES (:Ban_id, :Incoming, :mov_date,:parem)");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Incoming", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $parem);
                        $this->execute();
                        if ($this->lastInsertId()) {
                            return true;
                        }
                    } elseif ($type == "out") {
                        $this->query("INSERT INTO account_movement( Ban_id,  Outbound , mov_date,parem) 
                    VALUES (:Ban_id, :Outbound, :mov_date,:parem)");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Outbound", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $parem);
                        $this->execute();
                        if ($this->lastInsertId()) {
                            return true;
                        }
                    }
                }
            }

            public function getempsellarypaidprint($id)
            {
                if ($id) {
                    $this->query("SELECT * FROM emp_sellary_paid WHERE empSellary_id=:empSellary_id");
                    $this->bind(":empSellary_id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        return $this->resultSet();
                    }
                }
            }

            public function getSumempsellarypaidprint($id)
            {
                if ($id) {
                    $this->query("SELECT SUM(emp_sellary_paid_ampount) as  emp_sellary_paid_ampount FROM emp_sellary_paid WHERE empSellary_id=:empSellary_id");
                    $this->bind(":empSellary_id", $id);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $item) {
                            return $item['emp_sellary_paid_ampount'];
                        }
                    }
                }
            }

            public function update_to_account_mov($type, $Ckparem, $accNumber, $amount, $date)
            {
                if ($type != "" && $accNumber != "" && $date != ""  && $amount != "") {
                    if ($type == "in") {
                        $this->query("UPDATE  account_movement SET Ban_id=:Ban_id,  Incoming=:Incoming , mov_date=:mov_date  WHERE parem=:parem");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Incoming", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $Ckparem);
                        $this->execute();
                    } elseif ($type == "out") {
                        $this->query("UPDATE  account_movement SET Ban_id=:Ban_id,  Outbound=:Outbound ,  mov_date=:mov_date,parem=:parem WHERE  parem=:parem");
                        $this->bind(":Ban_id", $accNumber);
                        $this->bind(":Outbound", $amount);
                        $this->bind(":mov_date", $date);
                        $this->bind(":parem", $Ckparem);
                        $this->execute();
                    }
                }
            }



            public function delete_to_account_mov($parem)
            {
                if ($parem != "") {
                    $this->query("DELETE FROM   account_movement   WHERE parem=:parem");
                    $this->bind(":parem", $parem);
                    $this->execute();
                    $_SESSION['msg'] = SUCCESS;
                }
            }




            public function YearsAndMonthList()
            {
                $Months = array("يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر");
                $Years = array(2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2020);

                $getCurrentYears = date("Y");

                for ($x = 0; $x  < 12; $x++) {
                    $r = $x + 1;
                    echo "<option value='$r'> $getCurrentYears | $Months[$x] </option>";
                }
            }




            //*************** get emplooyes finnace  to get net sellary */




            //***************   get debt ****** */
            public function getEmpdebt($emp_id, $action_month)
            {
                if ($emp_id != "" || $action_month != "") {
                    $this->query("SELECT SUM(emp_debt_amount) AS emp_debt_amount from emp_debt  WHERE emp_id=:emp_id AND action_month=:action_month");
                    $this->bind(":emp_id", $emp_id);
                    $this->bind(":action_month", $action_month);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $emp_debt) {
                            if ($emp_debt['emp_debt_amount'] > 0) {
                                return $emp_debt['emp_debt_amount'];
                            } else {
                                return 0;
                            }
                        }
                    }
                }
            }
            //***************   get debt ****** */
            public function getallowance($emp_id, $action_month)
            {
                if ($emp_id != "" || $action_month != "") {
                    $this->query("SELECT SUM(emp_allowance_amount) AS emp_allowance_amount from emp_allowance  WHERE emp_id=:emp_id AND action_month=:action_month");
                    $this->bind(":emp_id", $emp_id);
                    $this->bind(":action_month", $action_month);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $empallowance) {
                            if ($empallowance['emp_allowance_amount'] > 0) {
                                return $empallowance['emp_allowance_amount'];
                            } else {
                                return 0;
                            }
                        }
                    }
                }
            }
            //***************   get debt ****** */
            public function getdeductiont($emp_id, $action_month)
            {
                if ($emp_id != "" || $action_month != "") {
                    $this->query("SELECT SUM(emp_deductiont_amount) AS emp_deductiont_amount from emp_deductiont  WHERE emp_id=:emp_id AND action_month=:action_month");
                    $this->bind(":emp_id", $emp_id);
                    $this->bind(":action_month", $action_month);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $empdeductiont) {
                            if ($empdeductiont['emp_deductiont_amount'] > 0) {
                                return $empdeductiont['emp_deductiont_amount'];
                            } else {
                                return 0;
                            }
                        }
                    } else {
                        return 0;
                    }
                }
            }



            public function getSumempdeductionprint($DFrm, $Dto)
            {
                if (isset($DFrm) && isset($Dto)) {
                    $this->query("SELECT SUM(emp_deductiont_amount) AS emp_deductiont_amount FROM emp_deductiont WHERE emp_deductiont_date BETWEEN :DFrm AND :Dto");
                    $this->bind(":DFrm", $DFrm);
                    $this->bind(":Dto", $Dto);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $Total) {
                            return $Total['emp_deductiont_amount'];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }


            public function getSumempdebtprint($DFrm, $Dto)
            {
                if (isset($DFrm) && isset($Dto)) {
                    $this->query("SELECT SUM(emp_debt_amount) AS emp_debt_amount FROM emp_debt WHERE emp_debt_date BETWEEN :DFrm AND :Dto");
                    $this->bind(":DFrm", $DFrm);
                    $this->bind(":Dto", $Dto);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $Total) {
                            return $Total['emp_debt_amount'];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }

            public function getSumempallowanceprint($DFrm, $Dto)
            {
                if (isset($DFrm) && isset($Dto)) {
                    $this->query("SELECT SUM(emp_allowance_amount) AS emp_allowance_amount FROM emp_allowance WHERE emp_allowance_date BETWEEN :DFrm AND :Dto");
                    $this->bind(":DFrm", $DFrm);
                    $this->bind(":Dto", $Dto);
                    $row = $this->resultSet();
                    if ($row) {
                        foreach ($row as $Total) {
                            return $Total['emp_allowance_amount'];
                        }
                    } else {
                        $_SESSION['msg'] = Data_Not_Founded;
                    }
                }
            }




            public function closeAccounts($closDate, $Dfrm, $DTo)
            {

                /** =============================================================== */
                $this->query("UPDATE emp_allowance SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_allowance_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if($this->execute()){
                    echo "<br> تم اغلاق حساب علاوات الموظفين "; 
                }

                /** =============================================================== */
                $this->query("UPDATE emp_debt SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_debt_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if($this->execute()){
                    echo "<br> تم اغلاق حساب مديونيات الموظفين "; 
                }

                /** =============================================================== */
                $this->query("UPDATE emp_deductiont SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_deductiont_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if($this->execute()){
                    echo "<br> تم اغلاق حساب الخصوم المالية للموظفين "; 
                }

                /** =============================================================== */
                $this->query("UPDATE emp_sellary SET   acc_close=1,acc_close_date=:closDate  WHERE   upDates BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if($this->execute()){
                    echo "<br> تم اغلاق حساب رفع مرتبات الموظفين "; 
                }

                /** =============================================================== */
                $this->query("UPDATE emp_sellary_paid SET   acc_close=1,acc_close_date=:closDate  WHERE   emp_sellary_paid_date BETWEEN :Dfrm AND :DTo AND acc_close=0");
                $this->bind(":closDate", $closDate);
                $this->bind(":Dfrm", $Dfrm);
                $this->bind(":DTo",  $DTo);
                if($this->execute()){
                    echo "<br> تم اغلاق حساب مرتبات الموظفين "; 
                }

            }
        }
