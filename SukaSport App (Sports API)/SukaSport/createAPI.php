<?php

$koneksi = mysqli_connect('localhost','root','','tubeseai');
// $sql = "SELECT * FROM users";
$sql = "SELECT * FROM pembeliantiket";
$kueri = mysqli_query($koneksi, $sql);

$hasil = array();
$counter = 0;

if ($kueri->num_rows > 0) {
    // output data of each row
    while($row = $kueri->fetch_assoc()) {
        // echo "id: " . $row["nama"]. " - Name: " . $row["nim"]. " " . $row["kelas"]. "<br>";
        // $hasil['tes'][$row['idUser']] = array(
        // 	'id' => $row['idUser'],
        // 	'username' => $row['username'],
        // 	'pass' => $row['pass'],
        // 	'email' => $row['email']
        // );

        $hasil['tickets'][$counter] = array(
        	'kodeBooking' => $row['kodeBooking'],
        	'kelas' => $row['kelas'],
            'jumlah' => $row['jumlah'],
            'lunas' => $row['status1']
        );

        $tieck = $row["idTiket"];

        $sql1 = "SELECT * FROM tiket WHERE idTiket = '$tieck'";

        $result1 = mysqli_query($koneksi, $sql1);

        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $hasil['tickets'][$counter]['match'] = $row1['match1'];
                $hasil['tickets'][$counter]['stadium'] = $row1['stadium'];
                $hasil['tickets'][$counter]['alamat'] = $row1['alamat'];
                $hasil['tickets'][$counter]['tgl'] = $row1['tgl'];
                $hasil['tickets'][$counter]['jam'] = $row1['jam'];
            }
        
        }

        $tieck1 = $row["idUser"];

        $sql2 = "SELECT * FROM users WHERE idUser = '$tieck1'";

        $result2 = mysqli_query($koneksi, $sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while($row2 = $result2->fetch_assoc()) {
                $hasil['tickets'][$counter]['nama'] = $row2['username'];
            }

        
        }

        $counter++;
    }
} else {
    echo "0 results";
}

header('Content-type: application/json');
echo json_encode($hasil);
?>