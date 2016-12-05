$(document).ready(function(){    
    $('#postscroll').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            var url='trans/updateview';            
                $.post( url, {prod_id:$('#prod_id').val()},
                    function( data ) {
                        if(data.result===1){
                            unread();
                            window.location.reload();
                        }
                    }
                );
        }
    });
});