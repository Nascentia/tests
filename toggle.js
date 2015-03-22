function toggle(i,b)
{
	var info = document.getElementById(i);
		but = document.getElementById(b)
	if (info.style.visibility=='visible'){
		info.style.transition="all 0.5s linear 0s";
		info.style.opacity=0;
		info.style.height=0;
		info.style.visibility='hidden';
		but.innerHTML="+ d'infos";
	}
	else {
		info.style.transition="all 0.5s linear 0s";
		info.style.opacity=1;
		info.style.height="300px";
		info.style.visibility='visible';
		but.innerHTML="- d'infos";
	}
}

function hoverBox(e,divid)
{
	document.getElementById(divid).style.visibility='visible';
	document.getElementById(divid).style.transition="opacity 0.5s linear 0s";
	document.getElementById(divid).style.opacity=1;
	$(document).bind('mousemove', function(e){
    $('#'+divid).css({
       left:  e.pageX + 20,
       top:   e.pageY
    });
});
}

function hoverBoxKill(divid)
{
	document.getElementById(divid).style.visibility='hidden';
	document.getElementById(divid).style.opacity=0;
}