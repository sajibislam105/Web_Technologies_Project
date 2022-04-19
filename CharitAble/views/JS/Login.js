function validate_login() // login page
{
	let username = document.forms["loginform"]["username"].value;
	let password = document.forms["loginform"]["password"].value;
	if (username == "" ||  password == "")
	{
		alert("Fill up the box");
		return false;
	}
}