function Change_password()
{
	let pass = document.forms["change_password"]["password"].value;

	if (pass == "")
	{
		alert("New password can not be empty !!!");
		return false;
	}
	else
	{
		return true;
	}
}