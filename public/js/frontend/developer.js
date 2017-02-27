$(document).ready(function(){
	var base_adress = $('#base_url').val();
		
function validate_login(){
}
    $("#login_form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required"
        },
        messages: {
            email: {
                required: "Please enter an email id",
                email: "Please enter a valid email address"
            },
            password: "Please enter your password"
        },
        submitHandler: function (form, event) {
				  event.preventDefault();
		var email = $("#email").val();
            var password = $("#password").val();
              
            user_login(email, password);
        }
    });
function user_login(email, password) {
    var remember = $('#remember_check').val();
    var url = base_adress + "User_Authentication/login_jquery";
    $.ajax({
        type: "POST",
        url: url,
        data: "email=" + email + "&password=" + password + "&remember_me=" + remember ,
        async: true,
        success: function (msg)
        {
			if(msg=="2"){
			$('#error_login').text('Account blocked. Contact support service.');
			$('#email-error').html('');
			$('#password-error').html('');

			}
			if(msg=="l"){
		
			$('#error_login').text('Email/Password not Matched.');
			
			$('#email-error').html('');
			$('#password-error').html('');
			}
			if(msg=="u"){
			$('#error_login').text('');
			$('#password-error').html('');
			$('#email-error').html('Please enter a valid email');
			$("#email-error"). removeAttr("style")
			
			}
			if(msg=="p"){
			$('#error_login').text('');
			$('#email-error').html('');
			$('#password-error').html('Enter your password');
			$("#password-error"). removeAttr("style")
			}
			if(msg=="b"){
			$('#email-error').html('Please enter a valid Email.');
			$('#password-error').html('Enter Your password');
			$('#error_login').text('');
			}
				if(msg=="1"){
			location.reload();
			}
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Error occured. Please try again later.");
        }
    });
}

});