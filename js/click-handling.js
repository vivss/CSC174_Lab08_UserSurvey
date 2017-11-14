$('.update').click(function(){
    event.preventDefault();
    $(this).each(function() {
        var container = $(this);
        var fname = container.data('fname');
        var lname = container.data('lname');
        var email = container.data('email');
        var software_str = container.data('software');
        var helpful = container.data('helpful');
        var recs = container.data('recs');
        var software = software_str.split(",");
        var id = container.data('id');
    $('#survey').removeClass('hide');


    
    // Pre-populate the form with existing data

    //check checkboxes
    var softwareLength = software.length;
    $('.software').attr("checked", false);
    if (softwareLength > 1){
    for (var i = 0; i < softwareLength; i++) {
        
        var elementCheck = '#'+software[i];
        console.log(elementCheck);
        $(elementCheck).attr("checked", true);
    }
}

  //check a radio button
  console.log(helpful);
  if (helpful>0){
  $('.helpful').attr("checked", false);
    var helpfulCheck = '#radio'+helpful;
      console.log(helpfulCheck);
      $(helpfulCheck).attr("checked", true);
  }


    //fill the forms with existing data
    
    $('#fname').val(fname);
    $('#lname').val(lname);
    $('#email').val(email);
    $('#recs').val(recs);
    
    


    $('#title-edit').text('');
    $('#title-edit').append('Updating record submitted by '+fname+' '+lname+' (ID= '+id+')');
    $('#submit-no-reload').data('forupdate', id);


    

})
})