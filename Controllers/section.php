<?php class section extends Controller{
	protected function index(){
        $viewmodel = new SectionModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new SectionModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new SectionModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new SectionModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new SectionModel();
        $this->returnView($viewmodel->delete(), true);
    }
}