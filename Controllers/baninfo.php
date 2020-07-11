<?php class baninfo extends Controller{
	protected function index(){
        $viewmodel = new baninfoModel();
        $this->returnView($viewmodel->Index(), true);
    }
    
    // protected function add(){
    //     $viewmodel = new baninfoModel();
    //     $this->returnView($viewmodel->add(), true);
    // }


    // protected function search(){
    //     $viewmodel = new baninfoModel();
    //     $this->returnView($viewmodel->search(), true);
    // }

    // protected function update(){
    //     $viewmodel = new baninfoModel();
    //     $this->returnView($viewmodel->update(), true);
    // }


    protected function delete(){
        $viewmodel = new baninfoModel();
        $this->returnView($viewmodel->delete(), false);
    }

     
}
