$(document).ready(function() 
{ 
    
    $(document).on("mouseover", ".meeting", function() 
    {
        var owner = $(this).attr('ownerId');
        
        var employee = $(this).attr('employeeId');

        if(owner === employee)
        {
            $(this).css('background-color', 'gray');
            $(this).css('color', 'white');
            //fontColor
        }
    });
    $(document).on("mouseout", ".meeting", function() 
    {
        $(this).css('background-color', 'white');
        $(this).css('color', fontColor);
  
    });
});