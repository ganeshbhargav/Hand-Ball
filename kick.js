var imgcount=1;
function run()
{
	var img=document.getElementById("kick");
	switch(imgcount)
	{
		case 1:	img.src="kick1.jpg";
				break;
		case 2:	img.src="kick2.jpg";
				break;
		case 3:	img.src="kick3.jpg";
				break;
		case 4:	img.src="kick4.jpg";
				break;
		case 5:	img.src="kick5.jpg";
				break;
		case 6:	img.src="kick6.jpg";
				break;
	}
	imgcount++;
	if(imgcount==10)
		imgcount=1;
}
var x=window.setInterval("run()",300);


