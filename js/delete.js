$('.delete').click(function() {
    event.preventDefault();
	if (confirm('Are you sure you want to delete this item?')==true) {
    event.preventDefault();
    $(this).each(function() {
        var container = $(this);
        var id = container.data('container');
        var id_remove = "#"+id;

		// from https://stackoverflow.com/questions/23740548/how-to-pass-variables-and-data-from-php-to-javascript
		console.log(id_remove);

		$.ajax({
        type: "GET",
        url: "delete.php",
        data:{'id':id},
        success:function(msg)
        {   
            $('#delete-msg').text("Item "+id+"has been deleted.").delay(3000).queue(function () {
                $(this).text('');
                $(this).dequeue();
            });
            
            $(id_remove).remove();
        }
		})
    });

} else {
    return "You clicked cancel!";
}
	
   
	});