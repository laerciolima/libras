tempo = 20;
var intervalo = null;



$(document).ready(function () {
    $("video").bind("ended", function () {
        if (intervalo == null) {
            intervalo = setInterval(function () {
                cronometro()
            }, 1000);
        }
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

        clearInterval(intervalo);

    }
}