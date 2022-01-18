let circlediv = document.getElementById("circlediv");
let startbtn = document.getElementById("startbutton");
let pixelshift = 1;
let storage = window.localStorage;
let messagecounter = 1;
let divanim = true; // div or canvas

// the following two functions are copied
function datetime() {
	var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	return dateTime = date + ' ' + time;
}

function allStorage() {
    var archive = [],
        keys = Object.keys(storage),
        i = 0, key;
    for (; key = keys[i]; i++) {
        archive.push( key + '=' + storage.getItem(key));
    }
    return archive;
}

// all functions below this line are original
function changestatus(statusmsg) {
	var infostring = statusmsg + " at " + datetime() + "."
	document.getElementById("infomessage").innerText = infostring;
	storage.setItem("message" + messagecounter, infostring);
	messagecounter = messagecounter + 1;
}

function initialscript() {
    storage.clear();
	changestatus("Initialized");
}

function openwork() {
	document.getElementById("work").style.visibility = "visible";
	changestatus("Opened");
	document.getElementById("logcollection").remove();
	document.getElementById("siteAds").style.overflow = "visible";
	if (divanim) { document.getElementById("circlediv").style.visibility = "visible"; }
	else { document.getElementById("circlecanvas").style.visibility = "visible"; }
}

function closework() {
	circlediv.style.left = "calc(50% - 10px)";
	circlediv.style.top = "calc(50% - 10px)";
	document.getElementById("work").style.visibility = "hidden";
	document.getElementById("work").style.visibility = "hidden";
	document.getElementById("work").style.visibility = "hidden";
	changestatus("Closed");
	var logsfromstorage = allStorage();
	var loglist = document.createElement("ul");
	loglist.id = "logcollection";
	for (var i = 0; i < logsfromstorage.length; i += 1) {
		var listitem = document.createElement("li");
		var listitemtext = document.createTextNode(logsfromstorage[i]);
		listitem.appendChild(listitemtext);
		loglist.appendChild(listitem);
	}
	document.getElementById("logs").appendChild(loglist);
	document.getElementById("siteAds").style.overflow = "auto";

	if (divanim) { document.getElementById("circlediv").style.visibility = "hidden"; }
	else { document.getElementById("circlecanvas").style.visibility = "hidden"; }
}

function drawcanvascircle() {
	var c = document.getElementById("circlecanvas");
	var ctx = c.getContext("2d");
	ctx.clearRect(0, 0, 240, 240);
	ctx.beginPath();
	ctx.arc(120, 120, 10, 0, 2 * Math.PI);
	ctx.stroke();
}

function choosediv() {
	divanim = true;
	document.getElementById("selectdiv").disabled = true;
	document.getElementById("selectcanvas").disabled = false;
	document.getElementById("circlediv").style.visibility = "visible";
	document.getElementById("circlecanvas").style.visibility = "hidden";
	startbtn.value = "Start";
	changestatus("Chose Div animation");
}

function choosecanvas() {
	divanim = false;
	document.getElementById("selectdiv").disabled = false;
	document.getElementById("selectcanvas").disabled = true;
	document.getElementById("circlediv").style.visibility = "hidden";
	document.getElementById("circlecanvas").style.visibility = "visible";
	startbtn.value = "Start";
	drawcanvascircle();
	changestatus("Chose Canvas animation");
}

function reload() {
	circlediv.style.left = "calc(50% - 10px)";
	circlediv.style.top = "calc(50% - 10px)";
	drawcanvascircle();

	changestatus("Reloaded");

	startbtn.value = "Start";
	startbtn.onclick = circanim;
}

async function canvasanim() {
	startbtn.disabled=true;

	changestatus("Started");

	// do stuff
	var c = document.getElementById("circlecanvas");
	var ctx = c.getContext("2d");
	var top = 120;
	var left = 120;
	var steps = 200;
	pixelshift = 1;

	for (var i = 0; i < steps; i++) {
		for (var j = 0; j < pixelshift; j++) {
			switch (i % 4) {
				case 0: // left
				left = left - 1;
				break;
				case 1: // up
				top = top - 1;
				break;
				case 2: // right
				left = left + 1;
				break;
				case 3: // down
				top = top + 1;
				break;
				default:
				alert("Помилка у... діленні на 4, чи що?");
				break;
			}
			ctx.clearRect(0, 0, 240, 240);
			ctx.beginPath();
			ctx.arc(left, top, 10, 0, 2 * Math.PI);
			ctx.stroke();
			await new Promise(r => setTimeout(r, 1));
		}
		pixelshift = pixelshift + 1;
		await new Promise(r => setTimeout(r, 150));
	}

	// endgame
	changestatus("Finished");
	startbtn.disabled = false;
	startbtn.onclick = reload;
	startbtn.innerText = "Reload";
}

async function divcircanim() {
	startbtn.disabled=true;

	changestatus("Started");

	circlediv.style.left = "calc(50% - 10px)";
	circlediv.style.top = "calc(50% - 10px)";

	var steps = 610;
	pixelshift = 1;
	for (var i = 0; i < steps; i++) {
		switch (i % 4) {
			case 0: // left
				circlediv.style.left = circlediv.style.left.slice(0, -1) + " - " + pixelshift + "px)";
				break;
			case 1: // up
				circlediv.style.top = circlediv.style.top.slice(0, -1) + " - " + pixelshift + "px)";
				break;
			case 2: // right
				circlediv.style.left = circlediv.style.left.slice(0, -1) + " + " + pixelshift + "px)";
				break;
			case 3: // down
				circlediv.style.top = circlediv.style.top.slice(0, -1) + " + " + pixelshift + "px)";
				break;
			default:
				alert("Error moving the circle!");
				break;
		}
		pixelshift = pixelshift + 1;
		await new Promise(r => setTimeout(r, 150));
	}
	// endgame
	changestatus("Finished");
	startbtn.disabled = false;
	startbtn.onclick = reload;
	startbtn.innerText = "Reload";
}

function circanim() {
	if (divanim) { divcircanim(); }
	else { canvasanim(); }
}