$('#submit-no-reload').click(function() {
    //stoping the button to behave normally
    event.preventDefault();
    // setting up variables
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
    
    // sending POST request
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
            $('#thank-message').append('Thank you, '+fname+', for filling out the survey!');

           
        
        }               
    });
};
    

    
    
});