function validate_ban_user()
{
	let users_username = document.forms["ban_user"]["user's_username"].value;

	if (users_username == "")
	{
		alert("Fill the box. \nPlease decide carefully who you want to ban");
		return false;
	}
	else
	{
		return true;
	}
}