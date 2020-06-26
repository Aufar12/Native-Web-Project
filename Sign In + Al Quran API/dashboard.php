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
  background-image: url("https://www.pixelstalk.net/wp-content/uploads/2016/08/1280-x-800-Wallpaper-HD.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>

<body class="bg" style="margin-top: 20px; color: white">
    <div class="centered">
       <h2>List Ayat Al-Quran</h2>
      <div style="overflow: auto; width:1400px; height:500px; margin-bottom: 40px">
        <table style="white-space: pre-line; color: white" id="tabelAgama">
        </table>
      </div>
      <button onclick="signOut()" style="background-color: green">Sign Out</button>
</div>
</body>
</html>

<script>
  fetch('https://al-quran-8d642.firebaseio.com/data.json?print=pretty', {
  "method": "GET"
  }).then(function(response) {
    return response.json();
  })
  .then(function(myJson) {
    console.log(JSON.stringify(myJson));

  for (var i = myJson.length - 1; i >= 0; i--) {

    var table = document.getElementById("tabelAgama");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
    var cell9 = row.insertCell(8);
    var cell10 = row.insertCell(9);

    cell1.innerHTML = myJson[i]['arti'];
    cell2.innerHTML = myJson[i]['asma'];
    cell3.innerHTML = myJson[i]['ayat'];
    cell4.innerHTML = myJson[i]['keterangan'];
    cell5.innerHTML =  myJson[i]['nama'];
    cell6.innerHTML =  myJson[i]['nomor'];
    cell7.innerHTML =  myJson[i]['rukuk'];
    cell8.innerHTML =  myJson[i]['type'];
    cell9.innerHTML =  myJson[i]['urut'];
    cell10.innerHTML =  "";

  }

    var table = document.getElementById("tabelAgama");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
    var cell9 = row.insertCell(8);
    var cell10 = row.insertCell(9);

    cell1.innerHTML = 'ARTI';
    cell2.innerHTML = 'ASMA';
    cell3.innerHTML = 'AYAT';
    cell4.innerHTML = 'KETERANGAN';
    cell5.innerHTML = 'NAMA';
    cell6.innerHTML = 'NOMOR';
    cell7.innerHTML = 'RUKUK';
    cell8.innerHTML = 'TYPE';
    cell9.innerHTML = 'URUT';
    cell10.innerHTML =  "";
  });


  function signOut() {
      window.location.replace("SignIn.php");
      swal("Success!", "Sign Out Successful.", "success");
    };

</script>