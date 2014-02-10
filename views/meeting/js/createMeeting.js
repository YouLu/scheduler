
$(document).ready(function() 
{    
    
    /*
    $("#id").click(function() 
    {    

        return false;
    });  
*/
 
//    $("#search").click(function() 
//    {    
//        $("#form").slideUp(speed);
//        $("#calendarSection").slideDown(speed);
//            
//        //$('#calendar').fullCalendar('render');
//        $('#calendar').fullCalendar( 'destroy' );
//        
////        $.getJSON("meeting/getMeetingAvailability",
////        {committeeId: committeeId}, 
////        function(result){
////            
////            $.each(result, function(key, val){
////             
////            });
////        });
//        
//        var rooms = [
//            {id:1, name:'room1'},
//            {id:2, name:'room2'}
//        ];
//        var today = new Date();
//        var meetings = [
//            {
//                title: 'Event 1',
//                allDay: false,
//                start: new Date(2014, 0, today.getDate(), 7, 30),
//                end: new Date(2014, 0, today.getDate(), 9, 30),
//                resourceId: 1
//            },
//            {
//                title: 'Event 1',
//                allDay: false,
//                start: new Date(2014, 0, today.getDate(), 10, 30),
//                end: new Date(2014, 0, today.getDate(), 12, 0),
//                resourceId: 2
//            }
//        ];
//        displayCalendar(rooms, meetings);
//        $('#calendar').fullCalendar( 'changeView', 'resourceDay');
//        return false;
//    }); 
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
    $(document).on("click", ".deleteSelectedEmployee", function() 
    {  
        var eid = $(this).attr('eid');
        $('#eid'+eid).remove();
    });  
    $( "#employees" ).change(function() {
        var employeeId = $(this).val();
        var employeeName = $(this).find("option:selected").text();
        var exists = $('#eid'+employeeId).length;
        
        if(!exists)
        {
            $('#selectedEmployees').append('<span id="eid'+employeeId+'"'+
                    ' class="selectedEmployee ui-corner-all ui-state-active"'+
                    ' eid="'+employeeId+'"' +
                    '><button class="deleteSelectedEmployee" eid="'+employeeId+'">x</button>'+
             
                    employeeName+'</span>');
            
            searchAvailability();
        }

    });
    $( "#length" ).keyup(function() {
        searchAvailability();
    });
    
    function getSelectedEmployees()
    {
        var employeeIds = {};
        
        $( ".selectedEmployee" ).each(function( index ) {
            employeeIds[index] = $(this).attr('eid');
        });
        
        var employeeIdsJson = JSON.stringify(employeeIds);
        return employeeIdsJson;
        
    }
    function searchAvailability() 
    {    
        var error = validateForSearchingAvailability();
        if(error === '')
        {
            var employeeIdsJson = getSelectedEmployees();
            var length = $('#length').val();

            $.getJSON("/scheduler/meeting/getMeetingAvailability",
            {employeeIdsJson: employeeIdsJson, length: length}, 
            function(result){

                $('#resultSection').show();
                $('#results').empty();

                $.each(result, function(key, val){
                    var room = val.room;
                    var start = val.start;
                    var end = val.end;

                    $('#results').append(
                    '<div class=" ui-state-default ui-corner-all result"'+
                            ' resultStatus=""'+
                            ' room="'+room+'"'+
                            ' start="'+start+'"'+
                            ' end="'+end+'"'+
                            '>'
                            +'<b>room: </b>'+room 
                            +'<span style="font-style:italic;"> ('+start + ' to ' +end + ')</span>'
                            +'</div>');
                  
                });
            });
        }
//        else
//        {
//            $( "#messageBox" ).attr('title', 'Error');
//            $( "#messageBox" ).empty();
//            $( "#messageBox" ).append(
//                    '<p>' 
//                    + error
//                    +'</p>'
//                    );
//            $( "#messageBox" ).dialog();
//        }
    }
    
    $(document).on("click", ".result", function() 
    {  
//        $('#createMeetingButtonSection').show();
//        var previousSelection = $('#results').find('[resultStatus="selected"]');
//        var exists = previousSelection.length;
//        if(exists)
//        {
//            //turn off previous previous selection
//            previousSelection.css('background-color', 'white');
//            previousSelection.css('color', fontColor);
//            previousSelection.attr('resultStatus','');
//        }
//        //turn on new selection
//        $(this).css('background-color', 'grey');
//        $(this).css('color', 'white');
//        $(this).attr('resultStatus', 'selected');
        createMeeting();
    });
    
    $(document).on("mouseover", ".result", function() 
    {
//        $(this).css('background-color', '#F8F8F8');
//        $(this).css('color', fontColor);
            $(this).removeClass( "ui-state-default" )
                    .addClass('ui-state-hover');
    });
    $(document).on("mouseout", ".result", function() 
    {

//        var resultStatus = $(this).attr('resultStatus');
//        if(resultStatus ==='selected')
//        {
//            $(this).css('background-color', 'grey');
//            $(this).css('color', 'white');
//        }
//        else
//        {
//            $(this).css('background-color', 'white');
//            $(this).css('color', fontColor);
//        }
        $(this).removeClass( "ui-state-hover" )
                    .addClass('ui-state-default');
    });
    
    function createMeeting() 
    {
        var employeeIdsJson = getSelectedEmployees();
        var length = $('#length').val();
        var name = $('#name').val();
        var description = $('#description').val();
        
        var selectedResult = $('#results').find('[resultStatus="selected"]');
        
        var room = selectedResult.attr('room');
        var start = selectedResult.attr('start');
        var end = selectedResult.attr('end');
        
        
        var error = validateForCreateMeeting(employeeIdsJson, name, description,
        room, start, end);
        if(error === '')
        {
            $.post("/scheduler/meeting/createMeetingInDatabase",
            {employeeIdsJson: employeeIdsJson,
            name: name,
            description: description,
            room: room,
            start: start,
            end: end
            }, 
            function(result){
                
                $( "#messageBox" ).empty();
                $( "#messageBox" ).append(
                        '<p>' 
                        + 'Meeting was created.'
                        +'</p>'
                        );
                $( "#messageBox" ).dialog();
                $( "#messageBox" ).dialog('option', 'title', 'Successful');
               
            });
        }
        else
        {
            $( "#messageBox" ).attr('title', 'Error');
            $( "#messageBox" ).empty();
            $( "#messageBox" ).append(
                    '<p>' 
                    + error
                    +'</p>'
                    );
            $( "#messageBox" ).dialog();
        }
        
    }
    function validateForSearchingAvailability()
    {
        var error = '';
        var employeesSelected = $('#selectedEmployees').find('.selectedEmployee').length;

        if(employeesSelected === 0)
        {
            error = error + '<br/>Please select participants';
        }
        var length = $('#length').val();
        if(length ==='')
        {
            error = error + '<br/>Please enter length';
        }
        
        
        return error;
    }
    function validateForCreateMeeting(employeeIdsJson, name, description,
    room, start, end)
    {
        var error = '';
        var employeesSelected = $('#selectedEmployees').find('.selectedEmployee').length;

        if(employeesSelected === 0)
        {
            error = error + '<br/>Please select participants';
        }
        
        if(name ==='')
        {
            error = error + '<br/>Please enter name';
        }
        
        if(description ==='')
        {
            error = error + '<br/>Please enter description';
        }
        
        if(room ==='')
        {
            error = error + '<br/>Please select room and time';
        }
        return error;
    }
    
});
