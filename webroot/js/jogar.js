tempo = 20;
var intervalo;



$(document).ready(function() {
    $("video").bind("ended", function() {
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
        
        clearInterval(intervalo);

    }
}