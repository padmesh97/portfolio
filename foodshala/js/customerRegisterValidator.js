let nameValidated=false;
let emailValidated=false;
let passwordValidated=false;
let contactValidated=false;

$(document).ready(function()
{
	$('#customerRegister').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && (!nameValidated || !emailValidated || !passwordValidated || !contactValidated)) 
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

	if(attr=="name")
		nameValidate(val);

	if(attr=="contact")
		contactValidate(val);

	if(emailValidated && passwordValidated && nameValidated && contactValidated)
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
		$("#customerEmail").val('');

	if(filter.test(val) && val!==' ')
	{
		$("#customerEmail").addClass("border-success");
		$("#customerEmail").removeClass("border-danger");
		emailValidated=true;
	}
	else
	{
		$("#customerEmail").removeClass("border-success");
		$("#customerEmail").addClass("border-danger");
		emailValidated=false;
	}
}
function passwordValidate(val)
{
	if(val==' ')
		$("#customerPassword").val('');

	if(val.length>=8 && val!==' ')
	{
		$("#customerPassword").addClass("border-success");
		$("#customerPassword").removeClass("border-danger");
		passwordValidated=true;
	}
	else
	{
		$("#customerPassword").removeClass("border-success");
		$("#customerPassword").addClass("border-danger");
		passwordValidated=false;
	}

}

function nameValidate(val)
{
	if(val==' ')
		$("#customerName").val('');

	if(val.length>1 && val!==' ')
	{
		$("#customerName").addClass("border-success");
		$("#customerName").removeClass("border-danger");
		nameValidated=true;
	}
	else
	{
		$("#customerName").removeClass("border-success");
		$("#customerName").addClass("border-danger");
		nameValidated=false;
	}	
}

function contactValidate(val)
{
	if(val==' ')
		$("#customerContact").val('');

	if(/^\d{10}$/.test(val) && val.length==10 && val.indexOf('-')==-1 &&val!==' ')
	{
		$("#customerContact").addClass("border-success");
		$("#customerContact").removeClass("border-danger");
		contactValidated=true;
	}
	else
	{
		$("#customerContact").removeClass("border-success");
		$("#customerContact").addClass("border-danger");
		contactValidated=false;
	}
}