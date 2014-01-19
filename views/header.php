<!Doctype html>
<html>
    <header>
        <link rel="stylesheet" type="text/css" href="<?php echo basePath; ?>public/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo basePath; ?>public/css/jquery-ui-1.10.3.custom.css" />
        
        <script src="<?php echo basePath; ?>public/js/jquery.js"></script>
        <script src="<?php echo basePath; ?>public/js/jquery-ui-1.10.3.custom.js"></script>
        
        <?php
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