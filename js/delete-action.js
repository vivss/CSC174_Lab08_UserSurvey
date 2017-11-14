$('#delete').click(function() {
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
            $('#delete-msg').append("Item ID"+id+"has been deleted.");
            $(id_remove).remove();
        }
		})
    });

	
	
   
	});