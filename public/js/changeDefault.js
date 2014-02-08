$(document).ready(function() 
{
    //$('#menuSection').css('height', $(window).height() - 50 +'px');

    
    
    $('#content').css('margin-left', 
    ($(window).width() - 960)/2 +'px');
    
    $('#content').css('margin-right', 
    ($(window).width() - 960)/2 +'px');
    
    $('#content').css('height', 
        $(window).height() - $('#menu-wrap').outerHeight(true) - $('#footer').height() +'px');
        
    $('#footer').css('margin-left', 
    ($(window).width() - 960)/2 +'px');
    
    $('#footer').css('margin-right', 
    ($(window).width() - 960)/2 +'px');
    
}); 

$(window).load(function()
{
      $('body').css('background-image', 'url(' + '/scheduler/public/images/bg.jpg' + ')');
});
