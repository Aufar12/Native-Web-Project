<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.2.3/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-auth.js"></script>
	<script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
	<link type="text/css" rel="stylesheet" 
	href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css"/>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">

<style>
body, html {
  height: 85%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("https://cdnb.artstation.com/p/assets/images/images/005/778/331/original/herimamitiana-randriamasinoro-starfall-by-rkuma-dazyigr.gif?1493712254");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

</head>

<body class="bg" style="margin-top: 110px">
	<center>
		<h1 style="color: white">Sign In - Song Lyrics API</h1>
		<h5 style="color: white">Select Method :</h5>
		<div id="firebaseui-auth-container"></div>
		<div id="loader">Loading...</div>
		<h5 style="color: white">Mohammad Aufar</h5>
	</center>
</body>

<script>
  var firebaseConfig = {
    apiKey: "AIzaSyAi6Zb0l8HpehXjkZgd6Ll32KofSJv7CEs",
    authDomain: "teslogin-e9a3d.firebaseapp.com",
    databaseURL: "https://teslogin-e9a3d.firebaseio.com",
    projectId: "teslogin-e9a3d",
    storageBucket: "teslogin-e9a3d.appspot.com",
    messagingSenderId: "839865382086",
    appId: "1:839865382086:web:acae1dab743252aeeb93c7",
    measurementId: "G-C323NNNRWJ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  var ui = new firebaseui.auth.AuthUI(firebase.auth());

	ui.start('#firebaseui-auth-container', {
	  signInOptions: [
	    // List of OAuth providers supported.
	    firebase.auth.GoogleAuthProvider.PROVIDER_ID,
	    firebase.auth.FacebookAuthProvider.PROVIDER_ID,
	    firebase.auth.TwitterAuthProvider.PROVIDER_ID
	  ],
	  // Other config options...
	});

	var uiConfig = {
  callbacks: {
    signInSuccessWithAuthResult: function(authResult, redirectUrl) {
      return true;
    },
    uiShown: function() {
      document.getElementById('loader').style.display = 'none';
    }
  },
  signInFlow: 'popup',
  signInSuccessUrl: 'dashboard.php',
  signInOptions: [
    // Leave the lines as is for the providers you want to offer your users.
    firebase.auth.GoogleAuthProvider.PROVIDER_ID,
    firebase.auth.FacebookAuthProvider.PROVIDER_ID,
    firebase.auth.TwitterAuthProvider.PROVIDER_ID
  ],
  // Terms of service url.
  tosUrl: 'google.com',
  // Privacy policy url.
  privacyPolicyUrl: 'https://app-privacy-policy-generator.firebaseapp.com/'
};

ui.start('#firebaseui-auth-container', uiConfig);
</script>
</html>