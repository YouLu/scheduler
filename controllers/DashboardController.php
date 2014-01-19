<?php
class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->view->js = array('dashboard/js/default.js');
    }
    function index()
    {
        $this->view->render('dashboard/index');
    }
    
    
}
?>
