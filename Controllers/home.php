<?php class home extends Controller{
	protected function index(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new HomeModel();
        $this->returnView($viewmodel->delete(), true);
    }
}