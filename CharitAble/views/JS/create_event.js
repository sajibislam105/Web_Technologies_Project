function validate_create_event()
{
	let ename = document.forms["create_event"]["ename"].value;
	let organization_type = document.forms["create_event"]["type"].value;
	let DOE = document.forms["create_event"]["DOE"].value;
	let s_des = document.forms["create_event"]["Short_description"].value;
	let details = document.forms["create_event"]["Details"].value;

	if (ename == "" ||  organization_type == "" || DOE =="" || s_des == "" || details =="")
	{
		alert("Fill up the box");
		return false;
	}
	else
	{
		return true;
	}
}

function validate_update_event()
{
	let ename = document.forms["update_event"]["ename"].value;
	let organization_type = document.forms["update_event"]["type"].value;
	let DOE = document.forms["update_event"]["DOE"].value;
	let s_des = document.forms["update_event"]["Short_description"].value;
	let details = document.forms["update_event"]["Details"].value;

	if (ename == "" ||  organization_type == "" || DOE =="" || s_des == "" || details =="")
	{
		alert("Fill up the box");
		return false;
	}
	else
	{
		return true;
	}
}

function validate_delete_event()
{
	let e_name = document.forms["delete_event"]["ename"].value;
	let e_id = document.forms["delete_event"]["e_id"].value;
	let e_type = document.forms["delete_event"]["type"].value;

	if (e_name == "" ||  e_type == "" || e_id =="")
	{
		alert("Fill up the box");
		return false;
	}
	else
	{
		return true;
	}
}