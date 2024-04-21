let restaurantNameValidated=false;
let restaurantOwnerValidated=false;
let emailValidated=false;
let passwordValidated=false;
let contactValidated=false;
let areaValidated=false;

$(document).ready(function()
{
	$('#restaurantRegister').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && (!restaurantNameValidated || !restaurantOwnerValidated || !emailValidated || !passwordValidated || !contactValidated || !areaValidated)) 
	  { 
	    e.preventDefault();
	    return false;
	  }
	});
});

function validator(attr,val)
{
	if(attr=="email")
		emailValidate(val);

	if(attr=="password")
		passwordValidate(val);

	if(attr=="restaurantName")
		restaurantNameValidate(val);

	if(attr=="ownerName")
		restaurantOwnerValidate(val);

	if(attr=="contact")
		contactValidate(val);

	if(attr=="area")
		areaValidate(val);

	if(emailValidated && passwordValidated && restaurantOwnerValidated && restaurantNameValidated &&
	 contactValidated && areaValidated)
	{
		$("#submitButton").removeClass("disabled");
	}
	else
		$("#submitButton").addClass("disabled");
}

function emailValidate(val)
{
	var filter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if(val==' ')
		$("#restaurantEmail").val('');

	if(filter.test(val) && val!==' ')
	{
		$("#restaurantEmail").addClass("border-success");
		$("#restaurantEmail").removeClass("border-danger");
		emailValidated=true;
	}
	else
	{
		$("#restaurantEmail").removeClass("border-success");
		$("#restaurantEmail").addClass("border-danger");
		emailValidated=false;
	}
}
function passwordValidate(val)
{
	if(val==' ')
		$("#restaurantPassword").val('');

	if(val.length>=8 && val!==' ')
	{
		$("#restaurantPassword").addClass("border-success");
		$("#restaurantPassword").removeClass("border-danger");
		passwordValidated=true;
	}
	else
	{
		$("#restaurantPassword").removeClass("border-success");
		$("#restaurantPassword").addClass("border-danger");
		passwordValidated=false;
	}

}

function restaurantNameValidate(val)
{
	if(val==' ')
		$("#restaurantName").val('');

	if(val.length>1 && val!==' ')
	{
		$("#restaurantName").addClass("border-success");
		$("#restaurantName").removeClass("border-danger");
		restaurantNameValidated=true;
	}
	else
	{
		$("#restaurantName").removeClass("border-success");
		$("#restaurantName").addClass("border-danger");
		restaurantNameValidated=false;
	}	
}

function restaurantOwnerValidate(val)
{
	if(val==' ')
		$("#restaurantOwner").val('');

	if(val.length>1 && val!==' ')
	{
		$("#restaurantOwner").addClass("border-success");
		$("#restaurantOwner").removeClass("border-danger");
		restaurantOwnerValidated=true;
	}
	else
	{
		$("#restaurantOwner").removeClass("border-success");
		$("#restaurantOwner").addClass("border-danger");
		restaurantOwnerValidated=false;
	}	
}

function areaValidate(val)
{
	if(val==' ')
		$("#restaurantArea").val('');

	if(val.length>1 && val!==' ')
	{
		$("#restaurantArea").addClass("border-success");
		$("#restaurantArea").removeClass("border-danger");
		areaValidated=true;
	}
	else
	{
		$("#restaurantArea").removeClass("border-success");
		$("#restaurantArea").addClass("border-danger");
		areaValidated=false;
	}	
}

function contactValidate(val)
{
	if(val==' ')
		$("#restaurantContact").val('');

	if(/^\d{10}$/.test(val) && val.length==10 && val.indexOf('-')==-1 && val!==' ')
	{
		$("#restaurantContact").addClass("border-success");
		$("#restaurantContact").removeClass("border-danger");
		contactValidated=true;
	}
	else
	{
		$("#restaurantContact").removeClass("border-success");
		$("#restaurantContact").addClass("border-danger");
		contactValidated=false;
	}
}