<?php
        require('../Model/conexaoApi.php');
        $conexao = new AuthAPI();
        function append_string ($str1, $str2){
            $str = $str1 . $str2;
            return $str;
        }
        function encontrarString($linha,$palavra,$ajuste){
            $posicaoInicial = strpos($linha, $palavra);
            $posicaoFinal = substr($linha,$posicaoInicial+$ajuste);
            $string = explode(" ", $posicaoFinal);
            return $string[0];
        }
        function processarCookie($cookie_jar){
            $arquivo = fopen ($cookie_jar, 'r');
            while(!feof($arquivo))
            {
                $linha = fgets($arquivo, 1024);
                if (strpos($linha, 'unifises') !== false) {
                    $posicaoAjuste = 9;
                    $valorCookie1 =  encontrarString($linha,'unifises',$posicaoAjuste);
                }
                if (strpos($linha, 'csrf') !== false) {
                    $posicaoAjuste = 11;
                    $valorCookie2 =  encontrarString($linha,'csrf','11',$posicaoAjuste);
                }
            }
            $valorTotalCookies = append_string("unifises=RODOLFO".$valorCookie1, "csrf_token=RODOLFO".$valorCookie2);
            $valorCookieParcial = preg_replace("/\s+/", "; ", $valorTotalCookies);
            $valorCookieCompleto = rtrim($valorCookieParcial, "; ");
            $valorCookieCompleto2 = str_replace("RODOLFO", " ", $valorCookieCompleto);
            fclose($arquivo);
            return $valorCookieCompleto2;
        }
        
        //POST Request Login
        if(isset($_POST["usuario"]) && isset($_POST["senha"])){
            $conexao->setUsuario($_POST["usuario"]);
            $conexao->setSenha($_POST["senha"]);
            $respostaCookie = $conexao->capturandoCookie();
            if ($respostaCookie != NULL){
                $cookieCapturado = processarCookie($respostaCookie['caminhoCookie']);
                unlink($respostaCookie['caminhoCookie']);
                setcookie("CookieUnifi", $cookieCapturado, time() + (4000), "/"); // 86400 = 1 day
                echo json_encode(array("validador" => 0, "mensagem" => $respostaCookie['respostaCurl']));
            }
        }
