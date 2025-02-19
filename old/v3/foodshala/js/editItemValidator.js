let editItemValidated=false;
let editPriceValidated=false;

$(document).ready(function()
{
	$('#editItemForm').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && (!editItemValidated || !editPriceValidated) ) 
	  { 
	    e.preventDefault();
	    return false;
	  }
	});

	$("#editSubmitButton").click(function() {
       $("#editItemForm").submit();
   	});
});

function editValidator(attr,val)
{
	if(attr=="name")
		editItemValidate(val);

	if(attr=="price")
		editPriceValidate(val);

	if(editItemValidated && editPriceValidated)
	{
		$("#editSubmitButton").removeClass("disabled");
	}
	else
		$("#editSubmitButton").addClass("disabled");
}

function editItemValidate(val)
{
	if(val==' ')
		$("#editItemName").val('');

	if(val.length>0 && val!==' ')
	{
		$("#editItemName").addClass("border-success");
		$("#editItemName").removeClass("border-danger");
		editItemValidated=true;
	}
	else
	{
		$("#editItemName").removeClass("border-success");
		$("#editItemName").addClass("border-danger");
		editItemValidated=false;
	}

}

function editPriceValidate(val)
{
	if(val==' ')
		$("#editItemPrice").val('');

	if(Number.isInteger(parseInt(val)) && val.length<=5 && val!==' ')
	{
		if(val.length>1)
			$("#editItemPrice").val(parseInt(val));
		$("#editItemPrice").addClass("border-success");
		$("#editItemPrice").removeClass("border-danger");
		editPriceValidated=true;
	}
	else
	{
		$("#editItemPrice").removeClass("border-success");
		$("#editItemPrice").addClass("border-danger");
		editPriceValidated=false;
	}
}

function editFill(id,name,price,category,type)
{
	$("#editItemId").val(id);
	$("#editItemName").val(name);
	$("#editItemPrice").val(price);
	$("#editItemCategory").val(category);
	$("#editItemType").val(type);
}