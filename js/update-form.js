$('#submit-no-reload').click(function() {
    event.preventDefault();
    var id = $(this).data('forupdate');
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
    console.log(helpful);
    

    // check if the required fields are filled
    if (!fname){
        alert('Please enter your first name!');
        return "something is wrong";
    } else if (!lname) {
        alert('Please enter your last name!');
        return "something is wrong";
    } else if (!email) {
        alert('Please enter your email!');
        return "something is wrong";
    } else if (!email.includes('@')) {
        alert('Please enter a valid email address!');
        return "something is wrong"; 
    } else {


    $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {
            fname: fname,
            lname: lname,
            email: email,
            recs: recs,
            software: software,
            helpful: helpful,
            id: id
        },
        success: function(msg) {

            $('#fname').val(''); 
            $('#lname').val('');
            $('#email').val('');
            $('.helpful').prop('checked', false);
        
            $('.software').prop('checked', false); 
            $('#recs').val('');

            $('table#data-table').addClass('hide');
        
            $('section#survey').toggleClass('hide');
            
            $('#thank-message-container').toggleClass('hide');
            $('#thank-message').text('The record number '+id+ ' has been updated! The page will refresh automatically in 5 seconds!')
            
        // source of code:https://stackoverflow.com/questions/28510620/delay-doesnt-work-second-time-jquery
            $('#title-edit').text('');

       
       
            // source of code for redirecting page: https://gist.github.com/Joel-James/62d98e8cb3a1b6b05102
        window.setTimeout(function(){
            window.location = "admin.php";
             }, 5000)    
       

            
        }               
    });
   
    
    }
    
    
});