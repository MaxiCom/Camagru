setTimeout(function(){ 
	if (document.getElementById("banner"))
		document.getElementById("banner").parentNode.removeChild(document.getElementById("banner"));
}, 5000);

function switch_form(elem)
{
	var form_login = document.getElementById("form_login");
	var form_login_style = window.getComputedStyle(form_login);

	var form_register = document.getElementById("form_register");
	var form_register_style = window.getComputedStyle(form_register);

	var form_forgot = document.getElementById("form_forgot");
	var form_forgot_style = window.getComputedStyle(form_forgot);

	if (elem.id == "table_login")
		if (form_login_style.getPropertyValue('display') == "none")
		{
			form_login.style.display = "block";
			form_register.style.display = "none";
			form_forgot.style.display = "none";

			document.getElementById("table_register").style.backgroundColor = "#0FBBB5";
			document.getElementById("table_forgot").style.backgroundColor = "#0FBBB5";
			elem.style.backgroundColor = "#19D2CB";
		}

	if (elem.id == "table_register")
		if (form_register_style.getPropertyValue('display') == "none")
		{
			form_register.style.display = "block";
			form_login.style.display = "none";
			form_forgot.style.display = "none";

			document.getElementById("table_login").style.backgroundColor = "#0FBBB5";
			document.getElementById("table_forgot").style.backgroundColor = "#0FBBB5";
			elem.style.backgroundColor = "#19D2CB";
		}

	if (elem.id == "table_forgot")
		if (form_forgot_style.getPropertyValue('display') == "none")
		{
			form_forgot.style.display = "block";
			form_register.style.display = "none";
			form_login.style.display = "none";

			document.getElementById("table_register").style.backgroundColor = "#0FBBB5";
			document.getElementById("table_login").style.backgroundColor = "#0FBBB5";
			elem.style.backgroundColor = "#19D2CB";
		}
}

function banner_create(text, color)
{
	var container = document.getElementById("container");
	var divbanner = document.createElement("div");

	if (color == "green")
		divbanner.className = "greenbanner";
	else
		divbanner.className = "redbanner";
	divbanner.id = "banner";
	divbanner.innerHTML = text;

	container.parentNode.insertBefore(divbanner, container);
	setTimeout(function(){ document.getElementById("banner").parentNode.removeChild(document.getElementById("banner")); }, 3000);

}

function ajax(request, link, form)
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

function form_login(form)
{
	var request = "username=" + form.username.value 
				+ "&password=" + form.password.value;
	
	ajax(request, "/includes/script/login_script.php", null);
	return (false);
}

function form_register(form)
{
	var request = "username=" + form.username.value
				+ "&password=" + form.password.value
				+ "&email=" + form.email.value;
	
	ajax(request, "/includes/script/register.php", form);
	return (false);
}

function form_forgot(form)
{
	var request = "email=" + form.forgotemail.value;
	
	ajax(request, "/includes/script/forgot.php", form);
	return (false);
}
