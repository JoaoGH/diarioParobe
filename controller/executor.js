function Login() {

    elemMSG = document.getElementById("msg");
    var ajax = new XMLHttpRequest();
    var url = "../controller/execLogin.php";
    elemUser = document.getElementById("usuario");
    usuario = elemUser.value;
    elemSenha = document.getElementById("senha");
    senha = elemSenha.value;
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("usuario=" + usuario + "&senha=" + senha);
    confirma = ajax.responseText;
    if (confirma !== "True") {
        elemMSG.innerHTML = "Algo está errado! ";
    } else {
        location.href = '\perfil.php';
    }
}
function Senhas() {

    elemMSG = document.getElementById("msg2");
    senha = document.getElementById("senha").value;
    senha2 = document.getElementById("senha2").value;
    if (senha !== senha2) {
        elemMSG.innerHTML = "Senhas são diferentes!";
        document.getElementById("cadUser").disabled = true;
    } else {
        elemMSG.innerHTML = "";
        document.getElementById("cadUser").disabled = false;
    }

}
function NomeUser() {
    elemMSG = document.getElementById("msg");
    nomeUser = document.getElementById("nomeUser").value;
    var ajax = new XMLHttpRequest();
    var url = "../controller/disponibilidadeUsuario.php";
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("nomeUser=" + nomeUser);
    confirma = ajax.responseText;
    if (confirma !== "True") {
        elemMSG.innerHTML = "Usuário indisponivel!";
        document.getElementById("cadUser").disabled = true;
    } else {
        elemMSG.innerHTML = "";
        document.getElementById("cadUser").disabled = false;
    }
}
function AlterarDados(nome) {
    elem = document.getElementById(nome);
    elemMSG = document.getElementById("msg");
    if (nome === "altSenha") {
        document.getElementById("altDados").style = "display:none";
    } else if (nome === "altDados") {
        document.getElementById("altSenha").style = "display:none";
    }
    elem.style = "display:block";
}
function AttDados() {
    nomeU = $("#NomeUser").val();
    nomeN = $("#NovoNomeCompleto").val();
    emailN = $("#NovoEmail").val();
    var ajax = new XMLHttpRequest();
    var url = "../model/alterarDados.php";
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("nomeU=" + nomeU + "&nomeN=" + nomeN + "&emailN=" + emailN);
    confirma = ajax.responseText;
    if (confirma === "True") {
        $("#msg").html("Dados atualizados com sucesso... <small>Saindo</small>");

        setTimeout(function () {
            window.location.replace("../controller/execLogout.php");
        }, 5000);

    } else {
        $("#msg").html("Houve um erro.");
    }
}
function AttSenha() {
    elemMSG = document.getElementById("msg1");
    nomeU = $("#NomeUser2").val();
    senha1 = $("#senha").val();
    senha2 = $("#senha2").val();
    senhaA = $("#senhaAntiga").val();
    var ajax = new XMLHttpRequest();
    var url = "../model/alterarSenha.php";
    ajax.open("POST", url, false);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("nomeU=" + nomeU + "&senha1=" + senha1 + "&senha2=" + senha2 + "&senhaA=" + senhaA);
    confirma = ajax.responseText;
    if (confirma !== "True") {
        if (confirma === "Senha incorreta") {
            $("#msg2").html("Senha incorreta");
        } else if (confirma === "Senhas diferentes") {
            $("#msg2").html("Senha diferentes");
        } else {
            $("#msg2").html("Houve um erros");
        }
    } else {
        $("#msg2").html("");
        $("#msg1").html("Senha atualizada com sucesso... <small>A página será recarregada</small>");
        setTimeout(function () {
            location.reload(1);
        }, 5000);
    }
}
function HabilitaCapa() {
    capa = $("#capa").val();
    capa = parseInt(capa);
    if (capa == 1) {
        document.getElementById("divCapa").style = "display:block";
        document.getElementById("imgCapa").required = true;
    } else {
        document.getElementById("divCapa").style = "display:none";
        document.getElementById("imgCapa").required = false;
    }
}

function Conteudo() {
    var titulo = $("#titulo").val();
    var data = $("#data").html();
    var hora = $("#hora").html();
    var autor = $("#autor").val();
    var lead = $("#lead").val();
    var capa = $("#capaB64").val();
    var texto = $("#edit").html();
    //$("#testMaroto").html(capa);
    $.ajax({
        url: "../controller/cadastroNoticia.php",
        method: "POST",
        data: {
            // os campos aqui
            titulo: titulo,
            lead: lead,
            data: data,
            hora: hora,
            autor: autor,
            capa: capa,
            texto: texto
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#testMaroto").html("Notícia cadastrada com sucesso... <small>A página será recarregada</small>");

            setTimeout(function () {
                location.reload(1);
            }, 3000);
        } else {
            $("#testMaroto").html(msg);
        }
    });


}
function Capa() {
    var filesSelected = document.getElementById("imgCapa").files;
    if (filesSelected.length > 0) {
        var fileToLoad = filesSelected[0];

        var fileReader = new FileReader();

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result; // <--- data: base64
            $("#capaB64").val(srcData);
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}

function Titulo() {
    var titulo = $("#titulo").val();
    indice = titulo.toUpperCase();
    $.ajax({
        url: "../controller/disponibilidadeTitulo.php",
        method: "POST",
        data: {
            // os campos aqui
            titulo: titulo
        }
    }).done(function (msg) {
        indice2=msg.toUpperCase();
        if (msg !== "True" || indice=="INDEX" || indice2=="INDEX") {
            mostra = "Título está indisponivel. <br><small>Pode estar sendo usado em outra notícia, ser muito parecido com outro ou ser insuficiente!</small>";
            document.getElementById("cadNoticia").disabled = true;
        } else {
            mostra = "";
            document.getElementById("cadNoticia").disabled = false;
        }
        $("#msg").html(mostra);
    });
}
function PodeCad() {
    titulo = $("#titulo").val();
    data = $("#data").html();
    hora = $("#hora").html();
    autor = $("#autor").val();
    lead = $("#lead").val();
    texto = "\"" + $("#edit").html() + "\"";
    if (titulo === "" || data === "" || hora === "" || autor === "" || lead === "" || texto === "") {
        $("#testMaroto").html("Preencha os campos");
        document.getElementById("cadNoticia").disabled = true;
    } else {
        document.getElementById("cadNoticia").disabled = false;
        Conteudo();
    }
}

function Excluir(nNoticia) {
    r = confirm("Você realmente quer apagar a notícia?");
    if (r == true) {
        $.ajax({
            url: "../controller/exclusaoNoticia.php",
            method: "POST",
            data: {
                // os campos aqui
                id: nNoticia
            }
        }).done(function (msg) {
            if (msg == null) {
                $("#mostra").html(msg);
            } else {
                alert("Noticia apagada com sucesso. Recarregando a página.");
                setTimeout(function () {
                    location.reload(1);
                }, 100);
            }
        });
    }

}

function Recuperar() {
    usuario = $("#usuario").val();
    email = $("#email").val();

    $.ajax({
        url: "../controller/recuperacaoSenha.php",
        method: "POST",
        data: {
            // os campos aqui
            usuario: usuario,
            email: email
        }
    }).done(function (msg) {
        $("#msg").html(msg);
//        alert("oi | "+msg);
    });

}

function Editar(nNoticia) {
    $.ajax({
        url: "../view/atualizar.php",
        method: "POST",
        data: {
            // os campos aqui
            id: nNoticia
        }
    }).done(function (msg) {
        if (msg != null) {
            $("#editar").html(msg);
        } else {
            window.location.replace("../view/atualizar.php");
        }
    });
}
function AtualizaCapa() {
    capa = $("#capa").val();
    capa = parseInt(capa);
    if (capa == 2) {
        document.getElementById("divCapa").style = "display:block";
        document.getElementById("imgCapa").required = true;
    } else {
        document.getElementById("divCapa").style = "display:none";
        document.getElementById("imgCapa").required = false;
    }
}
function Atualizar() {
    var idNoticia = $("#idNoticia").val();
    var titulo = $("#titulo").val();
    var data = $("#data").html();
    var hora = $("#hora").html();
    var autor = $("#autor").val();
    var lead = $("#lead").val();
    if ($("#capa").val() == 1) {
        var capa = null;
    } else {
        var capa = $("#capaB64").val();
    }
    var texto = $("#edit").html();
    //$("#testMaroto").html(capa);
    $.ajax({
        url: "../controller/atualizacaoNoticia.php",
        method: "POST",
        data: {
            // os campos aqui
            idNoticia: idNoticia,
            titulo: titulo,
            lead: lead,
            data: data,
            hora: hora,
            autor: autor,
            capa: capa,
            texto: texto
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#testMaroto").html("Notícia atualizada com sucesso... <small>A página será recarregada</small>");

            setTimeout(function () {
                location.reload(1);
            }, 3000);
        } else {
            $("#testMaroto").html(msg);
        }
    });


}
function Cancelar() {
    $("#editar").html("");
    $("#altSenha").html("");
    $("#altSenha").html("");
}
function Pesquisar() {
    k2 = $("#k2").val();
    $.ajax({
        url: "../model/pesquisarManutencao.php",
        method: "POST",
        data: {
            // os campos aqui
            k2: k2
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#tabela").html("");

        } else {
            $("#tabela").html(msg);
        }
    });
}

function AtualizarSobre() {
    if ($("#capa").val() == 1) {
        capa = null;
    } else {
        capa = $("#capaB64").val();
    }
    texto = $("#edit").html();
    //$("#testMaroto").html(capa);
    $.ajax({
        url: "../controller/atualizacaoSobre.php",
        method: "POST",
        data: {
            // os campos aqui
            capa: capa,
            texto: texto
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#testMaroto").html("Página atualizada com sucesso... <small>Você será redirecionado</small>");
            window.location = '../view/perfil.php';
        } else {
            $("#testMaroto").html(msg);
        }
    });
}
function AtualizarContato() {
    if ($("#capa").val() == 1) {
        capa = null;
    } else {
        capa = $("#capaB64").val();
    }
    texto = $("#edit").html();
    email = $("#email").val();
    //$("#testMaroto").html(capa);
    $.ajax({
        url: "../controller/atualizacaoContato.php",
        method: "POST",
        data: {
            // os campos aqui
            capa: capa,
            email: email,
            texto: texto
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#testMaroto").html("Página atualizada com sucesso... <small>Você será redirecionado</small>");
            window.location = '../view/perfil.php';
        } else {
            $("#testMaroto").html(msg);
        }
    });
}

function PodeCadRede() {
    var rede = $("#rede").val();
    link = $("#link").val();
    if (link === "" || rede === "") {
        $("#testMaroto").html("Preencha os campos");
    } else {
        CadastrarRede();
    }
}
function CadastrarRede() {
    rede = $("#rede").val();
    link = $("#link").val();
    $.ajax({
        url: "../controller/cadastroRede.php",
        method: "POST",
        data: {
            // os campos aqui
            rede: rede,
            link: link
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#testMaroto").html("Rede social cadastrada com sucesso... <small>A página será recarregada</small>");
            setTimeout(function () {
                location.reload(1);
            }, 3000);
        } else {
            $("#testMaroto").html(msg);
        }
    });
}
function Rede(){
    rede = $("#rede").val();
    $.ajax({
        url: "../controller/disponibilidadeRede.php",
        method: "POST",
        data: {
            // os campos aqui
            rede: rede
        }
    }).done(function (msg) {
        if (msg !== "True") {
            $("#msg").html("Rede já está cadastrada.");
            document.getElementById("cadNoticia").disabled = true;
        } else {
            $("#msg").html("");
            document.getElementById("cadNoticia").disabled = false;
        }
        
    });
}
function EditarRede(nRede){
    $.ajax({
        url: "../view/editarRede.php",
        method: "POST",
        data: {
            // os campos aqui
            nRede: nRede
        }
    }).done(function (msg) {
        if (msg != null) {
            $("#editar").html(msg);
        } else {
            window.location.replace("../view/editarRede.php");
        }
    });
}
function ExcluirRede(idRede){
    r = confirm("Você realmente quer apagar a rede social?");
    if (r == true) {
        $.ajax({
            url: "../controller/exclusaoRede.php",
            method: "POST",
            data: {
                // os campos aqui
                idRede: idRede
            }
        }).done(function (msg) {
            if (msg == null) {
                $("#mostra").html(msg);
            } else {
                alert("Rede social apagada com sucesso. Recarregando a página.");
                setTimeout(function () {
                    location.reload(1);
                }, 100);
            }
        });
    }
}
function AtualizarRede(){
    rede = $("#rede").val();
    link = $("#link").val();
    idRede = $("#idRede").val();
   
    $.ajax({
        url: "../controller/atualizacaoRede.php",
        method: "POST",
        data: {
            // os campos aqui
            idRede: idRede,
            rede: rede,
            link: link
        }
    }).done(function (msg) {
        if (msg === "") {
            $("#testMaroto").html("Rede social atualizada com sucesso... <small>A página será recarregada</small>");
            setTimeout(function () {
                location.reload(1);
            }, 3000);
        } else {
            $("#testMaroto").html(msg);
        }
    });
}