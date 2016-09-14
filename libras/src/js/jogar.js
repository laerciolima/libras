tempo = 30;
var intervalo;

$(document).ready(function() {
    $("video").bind("ended", function() {
        
        $("#painel_alternativas").show("drop", {direction: "right"}, 1000)
        intervalo = setInterval(function() {
            cronometro()
        }, 1000);
    });

});

function cronometro() {
    tempo = tempo - 1;
    if (tempo != 0) {
        $("#tempo").html((tempo) + "s");
        if (tempo < 9) {
            if (tempo % 2 == 0) {
                $("#tempo").css("color", "red");
            } else {
                $("#tempo").css("color", "white");
            }
        }
    } else {
	$("#tempo").html("0s");
        checkResposta("null");
        clearInterval(intervalo);

    }
}
function checkResposta(resp) {
    clearInterval(intervalo);
    $("#alternativa1").removeClass("alternativa")
    $("#alternativa1").addClass("correta")

    $("#alternativa3").removeClass("alternativa")
    $("#alternativa3").addClass("incorreta")
    setTimeout(function() {
        $("#painel_alternativas").hide("drop", {direction: "right"}, 1000)
    }, 600);

    setTimeout(function() {
        $("#painel_avaliacao").show("drop", {direction: "left"}, 1000)
    }, 1500);

}

