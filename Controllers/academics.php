<?php class academics extends Controller{
	protected function index(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new academicsModel();
        $this->returnView($viewmodel->delete(), true);
    }

     
}