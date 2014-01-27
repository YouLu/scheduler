<?php
class MeetingController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->view->js = array('meeting/js/default');
        $this->view->publicJs = array('fullcalendar');
        $this->view->publicCss = array('fullcalendar');
        
        $this->view->data['committees'] = $this->getCommittees();
    }
    public function getMeetingAvailability()
    {
        
    }
    public function getCommitteeMembers()
    {
        $committeeId = $_GET['committeeId'];
        
        $committeeMembers = array(
            1 => array(array('id'=>1, 'name'=>'employee 1')),
            2 => array(
                array('id'=>2, 'name'=>'employee 2'),
                array('id'=>3, 'name'=>'employee 3')
                ),
            3 => array(array('id'=>3, 'name'=>'employee 3'))
        );
        $selectedCommitteeMembers = $committeeMembers[$committeeId];
        echo json_encode($selectedCommitteeMembers);
        //echo json_encode(array($committeeId));
    }
    private function getCommittees()
    {
        return $committees = array(
            array('id'=>'1', 'name'=>'committee 1'), 
            array('id'=>'2', 'name'=>'committee 2'), 
            array('id'=>'3', 'name'=>'committee 3')
            );
    }
            function index()
    {
        $this->view->render('meeting/index');
    }
    
    
}
