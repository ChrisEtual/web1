let storage = window.localStorage;

function cookiestoragecheck() {
	// Cookie check
	var thiscookie = document.cookie;
	if (thiscookie) {
		document.getElementById("inputnum").style.visibility = "hidden"; 
		var hidethese = document.getElementsByClassName("inputnum2");
		for (var i = 0; i < hidethese.length; i += 1) {
		    hidethese[i].style.visibility = "hidden";
		}
		var exprnum = /inputnum=(\d+)/g;
		var exprdigit = /digit=(\d)/g;
		var num = exprnum.exec(thiscookie)[1];
		var digit = exprdigit.exec(thiscookie)[1];
		alert("Збережена максимальна цифра числа " + num + " є " + digit + ".\nПісля натиснення \"ОК\" цифра зітреться з кукі.");
		document.cookie = "inputnum=done; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		document.cookie = "digit=done; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		location.reload();
	} else {
		// нічого робити не треба
	}
	// Storage check
	var wheretoalign = storage.getItem("align");
	["mainArticle", "mainNav", "siteAds"].forEach(elementId => document.getElementById(elementId).style.textAlign = wheretoalign);
	storage.removeItem("list");
	return true;
}

function parallelogram() {
	var aside = document.getElementById('aside').value;
	var bside = document.getElementById('bside').value;
	var angle = document.getElementById('angle').value;
	if (isNaN(aside)) {
		alert("Введіть нормальне число в якості довгої сторони.");
		return false;
	} else if (isNaN(bside)) {
		alert("Введіть нормальне число в якості короткої сторони.");
		return false;
	} else if (isNaN(angle)) {
		alert("Введіть нормальне число в якості кута.");
		return false;
	} else if (aside <= 0) {
		alert("Довга сторона має бути додатнім значенням.");
		return false;
	} else if (bside <= 0) {
		alert("Коротка сторона має бути додатнім значенням.");
		return false;
	} else if (angle <= 0) {
		alert("Кут має бути додатнім значенням.");
		return false;
	} else if (angle >= 90) {
		alert("Введіть градуси гострого кута паралелограма.");
		return false;
	} else if (aside <= bside) {
		alert("Коротка сторона має бути коротше довгої.\nНа те вона й коротка.");
		return false;
	} else {
		var area = aside * bside * Math.sin(angle * (Math.PI / 180));
		alert("Площа паралелограма дорівнює " + area + " квадратних сантиметрів.");
		return true;
	}
}

function switchcontent() {
	var coloumnA = document.getElementById('coloumnA');
	var coloumnAcontent = document.getElementById('coloumnA').innerHTML;
	var coloumnB = document.getElementById('coloumnB');
	var coloumnBcontent = document.getElementById('coloumnB').innerHTML;
	coloumnB.innerHTML = coloumnAcontent;
	coloumnA.innerHTML = coloumnBcontent;
	return true;
}

function naturalnumber() {
	var inputnum = parseInt(document.getElementById('inputnum').value);
	if (isNaN(inputnum)) {
		alert("Ви ввели не число. Введіть число.");
		return false;
	} else if (Number.isInteger(inputnum)) {
		var absnum = Math.abs(inputnum);
		var inputstring = absnum.toString();
		var digits = [];
		var len = inputstring.length;
		for (var i = 0; i < len; i += 1) {
		    digits.push(parseInt(inputstring.charAt(i)));
		}
		var maxdigit = Math.max(...digits);
		alert("Найбільша цифра у числі " + inputnum + " є " + maxdigit + ".");
		document.cookie = "inputnum=" + inputnum + "; path=/;";  
		document.cookie = "digit=" + maxdigit + "; path=/;";
		return true;
	} else {
		alert("Виникла якась помилка.");
		return false;
	}
}

function aligncookieleft() {
	storage.setItem("align", "left");
	return true;
}

function aligncookieright() {
	storage.setItem("align", "right");
	return true;
}

function onmousealignmain() {
	var wheretoalign = storage.getItem("align");
	document.getElementById("mainArticle").style.textAlign = wheretoalign;
	return true;
}

function onmousealignnav() {
	var wheretoalign = storage.getItem("align");
	document.getElementById("mainNav").style.textAlign = wheretoalign;
	return true;
}

function onmousealignads() {
	var wheretoalign = storage.getItem("align");
	document.getElementById("siteAds").style.textAlign = wheretoalign;
	return true;
}

let buttoncounter = 1;

function deleteinput(wrpid) {
	try {
		document.getElementById(wrpid).remove();
	}
	catch {
		alert("Не вдалося видалили елемент списку.");
	}
}

function addnewfield() {
	var wrapper = document.createElement("div");
	wrapper.id = "wrapper" + buttoncounter;

	var inputfield = document.createElement("input");
	inputfield.type = "text";
	inputfield.classList.add("inputfields");
	inputfield.id = "input" + buttoncounter;

	var buttonfield = document.createElement("button");
	var buttonfieldtext = document.createTextNode("Видалити");
	buttonfield.appendChild(buttonfieldtext);
	buttonfield.id = "button" + buttoncounter;
	var wrapperid = "wrapper" + buttoncounter;
	buttonfield.onclick = function() {deleteinput(wrapperid);};

	wrapper.append(inputfield, buttonfield);

	buttoncounter = buttoncounter + 1;
	document.getElementById("fieldwrapper").appendChild(wrapper);
}

function savefields() {
	var allfields = "";
	var savethese = document.getElementsByClassName("inputfields");
	var orderedlist = document.createElement("ol");
	for (var i = 0; i < savethese.length; i += 1) {
		var listitem = document.createElement("li");
		var listitemtext = document.createTextNode(savethese[i].value);
		listitem.appendChild(listitemtext);
		orderedlist.appendChild(listitem);
		allfields = allfields + savethese[i].value + ";";
	}
	storage.setItem("list", allfields);

	var placetoadd = document.getElementById("chooseelement").value;
	
	var finlistheader = document.createElement("h3");
	var finlistheadertext = document.createTextNode("Нумерований список");
	finlistheader.id = "finlistheader";
	finlistheader.appendChild(finlistheadertext);

	document.getElementById(placetoadd).append(finlistheader, orderedlist);

	document.getElementById("menuheader").remove();
	document.getElementById("fieldwrapper").remove();
	document.getElementById("addbutton").remove();
	document.getElementById("savebutton").remove();

	document.getElementById("chooseelement").disabled = false;
	document.getElementById("roztashuvaty").disabled = false;
}

function setmenu() {
	// Спочатку треба вимкнути штуки, щоб меню не можна було додати двічі
	document.getElementById("chooseelement").disabled = true;
	document.getElementById("roztashuvaty").disabled = true;
	
	// Створюємо меню
	var menuheader = document.createElement("h3");
	var menuheadertext = document.createTextNode("Меню додавання пунктів до списку");
	menuheader.id = "menuheader";
	menuheader.appendChild(menuheadertext);

	var fieldwrapper = document.createElement("div");
	fieldwrapper.id = "fieldwrapper";

	var addwrapper = document.createElement("div");
	var buttonadd = document.createElement("button");
	var buttonaddtext = document.createTextNode("Додати новий пункт");
	buttonadd.appendChild(buttonaddtext);
	buttonadd.id = "addbutton";
	buttonadd.onclick = addnewfield;
	addwrapper.appendChild(buttonadd);

	var savewrapper = document.createElement("div");
	var buttonsave = document.createElement("button");
	var buttonsavetext = document.createTextNode("Зберегти до сховища");
	buttonsave.appendChild(buttonsavetext);
	buttonsave.id = "savebutton";
	buttonsave.onclick = savefields;
	savewrapper.appendChild(buttonsave);

	// Додаємо всю цю шнягу
	placetoadd = document.getElementById("chooseelement").value;
	document.getElementById(placetoadd).style.overflow = "auto";
	document.getElementById(placetoadd).append(menuheader, fieldwrapper, addwrapper, savewrapper);

	addnewfield();
}