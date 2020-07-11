<?php class group extends Controller{
	protected function index(){
        $viewmodel = new GroupModel();
        $this->returnView($viewmodel->Index(), true);
    }

	protected function print(){
        $viewmodel = new GroupModel();
        $this->returnView($viewmodel->print(), true);
    }    
    
    protected function add(){
        $viewmodel = new GroupModel();
        $this->returnView($viewmodel->add(), true);
    }


    protected function search(){
        $viewmodel = new GroupModel();
        $this->returnView($viewmodel->search(), true);
    }

    protected function update(){
        $viewmodel = new GroupModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new GroupModel();
        $this->returnView($viewmodel->delete(), true);
    }
}