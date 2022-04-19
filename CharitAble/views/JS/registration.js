function validate_registration() //registration
{
	let firstname = document.forms["registration"]["fname"].value;
	let lastname = document.forms["registration"]["lname"].value;
	let Present_Address = document.forms["registration"]["Present_Address"].value;
	let Permanent_Address = document.forms["registration"]["Permanent_Address"].value;
	let Phone = document.forms["registration"]["Phone"].value;
	let Email = document.forms["registration"]["Email"].value;
	let username = document.forms["registration"]["uname"].value;
	let password = document.forms["registration"]["password"].value;
	let cfpassword = document.forms["registration"]["cfpassword"].value;	

	if (firstname == "" || lastname =="" || Present_address == "" ||  Permanent_Address == "" || Phone == "" ||  Email == "" || username == "" ||  password == "" ||  cfpassword == "")
	{
		alert("Fill up the box");
		return false;
	}
}