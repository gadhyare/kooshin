<?php class subject extends Controller
{
    protected function index()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function add()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->delete(), true);
    }

    protected function subjectlevel()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->subjectlevel(), true);
    }

    protected function ordersubByfacl()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->ordersubByfacl(), true);
    }


    protected function ordersubByfaclprint()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->ordersubByfaclprint(), false);
    }


    protected function uploadsujectlist()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->uploadsujectlist(), true);
    }

    protected function ordersubByfacldel()
    {
        $viewmodel = new SubjectModel();
        $this->returnView($viewmodel->ordersubByfacldel(), true);
    }

    
}
