<?php
	class AuthAPI{            
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }    
        public function getUsuario(){
            return $this->usuario;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }    
        public function getSenha(){
            return $this->senha;
        }
        public function setURL($url){
            $this->url = $url;
        }    
        public function getURL(){
            return $this->url;
        }
        public function setCookie($valorCookie){
            $this->valorCookie = $valorCookie;
        }    
        public function getCookie(){
            return $this->valorCookie;
        }

        public function capturandoCookie(){
            require_once '../environments.php';
            //Enviando Post em Raw e gerando cookie
            $url = urlLogin;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_TIMEOUT, 40000);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            $cookie_jar = tempnam('.','sss');
            curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_jar);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            $headers = array("Content-Type: application/x-www-form-urlencoded",);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $offsetDataUsuario = '{"username":"'.$this->usuario;
            $offsetDataSenha = '","password":"'.$this->senha;
            $offsetDataArgumento = '","strict":true}';
            $data = $offsetDataUsuario.$offsetDataSenha.$offsetDataArgumento;
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            curl_close($curl);
            $conteudoCurl = array(
                "respostaCurl" => $resp,
                "caminhoCookie" => $cookie_jar
            );
            return $conteudoCurl;
        }

        public function RequisicaoGETAPI(){
            //enviando GET com header com valores de cookies
            $curl = curl_init($this->url);
            curl_setopt($curl, CURLOPT_URL, $this->url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers = array(
                "Cookie: ".$this->valorCookie
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }