setTimeout(function(){ 
	if (document.getElementById("banner"))
		document.getElementById("banner").parentNode.removeChild(document.getElementById("banner"));
}, 5000);

function banner_create(text, color)
{
	var container = document.getElementById("container");
	var divbanner = document.createElement("div");

	if (color == "green")
		divbanner.className = "greenbanner banner";
	else
		divbanner.className = "redbanner banner";
	divbanner.id = "banner";
	divbanner.innerHTML = text;

	if (!document.getElementById("banner"))
	{
		container.parentNode.insertBefore(divbanner, container);
		setTimeout(function(){
			document.getElementById("banner").parentNode.removeChild(document.getElementById("banner"));
		}, 3000);
	}
}
