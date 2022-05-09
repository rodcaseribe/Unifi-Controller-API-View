$(function(){
    $("button#autenticacao").on("click", function(e){
        e.preventDefault();
        var usuario = $("form#formularioLogin #usuario").val();
        var senha = $("form#formularioLogin #senha").val();
        if(usuario=="" || senha==""){
            alert("Usuário ou senha não Preenchido");
        }
        else{
            $.ajax({
                url: "Controller/controllerLogin.php",
                type: "POST",
                data: {
                    usuario: usuario,
                    senha: senha
                },
                success: function(retorno){
                    retorno = JSON.parse(retorno);
                    if(retorno["validador"]==0 && retorno["mensagem"].indexOf("ok")>0){
                        console.log("cookie criado");
                        window.location.href = "painel.php";
                    }
                    else{
                        console.log("Erro de Login");
                    }
                },
                error: function(){
                    console.log("houve um erro..");
                }
            });
        }
    })
})