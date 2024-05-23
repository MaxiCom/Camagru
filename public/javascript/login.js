setTimeout(function(){ 
	document.body.className = "loaded";
}, 2000);

function form_login(form)
{
	var request = "username=" + form.username.value 
				+ "&password=" + form.password.value;
	
	ajax(request, "/includes/script/login_script.php", null, 0);
	return (false);
}

function form_register(form)
{
	var request = "username=" + form.username.value
				+ "&password=" + form.password.value
				+ "&email=" + form.email.value;
	
	ajax(request, "/includes/script/register.php", form, 0);
	return (false);
}

function form_forgot(form)
{
	var request = "email=" + form.forgotemail.value;
	
	ajax(request, "/includes/script/forgot.php", form, 0);
	return (false);
}


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
