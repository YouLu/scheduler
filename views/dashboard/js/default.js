
$(document).ready(function() 
{     
    /*
    $("#id").click(function() 
    {    

        return false;
    });  
*/
    $('#content').css('height', $(window).height() - 50 +'px');

    $('#calendar').fullCalendar({
        
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,resourceDay'
        },
        //height: 500,
        aspectRatio: 3,
        weekends: false,// will hide Saturdays and Sundays
        
        resources: [
            {
                name: 'Resource 1',
                id: 1
            }
        ],
        //new Date(year, month [, day, hours, minutes, seconds, ms])
        //new Date(2011, 0, 1, 2, 3, 4, 567) // 1 Jan 2011, 02:03:04.567 in local 
        events: [
            {
                title: 'All Day Event 1',
                allDay: false,
                start: new Date(2014, 0, 23, 8, 30),
                end: new Date(2014, 0, 23, 10, 30),
                resourceId: 1
            }
        ]
        
        // put your options and callbacks here
    })
});
