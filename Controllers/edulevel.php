<?php class edulevel extends Controller{
	protected function index(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new edulevelModel();
        $this->returnView($viewmodel->delete(), true);
    }

     
}
