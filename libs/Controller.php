<?php

class Controller
{
    protected $view;
    protected $model;
    
    function __construct($caller = '') {

        $this->view = new View();
        
        $this->authenticate($caller);
    }
    private function authenticate($caller)
    {
        if($caller != 'Signin')
        {
            Session::init();
            $signedIn = Session::get('signedIn');
            $role = Session::get('role');
            if($signedIn == false)
            {
                    Session::destroy();
                    header('location: '.basePath.'Signin');
                    exit;
            } 
        }

    }


    public function loadModel($name)
    {
        $path = 'models/'.$name.'.php';

        if(file_exists($path)) {
                require $path;
               
		$this->model = new $name;
        }
    }
}
?>
