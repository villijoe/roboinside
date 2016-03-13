/*
function handleAnswer(xhr){
	if(xhr.readyState === 4){
		if(xhr.status === 200){
			alert('echo');
			var response = xhr.responseText;
			alert(response);
		}
	}
}

function createXHR(request){
	var xhr = new XMLHttpRequest(),
		response = '';
	xhr.open("POST", "handle.php", true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				response = xhr.responseText;
				console.log(response);
			}
		}
		return response;
	}
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf8');
	xhr.send(request);
}

function auth(){
	var email = document.getElementById("email").value,
		password = document.getElementById("password").value,
		method = "authUser",
		request = 'email='+email+'&password='+password+'&method='+method,
		response = '';		
	response = createXHR(request);
	//console.log(response);
}*/



function funcSuccess(data) {
	$("#form").hide();
	var obj = $.parseJSON(data);
	if (obj.cookie) {
		$.cookie("email", obj.cookie, { expires: 1, path: '/' });
		window.location.reload();
	} else if (obj.back){
		$("#userList").html(obj.answer);
	} else if (obj.answer) {
		$("#logged").html(obj.answer);
	}
}

$(document).ready (function () {
	$("#logout").bind("click", function (e) {
		$.removeCookie("email", { path: '/' });
		window.location.reload();
	});


    $("#submit, #create, #listUsers").bind("click", function (e) {
		var id = e.currentTarget.id,
			emailVal = $("#email").val(),
			passwordVal = $("#password").val(),
			data = {};
		if (id === 'submit') {
			data = { method: 'authUser', email: emailVal, password: passwordVal };
		} else if (id === 'create') {
			data = { method: 'createUser', email: emailVal, password: passwordVal };
		} else if (id === 'listUsers') {
			data = { method: 'listUsers' };
		} else if (id === 'editUser') {
			data = { method: 'editUser', email: emailVal, password: passwordVal };
		}
		$.ajax ({
			url: "handle.php",
			type: "POST",
			data: (data),
			dataType: "html",
			success: funcSuccess
		});
	});
});
