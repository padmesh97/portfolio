$(document).ready(function()
{
	$('#deleteItemForm').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && (!itemValidated || !priceValidated) ) 
	  { 
	    e.preventDefault();
	    return false;
	  }
	});

	$("#deleteSubmitButton").click(function() {
       $("#deleteItemForm").submit();
   	});
});

function deleteFill(id,item)
{
	$(document).ready(function(){
		$("#deleteItemId").val(id);
		$("#deleteItemName").html(item);
	});
}