# Unifi Controller API View
 Visualização de Informações da API Unifi
 
 #Autenticação e chamdada da API da unifi Controller

# -Requisição CURL para autenticação POST ( data binary == RAW debugando com Postaman )
curl 'https://192.168.0.121:8443/api/login' --data-binary '{"username":"USUARIO","password":"SENHA","strict":true}' --insecure -c cookies.txt 

# -Requisição GET para colletada de informações ( Coleta e passagem de cookie opr argumento no Header da requisição GET em PHP )
curl'https://192.168.0.121:8443/api/s/default/stat/user/9c:a5:25:27:d7:22' --insecure -b cookies.txt -c cookies.txt > output.json
