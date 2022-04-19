function fire_employee()
{
	let ename = document.forms["fire"]["employee_name"].value;

	if (ename == "")
	{
		alert("Fill the box. \nPlease decide carefully which employee you want to fire");
		return false;
	}
	else
	{
		return true;
	}
}