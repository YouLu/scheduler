<!Doctype html>
<html>
    <header>
        
        <link rel="stylesheet" type="text/css" href="<?php echo basePath; ?>public/css/jquery-ui-1.10.3.custom.css" />
        
        <script src="<?php echo basePath; ?>public/js/jquery.js"></script>
        <script src="<?php echo basePath; ?>public/js/jquery-ui-1.10.3.custom.js"></script>
        
        <script src="<?php echo basePath; ?>public/js/default.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo basePath; ?>public/css/default.css" />
        
        
        <?php
            //public css
            if(isset($this->publicCss))
            {
                foreach($this->publicCss as $css)
                {
                    echo '<link rel="stylesheet" type="text/css" href="'.basePath.'public/css/'.$css.'.css" />';
                }
            }
            //public js
            if(isset($this->publicJs))
            {
                foreach($this->publicJs as $js)
                {
                    echo '<script type="text/javascript" src="'.basePath.'public/js/'.$js.'.js"></script>';
                }
            }
            //view css
            if(isset($this->css))
            {
                foreach($this->css as $css)
                {
                    echo '<link rel="stylesheet" type="text/css" href="'.basePath.'views/'.$css.'.css" />';
                }
            }
            //views js
            if(isset($this->js))
            {
                foreach($this->js as $js)
                {
                    echo '<script type="text/javascript" src="'.basePath.'views/'.$js.'.js"></script>';
                }
            }
        ?>
    </header>
    
    <body>
        <?php
        if($header)
        {?>
        <div id="header" style="height: 25px;">
                Scheduler
                
            </div>
        <?php 
        } ?>
        <?php
        if($menue)
        {
            if(Session::get('role') == 'admin')
            {?>
                <div id="menuSection">
                    <ul id="menu">
                        <li><a href="#">Employee</a></li>
                        <li><a href="#">Room</a></li>
                        <li><a href="#">Committee</a></li>
                    </ul>
                </div><?php
            }
            else
            {
            ?><div id="menuSection">
                    <ul id="menu">
                        <li><a href="/scheduler/employee">Employee</a></li>
                        <li><a href="#">Schedule</a></li>
                        <li><a href="/scheduler/meeting">Meeting</a></li>
                    </ul>
                </div><?php 
            }
            
        }?><div id="content">