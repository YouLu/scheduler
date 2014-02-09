<?php
class MeetingController extends Controller
{
    public function __construct()
    {
        parent::__construct();

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

        $this->view->data['employees'] = $this->getEmployees();
        
        $this->view->js = array('meeting/js/createMeeting');
        $this->view->css = array('meeting/css/createMeeting');
        $this->view->render('meeting/createMeeting');
    }
    public function createMeetingInDatabase()
    {
        $employeeIdsJson = $_POST['employeeIdsJson'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $room = $_POST['room'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        
        echo $employeeIdsJson;
        
    }

    public function index()
    {
        $this->view->data['meetings'] = $this->getMeetings();
        
        $this->view->css = array('meeting/css/default');
        $this->view->js = array('meeting/js/default');
        $this->view->render('meeting/index');
    }
    private function getMeetings()
    {
        return array(
            array('name'=>'meeting2',
                'description'=>'test meeting',
                'start'=> '2/3/2014 8.30am',
                'end'=> '2/3/2014 10.30am',
                'owner' => array('id'=>1, 'name'=>'employee1'),
                'members' => array(
                    array('id'=>2, 'name'=>'employee2'),
                    array('id'=>3, 'name'=>'employee3')
                    )
                ),
            
            array('name'=>'meeting1',
                'description'=>'test meeting',
                'start'=> '2/3/2014 8.30am',
                'end'=> '2/3/2014 10.30am',
                'owner' => array('id'=>1, 'name'=>'employee1'),
                'members' => array(
                    array('id'=>2, 'name'=>'employee2'),
                    array('id'=>3, 'name'=>'employee3')
                    )
                )
            
        );
    }
    
    
}
