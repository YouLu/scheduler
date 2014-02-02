<?php

class View {

    public $js;
    public $css;
    public $publicJs;
    public $publicCss;
    
    public $data;
    
    function __construct() {
     
    }
    
    public function render($name, $header = true, $footer = true, $menue=true, $noInclude = false)
    {
        if($noInclude == true)
        {
            require 'views/'.$name.'.php';
        }
        else
        {
           
            require 'views/header.php';
           
            require 'views/'.$name.'.php';
            require 'views/footer.php';
        }
    }

}
?>