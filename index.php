<?php

require 'config/paths.php';

/*
require 'libs/bootstrap.php';
require 'libs/controller.php';
require 'libs/view.php';
require 'libs/model.php';
require 'libs/hash.php';



require 'libs/database.php';
require 'libs/session.php';
*/
//this function is used instead of above manual includes
//when file is required when class is created, this function is automatically called
function __autoload($class)
{
	require libs."$class.php";
}


$application = new Bootstrap();

?>
