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

function ajax(request, link, form, home)
{
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function(){

		if (xmlhttp.readyState == XMLHttpRequest.DONE)
		{	
			if (xmlhttp.responseText == "Success")
			{
				//si il y a un formulaire a changer
				if (form != null)
				{
					banner_create("Check your inbox", "green");
					form.reset();
				}
				else if (home == 1)
				{
					if (link != "/includes/script/upload_comment.php" && link != "/includes/script/like_post.php")
						banner_create("Done !", "green");
				}
				else
					document.location.href = "/";
			}
			else
				banner_create(xmlhttp.responseText, "red");
		}
	};

	xmlhttp.open("POST", link, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(request);
}
