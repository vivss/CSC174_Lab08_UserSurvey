$('.update').click(function(){
    event.preventDefault();
    $(this).each(function() {
        var container = $(this);
        var name = container.data('name');
        var id = container.data('id');
    $('#survey').removeClass('hide');
    $('#title-edit').text('');
    $('#title-edit').append('Updating record submitted by '+name+' (ID= '+id+')');
    $('#submit-no-reload').data('forupdate', id);

    $

})
})