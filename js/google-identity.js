/*
 * Javascript functions for Google Identity API
 */

var user = null;


function signIn(user) {
	var profile;

	profile = user.getBasicProfile();

	user ={
		name: profile.getName(),
		email: profile.getEmail()
	}

	console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.  console.log('Name: ' + profile.getName());
	console.log('Image URL: ' + profile.getImageUrl());
	console.log('Email: ' + profile.getEmail());
	console.log('Name: ' + profile.getName());

	self.close();
	window.opener.location.href = "/events/new";
}

function signOut() {
	var auth2;

	auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut();
	//<div class="g-signin2" data-onsuccess="onSignIn"></div>
}

// I'm a fucking retard
