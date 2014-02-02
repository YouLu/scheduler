<?php
class MeetingController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        
        $this->view->publicJs = array('fullcalendar');
        $this->view->publicCss = array('fullcalendar');
        
        $this->view->data['employees'] = $this->getEmployees();
    }
    public function getMeetingAvailability()
    {

        $employeeIdsJson = $_GET['employeeIdsJson'];
        
        $employeeIds = json_decode($employeeIdsJson, true);
       
        $length = $_GET['length'];
        
        $availability = array(
            array('room'=>1, 'start'=>'Feb 12, 2014 8am', 'end'=>'Feb 12, 2014 10am'),
            array('room'=>2, 'start'=>'Feb 13, 2014 1pm', 'end'=>'Feb 13, 2014 3pm')
        );
        
        echo json_encode($availability);
       
    }
    
    private function getEmployees()
    {
        return $employees = array(
            array('id'=>'1', 'name'=>'employee 1'), 
            array('id'=>'2', 'name'=>'employee 2'), 
            array('id'=>'3', 'name'=>'employee 3')
            );
    }
    public function createMeeting()
    {
        $this->view->js = array('meeting/js/createMeeting');
        $this->view->css = array('meeting/css/createMeeting');
        $this->view->render('meeting/createMeeting');
    }
    public function index()
    {
        $this->view->js = array('meeting/js/default');
        $this->view->render('meeting/index');
    }
    
    
}
