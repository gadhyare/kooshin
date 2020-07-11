<?php class faculty extends Controller{
	protected function index(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new facultyModel();
        $this->returnView($viewmodel->delete(), true);
    }

     
}
