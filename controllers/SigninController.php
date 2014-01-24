<?php
class SigninController extends Controller
{

    public function __construct()
    {
        parent::__construct('Signin');
        
        
        
    }
    public function index()
    {
        $this->view->js = array('signin/js/default');
        $this->view->render('signin/index', FALSE, FALSE);
    }
    function run ()
    {
        $this->model->run();
    }
}
?>
