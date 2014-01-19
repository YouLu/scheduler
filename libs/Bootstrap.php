<?php

class Bootstrap {

    function __construct() 
    {
        
        /*
        localhost/mvc/help/other/10
        mvc:application
        help:controller
        other: method
        10: argument
         */
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        //print_r($url);
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        /*
        if you enter 
        localhost/mvc/help/other/10
        in the browser
        $url = help/other/10
         */
        $url = explode("/", $url);
        /*
        $url(0) = help :controller
        $url(1) = other :method
        $url(2) = 10    :argument
         */

        if ( empty($url[0]))
        {
            require basePathForRequire . 'controllers/SigninController.php';
            $signin = new SigninController();
            $signin->index();
            return;
        }
        
        $controllerName = $url[0].'Controller';
        $file = basePathForRequire . 'controllers/'.$controllerName.'.php'; //load controller
        
        if(file_exists($file))
        {         
            require $file;
            
            $controller = new $controllerName;
            
            $controller->loadModel($url[0]);
            
            if(isset($url[1]))
            {
                $method = $url[1];
                if(method_exists($controller, $method))
                {
                    if(isset($url[2]))
                    {
                        $arg = $url[2];
                        $controller->{$method}($arg);
                    }
                    else
                    {
                        $controller->{$method}();
                    }
                }
                //no function call
                else
                {
                   $controller->index(); 
                }
            }
            //no function call
            else
            {
               $controller->index(); 
            }
        
        }
        else 
        {
//            require 'controllers/error.php';
//            $controller = new Error();
            echo "controller doesn't exist.";
        }
        
        
    }

}
?>