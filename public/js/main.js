(function($){
		
	$.base64encode = function(value,callback) 
	{
		var reader = new FileReader();
		reader.onload = callback;
		reader.readAsDataURL(value);
	},
	$.fn.prepareSend = function(e) 
	{
		element = $(this);
		$.base64encode(e.target.files[0], function(e){
			img = e.target.result;
			$(element).parents("form").append('<input type="hidden" name="image[]" value="'+img+'"/>');	
			element.val('');
		});
	},
	

}) ( jQuery );






