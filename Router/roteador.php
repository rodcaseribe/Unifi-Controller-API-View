<?php
    if(isset($_COOKIE['CookieUnifi']) && $_SERVER['REQUEST_URI'] == '/unifiNewPortal/index.php' || $_SERVER['PHP_SELF'] == '/unifiNewPortal/index.php'){
        header("Location: painel.php");
    }
    else if(!isset($_COOKIE['CookieUnifi']) && $_SERVER['REQUEST_URI'] == '/unifiNewPortal/painel.php'){
        echo "Usuário não logado clique <a href=\"index.php\">aqui<a/> para voltar";
        die();
    }
    else{
        return;
    }
?>