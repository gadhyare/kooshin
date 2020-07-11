<?php class exams extends Controller
{
    protected function index()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function add()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->add(), true);
    }
    protected function newexam()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->newexam(), true);
    }
    // protected function upload()
    // {
    //     $viewmodel = new ExamsModel();
    //     $this->returnView($viewmodel->upload(), true);
    // }

    protected function searchresult()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->searchresult(), true);
    }
    protected function stdelexam()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->stdelexam(), true);
    }

    protected function stupexam()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->stupexam(), true);
    }
    protected function showStuRecord()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->showStuRecord(), true);
    }

    protected function examselPro()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->examselPro(), true);
    }


    protected function updatestuexam()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->updatestuexam(), true);
    }

    protected function examsstuadd()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->examsstuadd(), true);
    }

    protected function examsstu()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->examsstu(), true);
    }

    protected function stuGpa()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->stuGpa(), true);
    }


    protected function searchresultprint()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->searchresultprint(), false);
    }


    protected function stuGpaprint()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->stuGpaprint(), false);
    }

    protected function stufullGpaprint()
    {
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->stufullGpaprint(), false);
    }

    protected function updateexam(){
        $viewmodel = new ExamsModel();
        $this->returnView($viewmodel->updateexam(), true);        
    }

    
}
