let validated=false;

$(document).ready(function()
{
	$('#searchForm').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13 && !validated) 
	  { 
	    e.preventDefault();
	    return false;
	  }
	});
});

function fill(searchCat)
{
	let searchVal=document.getElementById("searchValue");

	if(searchCat=="restaurant")
		searchValue.placeholder="Enter the restaurant name";
	else
		searchValue.placeholder="Enter the dish name";
}

function searchValidate(val)
{
	if(val==' ')
		$("#searchValue").val('');

	if(val.length>0 && val!==' ')
	{
		validated=true;
		$("#searchValue").addClass("border-success");
		$("#searchValue").removeClass("border-danger");
		$("#searchSubmit").removeClass("disabled");
	}
	else
	{
		validated=false;
		$("#searchValue").removeClass("border-success");
		$("#searchValue").addClass("border-danger");
		$("#searchSubmit").addClass("disabled");
	}
}