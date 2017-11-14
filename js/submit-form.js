$('#submit-no-reload').click(function() {
    event.preventDefault();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var recs = $("#recs").val();
    var software = [];
    $('.software').each(function(){
        if($(this).is(":checked"))
        {
            software.push($(this).val())
        }
    });
    software = software.toString();

    // learned from https://www.youtube.com/watch?v=lHLHxi60eo8

    var helpful = '';
    $('.helpful').each(function(){
        if($(this).is(":checked")){
            helpful = $(this).val();
        } 
    });
    
    $.ajax({
        url: 'submit-data.php',
        type: 'POST',
        data: {
            fname: fname,
            lname: lname,
            email: email,
            recs: recs,
            software: software,
            helpful: helpful
        },
        success: function(msg) {

            $('#fname').val(''); 
            $('#lname').val('');
            $('#email').val('');
            $('.helpful').prop('checked', false);
        
            $('.software').prop('checked', false); 
            $('#recs').val('');
        
            $('#survey').addClass('hide');
            
            $('section#thank-message-container').removeClass('hide');
            $('#thank-message').append('Thank you '+fname+' for filling out the survey!');

           
        
        }               
    });
   
    

    
    
});