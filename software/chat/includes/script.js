          loadChat()
        //reload every secound
        setInterval(function(){
                  loadChat()

        }, 3000);
        //retrive info to chat
        function loadChat(){
            $.post('includes/message.php?action=getMessage', function(response){
              //scrool to bottom
             var scrollPosition = $('#chat').scrollTop();
            var scrollPosition = parseInt(scrollPosition) + 510;
         var scrollHeight = $('#chat').prop('scrollHeight');
 
                                $('#chat').html(response);

                if(scrollPosition < scrollHeight){
                   
             }else{
                   
                    $('#chat').scrollTop( $( '#chat').prop('scrollHeight') );

            }

            });
        }
        //submit on enter
        $('.textarea').keyup(function(e){
if(e.which == 13){
$('form').submit();
}     
        });
        
        //send data
        $('form').submit(function(){
            var message = $('.textarea').val();
            $.post('includes/message.php?action=sendMessage&message=' +message, function(response){
               if(response == 1){
                             loadChat()

                   document.getElementById('messageform').reset();
               }
            });
            return false;
        });
      
        