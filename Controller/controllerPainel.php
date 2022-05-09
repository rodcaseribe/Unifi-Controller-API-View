<?php
    function RequestGetAPIController($URLAPI, $valorMAC){
        $conexao = new AuthAPI();
        $conexao->setCookie($_COOKIE['CookieUnifi']);
        $conexao->setUrl($URLAPI."".$valorMAC);
        $respostaAPI = $conexao->RequisicaoGETAPI();
        return $respostaAPI;
    }
?>