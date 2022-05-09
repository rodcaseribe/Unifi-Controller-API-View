<?php
    require('Router/roteador.php');
    include('environments.php');
    require('Model/conexaoApi.php');
    require('Controller/controllerPainel.php');
?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <?php
        ob_start();
        foreach( $MacsAPS as $valorMAC ) {
            $retornoAPI = RequestGetAPIController($urlArgAPI,$valorMAC);
            $obj = json_decode($retornoAPI,  true);
            echo '<div class="col-sm-6">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<p class="card-text">Endereço MAC:'.($obj['data']['0']['mac']).'</p>';
            echo '<p class="card-text">SSID: '.($obj['data']['0']['essid']).'</p>';
            echo '<p class="card-text">Endereço IP:'.($obj['data']['0']['ip']).'</p>';
            echo '<p class="card-text">Sinal Db: '.($obj['data']['0']['signal']).'</p>';
            echo '<p class="card-text">Canal: '.($obj['data']['0']['channel']).'</p>';
            echo '<p class="card-text">Uptime: '.($obj['data']['0']['_uptime_by_uap']).'</p>';
            echo '</div></div></div>';
        }
    ?>
</body>
</html>