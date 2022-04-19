function validate_forgot_password()
{
	let username = document.forms["forgot_password"]["username"].value;
	let usertype = document.forms["forgot_password"]["usertype"].value;
	let phone = document.forms["forgot_password"]["Phone"].value;
	if (username == "" ||  usertype == "" || phone =="")
	{
		alert("Fill up the box");
		return false;
	}
	else
	{
		return true;
	}
}