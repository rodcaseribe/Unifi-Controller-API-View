<?php
    include('Router/roteador.php');
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .form-control{
            width: 50% !important;
        }    
    </style>
    </head>
    <h1 align="center"  class="mt-5" style="color:#f7f7f7;">ConsuAPI UNIFI</h1><br>
    <body style="background-color:#053b6a">
        <form align="center"  id="formularioLogin">
            <div align="center" class="form-group">
                <div class="row" style="display:initial;" >
                    <div class="col">
                        <input type="text" value="" class="input form-control" id="usuario"  placeholder="usuario" aria-label="First name" >
                    </div><br>
                    <div class="col">
                        <input type="password" value="" class="input form-control" id="senha"  placeholder="senha" aria-label="First name" >
                    </div><br>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary" value="autenticacao" id="autenticacao">Entrar</button>
                    </div>
                </div>
            </div>
        </form>



    </body>
</html>
<script src="validaAutenticacao.js"></script>

