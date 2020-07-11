<?php class todolist extends Controller{
	protected function index(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->add() , true);
    }
    protected function update(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->update() , true);
    }
    protected function show(){
        $viewmodel = new todolistModel();
        $this->returnView($viewmodel->show() , true);
    }
}