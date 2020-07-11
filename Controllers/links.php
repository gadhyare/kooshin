<?php class links extends Controller{
	protected function index(){
        $viewmodel = new LevelModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new LevelModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new LevelModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new LevelModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new LevelModel();
        $this->returnView($viewmodel->delete(), true);
    }

     
}