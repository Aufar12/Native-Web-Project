<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <title>Get Tickets</title>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>

            $(document).ready(function() {        


                var rows = $("#UserGridView").find("tr");
                rows.hide();        
                (function($) {
                    $("#UserGridView tbody").addClass("search");
                    $('#filter').keyup(function() {
                        
                       
                        var rex = new RegExp($(this).val(), 'i');
                        // var $t = $(this).children(":eq(4))");
                        $('.search tr ').hide();
                        if (this.value == "") {
                            $('.search tr ').hide();
                            return;
                        }

                        //Recusively filter the jquery object to get results.
                        $('.search tr ').filter(function(i, v) {
                          //Get the 3rd column object here which is userNamecolumn
                            var $t = $(this).children(":eq(" + "0" + ")");
                            return rex.test($t.text());
                        }).show();
                    })

                }(jQuery));

            });
        
        </script>
    </head>
    
    <body style="margin: 150px auto; width: 1000px">
        <h1 style="margin-left: 385px; width: 600px">Print Tickets</h1>
        <p style="margin-left: 350px; width: 600px">Print tickets using your verified <b>booking code.</b></p>
        <input type="text" name="" id="filter" style="margin-left: 230px; width: 600px" placeholder="Booking Code..">
        <br><br>
        <table id="UserGridView">
            <thead>
                <tr>
                    <th scope="col">Booking Code</th>
                    <th scope="col">Match</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Hour</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="searchable">

            <?php
                	$curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://localhost/tubesEAI/tubes/createAPI.php",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET"
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        $someArray1 = json_decode($response,true);
                    }


                    for ($x = 0; $x < count($someArray1["tickets"])-1; $x++) { 
                        if($someArray1["tickets"][$x]['lunas']  == "Payment Verified"){
                            echo '
                            <tr>
                                <td>'.$someArray1["tickets"][$x]['kodeBooking'].'</td>
                                <td>'.$someArray1["tickets"][$x]['match'].'</td>
                                <td>'.$someArray1["tickets"][$x]['alamat'].'</td>
                                <td>'.$someArray1["tickets"][$x]['tgl'].'</td>
                                <td>'.$someArray1["tickets"][$x]['jam'].'</td>
                                <form method="post" action="print.php" onsubmit="return confirm("Are you sure you wish to delete?");"> 
                                <input name="kodeBooking" value="'.$someArray1["tickets"][$x]['kodeBooking'].'" style="display: none" type="hidden"/>
                                <input name="match1" value="'.$someArray1["tickets"][$x]['match'].'" style="display: none" type="hidden"/>
                                <input name="alamat" value="'.$someArray1["tickets"][$x]['alamat'].'" style="display: none" type="hidden"/>
                                <input name="tgl" value="'.$someArray1["tickets"][$x]['tgl'].'" style="display: none" type="hidden"/>
                                <input name="jam" value="'.$someArray1["tickets"][$x]['jam'].'" style="display: none" type="hidden"/>
                                <input name="stadium" value="'.$someArray1["tickets"][$x]['stadium'].'" style="display: none" type="hidden"/>
                                <input name="jumlah" value="'.$someArray1["tickets"][$x]['jumlah'].'" style="display: none" type="hidden"/>
                                <input name="kelas" value="'.$someArray1["tickets"][$x]['kelas'].'" style="display: none" type="hidden"/>
                                <input name="nama" value="'.$someArray1["tickets"][$x]['nama'].'" style="display: none" type="hidden"/>
                                <td>
                                <input type="submit" name="klik" class="button special small" value="Get Tickets">
                                </form>
                                </td>
                            </tr>
                            ';
                        }else{
                        
                        }

                    }
            ?>
            </tbody>
        </table>
    </body>

</html>