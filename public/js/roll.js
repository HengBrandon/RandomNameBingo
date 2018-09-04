// JavaScript Document
var data = [];
var show_data = [];
window.onload = function(){
	var xhr = new XMLHttpRequest();
	xhr.open('GET','/roll', true);
	
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   	xhr.onreadystatechange = function () {
			if(xhr.readyState === 4 && xhr.status === 200) {
			var result = xhr.responseText;
			var json = JSON.parse(result);
			show_data = json.players;
			for(var i = 0; i<json.players.length ; i++)
				data.push(json.players[i].name);
//			console.log(data);
		}
	};
	xhr.send();
};

var rollState = true;
var roll = document.getElementById("roll");
var roll_display = document.getElementById("roll_display");
var get,rolling;

function roll_name(){
	if(rollState){
		if(data.length!==0){
			roll.innerHTML = "STOP";
			roll.style.backgroundColor="#FF0000";
			rollState = !rollState;
			rolling = setInterval(function(){generateRandom();},30);
		}
		else{
			roll_display.innerHTML = "全部選ばれた";
			rollState = true;
		}
	}else{
		roll.innerHTML = "ROLL";
		roll.style.backgroundColor="#4CAF50";
		rollState = !rollState;
		clearInterval(rolling);
		console.log(data[get]);
		sendToDatabase(data[get]);
		data.splice(get,1);
		show_data.splice(get,1);
		console.log(data);
		console.log(show_data);
	}
}

function generateRandom() {
	var min = 0;
	var max = data.length-1;
	var random = Math.floor(Math.random() * (max - min + 1)) + min;
	get = random;
	roll_display.innerHTML =  data[random];
}

function sendToDatabase(name){
	var data = [];
	var xhr1 = new XMLHttpRequest();
	xhr1.open('GET','/seleted?name='+name, true);
	
	xhr1.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   	xhr1.onreadystatechange = function () {
			if(xhr1.readyState === 4 && xhr1.status === 200) {
			var result1 = xhr1.responseText;
			var json1 = JSON.parse(result1);
				
			var list = document.getElementById("player_list");
			var tr = document.createElement('tr');
			var td1 = document.createElement('td');
			var td2 = document.createElement('td');
			td1.innerHTML = json1.name;
			if(json1.organization==='Orion_Student')
				td2.innerHTML += 'オリオン寮生';
			else
				td2.innerHTML += '健老会の方';
			tr.appendChild(td1);
			tr.appendChild(td2);
			list.appendChild(tr);
		}
	};
	xhr1.send();
}
           

roll.addEventListener('click',function(){
	roll_name();
});

