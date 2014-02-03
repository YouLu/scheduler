<?php
class AdminController extends Controller
{

    public function __construct()
    {
        parent::__construct();
  
    }
    public function index()
    {
        $this->view->js = array('admin/js/default');
        $this->view->js = array('admin/css/default');
        $this->view->render('admin/index');
    }
}
?>