function statusChangeCallback(response) {
	console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
    	// Logged into your app and Facebook.
testAPI();
		//window.location.replace('./fblogin/login-callback.php');
    } else if (response.status === 'not_authorized') {
      Login();
    } else {
      	// The person is not logged into Facebook, so we're not sure if
      	// they are logged into this app or not.
    }
}

/*function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
}*/

window.fbAsyncInit = function() {
	FB.init({
	appId      : '424503944415639',
	cookie     : true,  // enable cookies to allow the server to access 
	                    // the session
	xfbml      : true,  // parse social plugins on this page
	version    : 'v2.5' // use any version
});
	
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function testAPI() {
	FB.api('/me?', function(response) {
			//$("#hi").html("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>" );
			console.log('kostas',response);


		});

}

function Login(){
	FB.login(function(response) {
		if (response.authResponse) {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me?fields=id,name,email', function(response) {
				check_login(response);
			});
		}

		else {
			console.log('User cancelled login or did not fully authorize.');
		}
	},{ scope: 'email,user_photos,publish_actions,user_friends' });
}


//login page

/*
$(document).ready(function(){
	$('#login').bind().click(function(){
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
			}
			else
			{
				Login();
			}


		});

	});
});
*/

function check_login(response){
	$.ajax({
		type: "POST",
		url: "../model/profile.php",
		data: {
			email:response.email,
			name:response.name,
			photo:response.id,
			choice: 7
		},
		cache: false,
		success: function (data) {

			if(data=='register'){
				swal('You are not registered!!!','Register Now?','warning');
				swal({
						title: "It seems that you an Administrator",
						text: "Continue as a User or as Admin",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-primary",
						confirmButtonText: "Yes, as a administrator",
						cancelButtonText: "No, as a User ",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function (isConfirm) {
						if (isConfirm) {
							location.href = "admin_profile.php";
						}
						else {
							location.href = "profile.php";
						}
					});
			}
			else if(data=='ok'){
				swal({
					title: "Please wait...",
					time:200000,
					imageUrl:"images/ajax_loader.gif"
				});
				window.location.href = 'profile.php';
			}
		}
	});
}
