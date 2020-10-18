<?php class Programs extends Controller{
	protected function index(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    protected function add(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->add(), true);
    }


  

    protected function update(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->update(), true);
    }


    protected function delete(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->delete(), true);
    }


    
    protected function prosub(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->prosub(), true);
    }


    
    protected function setprogreport(){
        $viewmodel = new programsModel();
        $this->returnView($viewmodel->setprogreport(), true);
    }     
}