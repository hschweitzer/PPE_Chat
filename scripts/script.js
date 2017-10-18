function showInscription()
{
	document.getElementById("inscription").classList.add("show");
	document.getElementById("connexion").classList.remove("show");
	document.getElementById("voile").classList.add("show");
	previousStep();
	document.getElementById("signup_client").classList.add("first-show");
	document.getElementById("signup_name").focus();
}

function showConnexion()
{
	document.getElementById("connexion").classList.add("show");
	document.getElementById("inscription").classList.remove("show");
	document.getElementById("voile").classList.add("show");
	document.getElementById("login_client").classList.add("first-show");
	document.getElementById("login_email").focus();
}

function hideInscription()
{
	document.getElementById("inscription").classList.remove("show");
	document.getElementById("voile").classList.remove("show");
}

function hideConnexion()
{
	document.getElementById("connexion").classList.remove("show");
	document.getElementById("voile").classList.remove("show");
}

function nextStep()
{
	document.getElementById("signup_client").classList.remove("first-show");
	document.getElementById("signup_client").classList.remove("show");
	document.getElementById("signup_chien").classList.add("show");
}

function previousStep()
{
	document.getElementById("signup_client").classList.add("show");
	document.getElementById("signup_chien").classList.remove("show");
}

function enableForm()
{
	document.getElementById("form_disable").removeAttribute("disabled");
	document.getElementById("enable_form").classList.add("no-display");
	document.getElementById("disable_form").classList.remove("no-display");
	document.getElementById("apply_changes").classList.remove("no-display");
}

function disableForm()
{
	document.getElementById("enable_form").classList.remove("no-display");
	document.getElementById("disable_form").classList.add("no-display");
	document.getElementById("apply_changes").classList.add("no-display");
	$("#form_reload").load(location.href + " #form_reload");
}

function formActivateFamille(active)
{
	if (active == "true")
	{
		$("#token-membre").removeAttr('disabled');
		$("#form_chien_disable").attr('disabled', 'disabled');
	}
	else if (active == "false")
	{
		$("#token-membre").attr('disabled', 'disabled');
		$("#form_chien_disable").removeAttr('disabled');
	}
}

function activateTxtLof(active)
{
	if (active == "true")
	{
		$("#txt-lof").removeAttr('disabled');
	}
	else if (active == "false")
	{
		$("#txt-lof").attr('disabled', 'disabled');
	}
}
