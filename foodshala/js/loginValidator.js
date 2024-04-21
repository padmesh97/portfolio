let emailValidated=false;
let passwordValidated=false;

$(document).ready(function()
{
	$('#loginForm').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && (!emailValidated || !passwordValidated) ) 
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

	if(emailValidated && passwordValidated)
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
		$("#loginEmail").val('');

	if(filter.test(val)  && val!==' ')
	{
		$("#loginEmail").addClass("border-success");
		$("#loginEmail").removeClass("border-danger");
		emailValidated=true;
	}
	else
	{
		$("#loginEmail").removeClass("border-success");
		$("#loginEmail").addClass("border-danger");
		emailValidated=false;
	}
}
function passwordValidate(val)
{
	if(val==' ')
		$("#loginPassword").val('');

	if(val.length>=8 && val!==' ')
	{
		$("#loginPassword").addClass("border-success");
		$("#loginPassword").removeClass("border-danger");
		passwordValidated=true;
	}
	else
	{
		$("#loginPassword").removeClass("border-success");
		$("#loginPassword").addClass("border-danger");
		passwordValidated=false;
	}

}