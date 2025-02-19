let itemValidated=false;
let priceValidated=false;

$(document).ready(function()
{
	$('#addNewItemForm').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && (!itemValidated || !priceValidated)) 
	  { 
	    e.preventDefault();
	    return false;
	  }
	});

	$("#addSubmitButton").click(function() {
       $("#addNewItemForm").submit();
   	});
});

function addValidator(attr,val)
{
	if(attr=="name")
		itemValidate(val);

	if(attr=="price")
		priceValidate(val);

	if(itemValidated && priceValidated)
	{
		$("#addSubmitButton").removeClass("disabled");
	}
	else
		$("#addSubmitButton").addClass("disabled");
}

function itemValidate(val)
{
	if(val==' ')
		$("#newItemName").val('');

	if(val.length>0 && val!==' ')
	{
		$("#newItemName").addClass("border-success");
		$("#newItemName").removeClass("border-danger");
		itemValidated=true;
	}
	else
	{
		$("#newItemName").removeClass("border-success");
		$("#newItemName").addClass("border-danger");
		itemValidated=false;
	}

}

function priceValidate(val)
{
	if(val==' ')
		$("#newItemPrice").val('');

	if(Number.isInteger(parseInt(val)) && val.length<=5 && val!==' ')
	{
		if(val.length>1)
			$("#newItemPrice").val(parseInt(val));
		$("#newItemPrice").addClass("border-success");
		$("#newItemPrice").removeClass("border-danger");
		priceValidated=true;
	}
	else
	{
		$("#newItemPrice").removeClass("border-success");
		$("#newItemPrice").addClass("border-danger");
		priceValidated=false;
	}
}