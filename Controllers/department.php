<?php class Department extends Controller{
	protected function index(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->delete(), true);
    }

    
    protected function doupload(){
        $viewmodel = new departmentModel();
        $this->returnView($viewmodel->doupload(), true);
    }

   

}