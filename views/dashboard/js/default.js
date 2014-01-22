
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
            right: 'month,agendaWeek,agendaDay'
        },
        //height: 500,
        aspectRatio: 3,
        weekends: false // will hide Saturdays and Sundays
        
        
        // put your options and callbacks here
    })
});
