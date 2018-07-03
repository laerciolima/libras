tempo = 10;
var intervalo = null;

gravacoes = [];
lista_de_opcoes = [];
var gravacao_atual_index = -1;
var opcoes;

var Gravacao = class Gravacao {
    constructor(id, video, fk_id_usuario, fk_id_sinal) {
        this.id = id;
        this.video = video;
        this.fk_id_usuario = fk_id_usuario;
        this.fk_id_sinal = fk_id_sinal;
    }
}



$(document).ready(function () {
    nextVideo();
    $("video").bind("ended", function () {
        if (intervalo == null) {
            intervalo = setInterval(function () {
                cronometro()
            }, 1000);
        }
    });


    $("#addAvaliacao").click(function (e) {

        var url = "?controller=avaliacao&action=add"; // the script where you handle the form input.,

        $.ajax({
            type: "POST",
            url: url,
            data: $("#avaliacao_sinal").serialize() + "&fk_id_gravacao=" + gravacao.id, // serializes the form's elements.
            success: function (data)
            {
                console.log("add avaliacao:" + data);

                nextVideo();
                $('#avaliacao_sinal').trigger("reset");

                $("#avaliacao_sinal_div").hide();
                $(".player_video_avaliacao").show();


                refreshPontuacao();

            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });


});


function cronometro() {
    tempo = tempo - 1;
    if (tempo != 0) {
        $("#tempo").html((tempo) + "s");
        if (tempo < 5) {
            if (tempo % 2 == 0) {
                $("#tempo").css("color", "red");
            } else {
                $("#tempo").css("color", "white");
            }
        }
    } else {
        $("#tempo").html("0s");

        clearInterval(intervalo);
        intervalo = null;



        $("#video").bind("ended", function () {
            if (intervalo == null) {
                intervalo = setInterval(function () {
                    cronometro()
                }, 1000);
            }
        });

        nextVideo()
    }


}

function nextVideo() {
    console.log('TAM GRAV', gravacoes.length)
    if (gravacao_atual_index == (gravacoes.length-1)) {
        alert("acabou");
        //chama api pra finalizar a tarefa
        return;
    }
    tempo = 10;
    $("#tempo").html("10s");
    $("#tempo").css("color", "white");
    gravacao = gravacoes[++gravacao_atual_index];
    opcoes = lista_de_opcoes[gravacao_atual_index];
    console.log(opcoes);


    var video = document.getElementById('video');
    if(video)
        video.pause();

    var mp4Vid = document.getElementById('mp4Source');
    var video_avaliacao = document.getElementById('video_player_avaliacao');

    // Now simply set the 'src' property of the mp4Vid variable!!!!

    $("#etapa_atividade").html((gravacao_atual_index+1)+"/"+gravacoes.length)

    mp4Vid.src = gravacao.video;
    video_avaliacao.src = gravacao.video;
    video.load();
    video.play();

    for (var i = 0; i < opcoes.length; i++) {
        $("#opt" + i).html(opcoes[i]);

    }


}

function validar(num) {

    $(".opt_sinal").prop("disabled",true);




    $("#avaliacao_sinal_div").show();
    $(".player_video_avaliacao").hide();
    $("#avaliacao_sinal").hide();

    $.ajax(
    {
        type: "POST",
        url: "?controller=gravacao&action=verificarResposta",
        data: "fk_id_sinal=" + gravacao.fk_id_sinal + "&resposta=" + opcoes[num],
        beforeSend: function () {
                    // enquanto a função esta sendo processada, você
                    // pode exibir na tela uma
                    // msg de carregando

                },
                success: function (txt) {


                    if (txt.indexOf("verificarResposta=true") != -1) {
                        $("#resposta_correta").show();
                        $("#resposta_correta").fadeOut(2500, function () {
                            $("#sinal_avaliacao").val(1);
                            $("#avaliacao_sinal").show();

                        });
                        
                    } else {
                        $("#resposta_incorreta").show();
                        $("#resposta_incorreta").fadeOut(2500, function () {
                            $("#sinal_avaliacao").val(0);
                            $("#avaliacao_sinal").show();
                        });
                    }



                    //$('#resposta_incorreta').hide(5000)
                    //$('#resposta_correta').hide(5000)
                },
                error: function (txt) {
                    // em caso de erro você pode dar um alert('erro');
                    alert("erro")
                }
            }
    );//fim ajax


    $(".opt_sinal").prop("disabled",false);


    clearInterval(intervalo);
    intervalo = null;
    tempo = 10;
    $("#tempo").html("10s");

    $("#video").bind("ended", function () {
        if (intervalo == null) {
            intervalo = setInterval(function () {
                cronometro()
            }, 1000);
        }
    });

}


function refreshPontuacao() {
    $.ajax(
    {
        type: "POST",
        url: "controllers/UsuarioController.php",
        data: "metodo=getPontuacao",
        beforeSend: function () {
                    // enquanto a função esta sendo processada, você
                    // pode exibir na tela uma
                    // msg de carregando

                },
                success: function (txt) {
                    // pego o id da div que envolve o select com
                    // name="id_modelo" e a substituiu
                    // com o texto enviado pelo php, que é um novo
                    //select com dados da marca x
                    console.log(txt);

                    
                    content = txt.split("#")
                    console.log(content[0]);
                    console.log(content[1]);
                    console.log("valor: "+((content[0] * 100 ) / content[1]))
                    $('#progress-bar_pontuacao').css('width', ((content[0] * 100 ) / content[1]) + '%').attr('aria-valuenow', ((content[0] * 100 ) / content[1]));
                    $('#progress-bar_pontuacao').html(content[0] + "/"+content[1]);

                },
                error: function (txt) {
                    // em caso de erro você pode dar um alert('erro');
                    alert("erro")
                }
            }
    );//fim ajax

}
