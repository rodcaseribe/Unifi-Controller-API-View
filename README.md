# Unifi Controller API View
 Visualização de Informações da API Unifi
 
# Fluxo de Autenticação e chamada da API da unifi Controller

# -Requisição CURL para autenticação POST ( data binary = RAW debugando com Postaman )
curl 'https://XXX.XXX.XXX.XXX:8443/api/login' --data-binary '{"username":"USUARIO","password":"SENHA","strict":true}' --insecure -c cookies.txt 

# -Requisição GET para coleta de informações ( Coleta e passagem de cookie opr argumento no Header da requisição GET )
curl'https://XXX.XXX.XXX.XXX:8443/api/s/default/stat/user/9c:a5:25:27:d7:22' --insecure -b cookies.txt -c cookies.txt > output.json

# Argumentos Curl para Bypassar verificação de certificado SSL
