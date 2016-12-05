$(document).ready(function(){
    $("#comment_form").submit(function(evt){        
        evt.preventDefault();
        var url=$(this).attr('action');
        var postData = $(this).serialize();    
        $.post( url, postData , function( data ) {
            if(data.result==1){
                window.location.reload();
            }else{
                $("#comment_form_error").show();
                $("#comment_form_error").html(data.error); // John
            }
        }, "json");
    });   
});