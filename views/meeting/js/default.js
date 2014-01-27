
$(document).ready(function() 
{    
    var speed = 'fast';
    /*
    $("#id").click(function() 
    {    

        return false;
    });  
*/
    $("#searchAgain").click(function() 
    {    
        $("#form").slideDown(speed);
        $("#calendarSection").hide('slow');
    }); 
    $("#search").click(function() 
    {    
        $("#form").slideUp(speed);
        $("#calendarSection").slideDown(speed);
            
        //$('#calendar').fullCalendar('render');
        $('#calendar').fullCalendar( 'destroy' );
        
//        $.getJSON("meeting/getMeetingAvailability",
//        {committeeId: committeeId}, 
//        function(result){
//            
//            $.each(result, function(key, val){
//             
//            });
//        });
        
        var rooms = [
            {id:1, name:'room1'},
            {id:2, name:'room2'}
        ];
        var today = new Date();
        var meetings = [
            {
                title: 'Event 1',
                allDay: false,
                start: new Date(2014, 0, today.getDate(), 7, 30),
                end: new Date(2014, 0, today.getDate(), 9, 30),
                resourceId: 1
            },
            {
                title: 'Event 1',
                allDay: false,
                start: new Date(2014, 0, today.getDate(), 10, 30),
                end: new Date(2014, 0, today.getDate(), 12, 0),
                resourceId: 2
            }
        ];
        displayCalendar(rooms, meetings);
        $('#calendar').fullCalendar( 'changeView', 'resourceDay');
        return false;
    }); 
    function displayCalendar(resources, events)
    {
        $('#calendar').fullCalendar({
        
            header: {
                left: 'prev,next today',
                center: 'title',
                //right: 'month,agendaWeek,agendaDay,resourceDay'
                right: 'resourceDay'
            },
            //height: 500,
            aspectRatio: 3,
            weekends: false,// will hide Saturdays and Sundays

            resources: resources,
//            resources:
//            [
//                {
//                    name: 'Resource 1',
//                    id: 1
//                }
//                
//            ],
            //new Date(year, month [, day, hours, minutes, seconds, ms])
            //new Date(2011, 0, 1, 2, 3, 4, 567) // 1 Jan 2011, 02:03:04.567 in local 
            events: events
//            events: [
//                {
//                    title: 'Event 1',
//                    allDay: false,
//                    start: new Date(2014, 0, 26, 6, 30),
//                    end: new Date(2014, 0, 26, 8, 30),
//                    resourceId: 1
//                }
//            ]

            // put your options and callbacks here
        });
    }
    $( "#committee" ).change(function() {
        var committeeId = $(this).val();
        
        $.getJSON("meeting/getCommitteeMembers",
        {committeeId: committeeId}, 
        function(result){
            $("#membersSection").slideUp(speed);
            $("#membersSection").slideDown(speed);
            $("#members").empty();
            $.each(result, function(key, val){
              $("#members").append(
                    '<div>'+
                      '<input type="checkbox"/>'+ val.name+
                    '</div>'
                      );
            });
        });
  
    });

    $('#content').css('height', $(window).height() - 50 +'px');

});
