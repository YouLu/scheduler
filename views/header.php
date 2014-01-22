<!Doctype html>
<html>
    <header>
        <link rel="stylesheet" type="text/css" href="<?php echo basePath; ?>public/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo basePath; ?>public/css/jquery-ui-1.10.3.custom.css" />
        
        <script src="<?php echo basePath; ?>public/js/jquery.js"></script>
        <script src="<?php echo basePath; ?>public/js/jquery-ui-1.10.3.custom.js"></script>
        
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
            //views js
            if(isset($this->js))
            {
                foreach($this->js as $js)
                {
                    echo '<script type="text/javascript" src="'.basePath.'views/'.$js.'"></script>';
                }
            }
        ?>
    </header>
    
    <body>
        <?php
        if($header)
        {?>
            <div id="header" >
                Header 
                <br/>

            </div>
        <?php 
        } ?>
        
        <div id="content">