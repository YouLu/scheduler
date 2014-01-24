<?php
class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->view->js = array('dashboard/js/default');
        $this->view->publicJs = array('fullcalendar');
        $this->view->publicCss = array('fullcalendar');
    }
    function index()
    {
        $this->view->render('dashboard/index');
    }
    
    
}
?>
