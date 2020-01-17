// Открить модальне окно котактов, закрыть все остальные
btnOpenContact.onclick = function() {
	contactsModal.style.display = "block";
}
// Закрить модальне окно контактов
contactsModalCloseBtn.onclick = function() {
	contactsModal.style.display = "none";
}

function addFriend(element){
	var friend_list = document.querySelector("#friend_list");
	var link = element.dataset.link;
	console.log(element)
	// Создать обьект для отправки http запроса
	var ajax = new XMLHttpRequest();
		ajax.open("GET", link, false);
		ajax.send();

	friend_list.innerHTML = ajax.response;
}



var poisk = document.querySelector("#poisk");

	poisk.onsubmit = function(e) {
		e.preventDefault();

		var input = poisk.querySelector("input[name='poisk-text']");
		
		var a = "?poisk-text=" + input.value;
		
		var ajax = new XMLHttpRequest();
		ajax.open("GET", poisk.action + a, false);
		ajax.send();

		var spisok = document.querySelector("#spisok");
			spisok.innerHTML = ajax.response;
	}

var form = document.querySelector("#form");

	form.onsubmit = function(e) {
		e.preventDefault();

		var input_from = form.querySelector("input[name='from_user_id']");
		var input_to = form.querySelector("input[name='to_user_id']");
		var text = form.querySelector("textarea");

		var a = "otpravka_sms=1" +
				"&to_user_id=" + input_to.value +
				"&from_user_id=" + input_from.value +
				"&text=" + text.value;
		console.log(a);

		var ajax = new XMLHttpRequest();
		ajax.open("POST", form.action, false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(a);

		var message = document.querySelector('#spisok-soobsheniya');
			message.innerHTML = ajax.response;
			text.value = "";

	}