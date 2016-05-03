$(document).ready(function() {
	$("#createuser").hide();
});

function valid(posts) {
	var request = $.ajax({
		url:"valsign.php",
		method:"POST",
		data:posts,
		datatype:"text"
	});

	return data;
}

function pass_post(posts) {

	if(data == 0) {

	$.ajax({
		url:"signup.php",
		type:"POST",
		data:posts,
		success:function(data,status,jqXHR){
            alert("Data: " + data + "\nStatus: " + status)}
	});
	}
	else {
		alert("Account already exists");
	}

	request.done(function(data) {
		if(data == 0) {

		$.ajax({
			url:"signup.php",
			type:"POST",
			data:posts
		});
		alert("Account created!")
		}
		else {
			alert("Account already exists");
		}
	});
}

$("#cre").click(function() {
	var createuser = $("#createusername").val();
	var creemail = $("#createemail").val();
	var createpass = $("#createpassword").val();
	var createaffl = $("#createaffiliation").val();

	var posts = {user:createuser,email:createemail,password:createpass,affiliation:createaffiliation};

	var val = val(posts);
	alert(val);

	valid(posts);
});

$("#create").click(function() {
	$("#create").hide();
	$("#forgot").hide();
	$("#login").hide();
	$("#createuser").show();
});

    
