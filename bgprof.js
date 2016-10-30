var img=document.getElementById("bg");

var x=window.setInterval("run()",100);



var a=0;
var time=0;
function run()
{

	var a=Math.ceil(Math.random()*12);
	time++;
	time=time%130;
	if(time<30) img.style.opacity=0.7+time*0.01;
	if(time>70)img.style.opacity=1.7-(time*0.01);
	if(time%130==0)
	{
		switch(a)

		{

			case 1:	img.src="celeb1.jpg";
				break;

			case 2:	img.src="celeb2.jpg";

				break;

			case 3:	img.src="celeb3.jpg";

				break;

			case 4:	img.src="celeb4.jpg";
	
				break;

			case 5:	img.src="celeb5.jpg";

				break;

			case 6:	img.src="loadingpg.jpg";
	
				break;
                 		                   case 7:	img.src="loading.jpg";
	
				break;

			case 8:       img.src="fifa.jpg";
				break;
			case 9:       img.src="fifacrowd.jpg";
				break;
			case 10:     img.src="lineup.jpg";
				break;
			case 11:	img.src="lineup2.jpg";
				break;
			case 12:	img.src="penalty.jpg";
				break;
		}
		img.style.opacity=0;
	}
	
}

function play()
{
	alert("in");
	var x=document.getElementById("gaming");
	x.style.opacity=1;
	x.src="cputeam.html";
	var xt=document.getElementById("exit");
	xt.style.zIndex=50;
}

function exitgame()
{
	var x=document.getElementById("gaming");
	x.style.opacity=0;
	x.src="";
	var xt=document.getElementById("exit");
	xt.style.zIndex=-10;
}
	