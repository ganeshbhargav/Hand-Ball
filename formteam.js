function x(id)
{
	return document.getElementById(id);
}
function dispteam()
{
	x("form").style.display="none";
	x("team").style.display="inline";
}
function dispform()
{
	x("team").style.display="none";
	x("form").style.display="inline";
}
	