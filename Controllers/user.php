<?php class user extends Controller{
    
   protected function register(){
    $viewmodel = new UserModel();
    $this->returnView($viewmodel->register(), true);
    }

    protected function index(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function update(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->update(), true);   
    }

    protected function delete(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->delete(), true);   
    }

    protected function login(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(), true);   
    }

    protected function logout(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->logout(), true);   
    }
    protected function profile(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->profile(), true);
    }

    protected function usrRole(){
        $viewmodel = new userModel();
        $this->returnView($viewmodel->usrRole(), true);
    }

    protected function userrols(){
        $viewmodel = new userModel();
        $this->returnView($viewmodel->userrols(), true);
    }

    protected function usrsectanddep(){
        $viewmodel = new userModel();
        $this->returnView($viewmodel->usrsectanddep(), true);
    }
    
    
}