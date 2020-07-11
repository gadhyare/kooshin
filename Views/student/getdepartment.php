<?php require_once('core/khas.php');

        function get_department(){
            $g = new Khas;
            $g->get_department();
        }

        function get_section(){
            $g = new Khas;
            $g->get_section();
        }

        function get_group(){
            $g = new Khas;
            $g->get_group();
        }
        function get_level(){
            $g = new Khas;
            $g->get_level();
        }

        function get_num_num(){
            $g = new Khas;
            $g->get_students_number();
        }

        function get_group_update($val){
            $g = new Khas;
            $g->get_group_update($val);
        }

        function get_section_update($val){
            $g = new Khas;
            $g->get_section_update($val);
        } 

        function get_level_update($val){
            $g = new Khas;
            $g->get_level_update($val);
        }

        function get_department_update($val){
            $g= new Khas;
            $g->get_department_update($val);
        }
 
        function get_last_stu_num(){
            $g= new Khas;
            $g->get_last_stu_num();
        }
        
        
        function get_student_rel(){
            $g= new Khas;
            $g->get_student_rel();
        }


        function uploadfile(){
            $g = new Khas;
            $g->uploadfile();
        }  