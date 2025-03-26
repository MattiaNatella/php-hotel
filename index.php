<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];


$parcheggio = $_GET['parcheggio'] ? $_GET['parcheggio'] : 'no_parking';
$voto = $_GET['voto'] ? $_GET['voto'] : 'no_voto';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- BOOTSTRAP -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Hotek</title>
</head>

<body>
    <h1>BENVENUTO IN PHP HOTEL!</h1>


    <h2>Filtri di ricerca:</h2>

    <form action="./index.php" method="get">
        <label for="parcheggio">Parcheggio</label>
        <input type="checkbox" name="parcheggio" id="parcheggio">
        <label>Voto</label>
        <input type="text" placeholder="Inserisci voto" name="voto">
        <button type="submit">Ricerca</button>

    </form>

    <h2>Qui troverai la lista completa degli Hotel:</h2>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($hotels as $hotel) {
                echo "<tr>";
                foreach ($hotel as $key => $value) {

                    if ($parcheggio == 'no_parking' && $voto == 'no_voto') {
                        echo "<td>$value</td>";
                    } else if ($parcheggio != 'no_parking' && $voto == 'no_voto' && $hotel['parking'] == 'true') {
                        echo "<td>$value</td>";
                    } else if ($parcheggio == 'no_parking' && $voto != 'no_voto' && $hotel['vote'] >= $voto) {
                        echo "<td>$value</td>";
                    } else if ($parcheggio != 'no_parking' && $voto != 'no_voto' && $hotel['vote'] >= $voto && $hotel['parking'] == 'true') {
                        echo "<td>$value</td>";
                    }


                }
            }
            ;
            echo "</tr>";

            ?>
        </tbody>
    </table>

</body>

</html>