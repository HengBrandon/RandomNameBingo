// JavaScript Document
var button = document.getElementById("submit");
var text = document.getElementById("player_name");
var list = document.getElementById("player_list");
var error = document.getElementById('error');

function submitbyAjax(){
	var form = document.getElementById('myform');
	var action = form.getAttribute("action");
	
	 var form_data = new FormData(form);
//	console.log(form_data);
//	        for ([key, value] of form_data.entries()) {
//          console.log(key + ': ' + value);
//        }
	
	var xhr = new XMLHttpRequest();
	xhr.open('POST', action, true);
	
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   	xhr.onreadystatechange = function () {
    	if(xhr.readyState === 4 && xhr.status === 200) {
			text.value = "";
			var result = xhr.responseText;
			var json = JSON.parse(result);
			var tr = document.createElement('tr');
			var td1 = document.createElement('td');
			var td2 = document.createElement('td');
			td1.innerHTML = json.name;
			if(json.organization==='Orion_Student')
				td2.innerHTML += 'オリオン寮生';
			else
				td2.innerHTML += '健老会の方';
			tr.appendChild(td1);
			tr.appendChild(td2);
			list.appendChild(tr);
			error.innerHTML = " ";
        }else if(xhr.readyState === 4 && xhr.status===422){
			var result1 = xhr.responseText;
			var json1 = JSON.parse(result1);
			error.innerHTML = json1.errors.name[0];
		}
    };
	xhr.send(form_data);
};

button.addEventListener('click',function(event){
	event.preventDefault();
	submitbyAjax();
});