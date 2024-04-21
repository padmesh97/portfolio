var orderObj={}; //object(key,value) pair for storing food items to be ordered

var amount=0;

var ckie=JSON.parse(atob(getCookie("cart_items")));

//updating items and total amount in DOM due to previous stored cart in cookie

if(Object.keys(ckie).length>0)
{
	orderObj=ckie;

	for(let i=0;i<Object.keys(ckie).length;i++)
	{
		let foodItem= document.getElementById(Object.keys(ckie)[i]);
		foodItem.innerHTML=Object.values(ckie)[i];
		let retrievePrice=foodItem.getAttribute('data-item-price');
		amount+=(parseInt(retrievePrice) * parseInt(Object.values(ckie)[i]));
	}
	//updating total amount in DOM and toggling proceed button
	document.getElementById("totalAmount").innerHTML=amount;
	document.getElementById("postAmount").value=amount;
	toggleProceedButton(amount);
}

function createOrder(id,operation,price)
{
	if(!(id in orderObj) && operation=="add")
	{
		orderObj[id]=1;
		amount+=parseInt(price);
	}
	else
	{
		if(operation=='add')
		{
			orderObj[id]++;
			amount+=parseInt(price);
		}

		if(operation=='subtract' && (id in orderObj)  && orderObj[id]!=0)
		{
			if(orderObj[id]==1)
			{
				delete orderObj[id];
				amount-=parseInt(price);
			}
			else
			{
				orderObj[id]--;
				amount-=parseInt(price);
			}
		}
	}

	if(id in orderObj) //checking for existence of food item in order object
		document.getElementById(id).innerHTML=orderObj[id];
	else
		document.getElementById(id).innerHTML=0;

	//toggling proceed button enable/disable
	toggleProceedButton(amount);

	//updating totalAmount in DOM
	document.getElementById("totalAmount").innerHTML=amount;
	document.getElementById("postAmount").value=amount;

	//converting order object->JSON->base64 for effecient cookie storage
	var item_json=btoa(JSON.stringify(orderObj));

	document.cookie = "cart_items="+item_json+";path=/;max-age="+86400*30+";SameSite=lax"; //setting JSON in cookie for cart items retrival
	
}

function getCookie(name) 
{
    // splitting cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}

function toggleProceedButton(amt)
{
	if(parseInt(amt)>0)
		$("#proceedButton").removeClass("disabled");
	else
		$("#proceedButton").addClass("disabled");
}