
$( document ).ready(function() 
{
    $( "#loginDialog" ).dialog({
      resizable: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        Ok: function() 
        {
            $('#signinForm').submit();
            //$( this ).dialog( "close" );
        }
      }
    });
});

