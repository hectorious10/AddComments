unread();
    function unread(){
    var url = 'trans/missmsgcount/';
    
    $.post( url, {prod_id:$('#prod_id').val()},
        function( data ) {
            if(data.result==1){
                $("#msgunread span").text(data.count);
            }else{
                $('#unread').text(data.count);
            }
        }, "json");
    } 