var fontColor = '#282828';
$(document).ready(function() 
{
    $( "#menu" ).menu();
    $('textarea').addClass("ui-corner-all");
    $('input:text, input:password').addClass("ui-corner-all");
    $('button, input:submit').button();
    
    $('#menuSection').css('height', $(window).height() - 50 +'px');
    
    
    $('#content').css('height', $(window).height() - 50 +'px');
    $('#content').css('width', $(window).width() - 250 +'px');
    
}); 


