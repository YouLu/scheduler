$(document).ready(function() 
{ 

    $('.meeting-header').width($('.meeting-toppanel').width()-$(".meeting-button-edit").outerWidth(true)-5+'px');
  
    //meeting-button-edit
    $(document).on("mouseover", ".meeting-button-edit", function() 
    {
        $(this).removeClass( "ui-state-default" )
                    .addClass('ui-state-hover');
    });
    $(document).on("mouseout", ".meeting-button-edit", function() 
    {
        $(this).removeClass( "ui-state-hover" )
                .addClass('ui-state-default');
    });
    //--------------------------------------------------------------------------
    $(document).on("mouseover", ".meeting-header", function() 
    {
        var meetingElementId = $(this).attr('meetingElementId');
        if($('#meeting-header-'+meetingElementId).hasClass( "ui-state-default" ))
        {
            $('#meeting-header-'+meetingElementId).removeClass( "ui-state-default" )
                    .addClass('ui-state-hover');
        }
    });

    $(document).on("mouseout", ".meeting", function() 
    {
        var meetingElementId = $(this).attr('meetingElementId');
        if($('#meeting-header-'+meetingElementId).hasClass( "ui-state-hover" ))
        {
            $('#meeting-header-'+meetingElementId).removeClass( "ui-state-hover" )
                    .addClass('ui-state-default');
        }
  
    });
    
    $(document).on("click", ".meeting-header", function() 
    {
        var meetingElementId = $(this).attr('meetingElementId');
        if($('#meeting-header-'+meetingElementId).hasClass( "ui-state-hover" ))
        {
            $('#meeting-header-'+meetingElementId).removeClass( "ui-state-hover" )
                    .addClass('ui-state-active');

            $('#meeting-content-'+meetingElementId).slideDown();
        }
        else
        {
            $('#meeting-header-'+meetingElementId).removeClass( "ui-state-active" )
                    .addClass('ui-state-hover');
            $('#meeting-content-'+meetingElementId).slideUp();
        }
        
    });
   
});