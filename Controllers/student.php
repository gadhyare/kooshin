<?php class student extends Controller
{
    protected function index()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->Index(), true);
    }
    protected function info()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->info(), true);
    }


    public function register()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->register(), true);
    }

 


    public function update()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->update(), true);
    }

    public function studentinfoprint()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->studentinfoprint(), true);
    }

    public function delete()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->delete(), true);
    }
    
 
    public function multidel()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->multidel(), true);
    }

    
    public function getdepartment()
    {

        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->getdepartment(), false);
    }
    public function Studentrel()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->Studentrel(), true);
    }
    public function Studentacademic()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->Studentacademic(), true);
    }
    public function StudentShow()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->StudentShow(), true);
    }
    public function Studinfo()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->Studinfo(), true);
    }
    public function studentfullreg()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->studentfullreg(), true);
    }
    public function uploadfile()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->uploadfile(), true);
    }
    public function doupload()
    {
        $viewmodel = new StudentModel();
        $this->returnView($viewmodel->doupload(), true);
    }



    public function addsturel()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->addsturel(), true);
    }

    public function Studentrelinfo()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->Studentrelinfo(), true);
    }

    public function Studentreldel()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->Studentreldel(), true);
    }


    public function Studentrelupdate()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->Studentrelupdate(), true);
    }

    public function Studentacademicinfo()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->Studentacademicinfo(), true);
    }


    public function Studentacademicdel()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->Studentacademicdel(), true);
    }

    public function Studentacademicupdate()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->Studentacademicupdate(), true);
    }

    public function StudentacademicPro()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->StudentacademicPro(), true);
    }


    public function StudentacademicProdel()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->StudentacademicProdel(), true);
    }

    public function StudentacademicProadd()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->StudentacademicProadd(), true);
    }

    public function StudentacademicProupdate()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->StudentacademicProupdate(), true);
    }

    public function stuinfoprint()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->stuinfoprint(), false);
    }


    public function stuinfolist()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->stuinfolist(), true);
    }


    public function stuinfolistprint()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->stuinfolistprint(), false);
    }


    public function upgradecls()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->upgradecls(), true);
    }

    public function stulistupload()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->stulistupload(), true);
    }


    public function searchstuinfo()
    {
        $viewmodel = new StudentModel();
        $this->ReturnView($viewmodel->searchstuinfo(), true);
    }

    
}
