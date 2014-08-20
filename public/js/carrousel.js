var pictures = new Array('images/200x200/barbie.jpg','images/200x200/buggy.jpg', 'images/200x200/harry.jpg', 'images/200x200/iphone3.jpg', 'images/200x200/nivea.jpg', 'images/200x200/tandenborstel.jpg');
var items = pictures.length;
var angles = new Array(items);
var images = new Array(items);
var rx = 200;
var ry = 40;
var cx = 300;
var cy = 300;

function itemSize(){
	for(var i = 0; i < items; i++){
		images[i] = new Image();
		images[i].src = pictures[i];
	}
	initCar();
}

function initCar(){
	var content = document.getElementById('carContent');
	for(var i = 0; i < items; i++){
		/*
		360 / 6 = 60		Math.PI * 2 <=> 360		((Math.PI *2) / items) * i
		60 * i = 
		60 * 0 = 0
		60 * 1 = 60
		60 * 2 = 120
		60 * 3 = 180
		60 * 4 = 240
		60 * 5 = 300
		*/
		angles[i] = ((Math.PI *2) / items) * i;
		var xpos = (Math.cos(angles[i]) * rx) + cx;
		var ypos = (Math.sin(angles[i]) * ry) + cy;
		var obj = newObj(i, xpos, ypos, parseInt(ypos), pictures[i])
		content.innerHTML += obj;
	}
	setInterval('rotateCar()', 15);
}

function rotateCar(){
	for(var i = 0; i < items; i++){
		angles[i] += 0.008;		//radians
		var xpos = (Math.cos(angles[i]) * rx) + cx;
		var ypos = (Math.sin(angles[i]) * ry) + cy;
		var obj = document.getElementById('obj' + i);
		obj.style.left = xpos + 'px';
		obj.style.top = ypos + 'px';
		obj.style.zIndex = parseInt(ypos);

		var objImg = document.getElementById('img' + i);
		var delta = (ypos - cy + ry) / (2 * ry);
		delta = (delta + 1) / 2;
		objImg.style.height = (delta * images[i].height) + 'px';
		objImg.style.width = (delta * images[i].width) + 'px';
	}
}

function newObj(id, x, y, z, src) {
	return '<div id="obj' + id + '" onclick="clickItem(' + id + ')" style="position:absolute; left:' + x + 'px; top:' + y + 'px; z-index' + z + ' width:100px;"><img id="img' + id + '" src="' + src + '" /></div>';
}

function clickItem(id){
	alert(id);
}