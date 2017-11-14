$('#submit-no-reload').click(function() {
    event.preventDefault();
    var id = $(this).data('forupdate');
    console.log(id);
    var fname = $("#fname").val();
    console.log(fname);
    var lname = $("#lname").val();
    console.log(lname);
    var email = $("#email").val();
    console.log(email);
    var recs = $("#recs").val();
    console.log(recs);
    var software = [];
    $('.software').each(function(){
        if($(this).is(":checked"))
        {
            software.push($(this).val())
        }
    });
    software = software.toString();
    console.log(software);

    // learned from https://www.youtube.com/watch?v=lHLHxi60eo8

    var helpful = '';
    $('.helpful').each(function(){
        if($(this).is(":checked")){
            helpful = $(this).val();
        } 
    });
    console.log(helpful);
    
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
        
            $('section#survey').toggleClass('hide');
            
            $('#thank-message-container').removeClass('hide').delay(3000).queue(function () {
                $(this).addClass('hide')
            });
            
            $('#title-edit').text('');

            
        }               
    });
   
    

    
    
});