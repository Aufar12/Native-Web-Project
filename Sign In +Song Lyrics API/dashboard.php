<!DOCTYPE html>
<html>
<head>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <title>Dashboard</title>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
}

.left {
  left: 0;
}

.right {
  right: 0;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

body, html {
  height: 85%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("https://thumbs.gfycat.com/ComplexNiceBadger-max-1mb.gif");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>

<body class="bg" style="margin-top: 100px">
   <div class="split left">
    <div class="centered">
    <h3 style="color: white">Song Lyrics API</h3>
    <p style="color: white">Get Lyrics by Title & Artist Input.</p>
    <input type="text" id="tes" placeholder="Please input the Title.." style="color: white"><br>
    <input type="text" id="tes1" placeholder="Please input the Artist.." style="color: white"><br>
    <button onclick="search()">Search</button>
    <button onclick="signOut()">Sign Out</button>
  </div>
  </div>
  <div class="split right">
  <div class="centered">
     <fieldset>
      <h2 style="color: white">Result</h2>
      <table>
        <div style="overflow: auto; width:500px; height:450px; ">
            <p id="demo" style="white-space: pre-line; color: white"></p>
        </div>
      </table>
      </fieldset>
   </div>
</div>
</body>
</html>

<script>
  function search(){
    var x = document.getElementById('tes1').value;
    var y = document.getElementById('tes').value;
    z = "";
  fetch('https://api.lyrics.ovh/v1/'+x+'/'+y, {
  "method": "GET"
  }).then(function(response) {
    return response.json();
  })
  .then(function(myJson) {
    console.log(JSON.stringify(myJson));
    z = myJson["lyrics"];
    
    if (z == undefined) {
      swal("Sorry!", "Song not found.", "error");
      document.getElementById("demo").innerHTML = "Please try another song/artist.";
    }else{
      swal("Song Found!", "Have fun with the lyrics.", "success");
      document.getElementById("demo").innerHTML = z;
    }

  });

  }

  function signOut() {
      window.location.replace("SignIn.php");
      swal("Success!", "Sign Out Successful.", "success");
    };

</script>