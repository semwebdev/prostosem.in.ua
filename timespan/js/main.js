$('#dateForm').submit(function(){
   var date = $('#date').val();
   var number = $('input:radio:checked').val();
   $.ajax({
            url: 'backend.php',
            type:'POST',
            dataType: 'json',
            cache: 'false',
            data: ({ 'date' : date, 'number' : number}),
            success: function(response){
                    $('#result span').html(response);
                } // End of success function of ajax form
            }); // End of ajax call
   return false;
});