/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function remover(url) {
    var r = confirm("Esta ação irá remover o item e não será possivel recupera-lo");
    if (r == true) {
        location.href = url;
    }
}


$(document).ready(function () {
    
    $('#example').DataTable({
        "order": [ 0, "desc" ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });




    $.ajax(
      {
         type: "POST",
         url: "controllers/UsuarioController.php",
         data: "metodo=getNumNotificacoes",
         beforeSend: function() {
            // enquanto a função esta sendo processada, você
            // pode exibir na tela uma
            // msg de carregando

         },
         success: function(txt) {
            // pego o id da div que envolve o select com
            // name="id_modelo" e a substituiu
            // com o texto enviado pelo php, que é um novo
            //select com dados da marca x
            console.log(txt);

            if(txt == 0){
                $("#num_notifications").hide()
                $("#num_notifications").html(txt)
            }else{
                $("#num_notifications").show()
                $("#num_notifications").html(txt)
            }


         },
         error: function(txt) {
            // em caso de erro você pode dar um alert('erro');
            alert("erro ao validar ")
         }
      }
   );//fim ajax
});



jQuery(function ($) {
    $('#telefone').mask("(99) 9999-9999?9")
            .focusout(function (event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            });
});

function gerarSenhaEstudante(){
    var senha = generatePassword(5);
    $("#senha_modal").html(senha);
    $("#senha").val(senha);
}


function generatePassword(length) {

        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}

function solicitarAmizade(id){

    $.ajax(
            {
                type: "POST",
                url: "?controller=usuario&action=addAmigo",
                data: "id=" + id,
                success: function (txt) {
                    
                    console.log(txt);

                    $("#solicitarAmizade"+id).hide("slow");
                    
                },
                error: function (txt) {
                    // em caso de erro você pode dar um alert('erro');
                    alert("Erro ao tentar adicionar amigo")
                }
            }
    );//fim ajax

}










$(document).ready(function () {

    $('#configuracao1').selectpicker();

    //stick in the fixed 100% height behind the navbar but don't wrap it
    $('#slide-nav.navbar .container').append($('<div id="navbar-height-col"></div>'));

    // Enter your ids or classes
    var toggler = '.navbar-toggle';
    var pagewrapper = '#page-content';
    var navigationwrapper = '.navbar-header';
    var menuwidth = '100%'; // the menu inside the slide menu itself
    var slidewidth = '80%';
    var menuneg = '-100%';
    var slideneg = '-80%';


    $("#slide-nav").on("click", toggler, function (e) {

        var selected = $(this).hasClass('slide-active');

        $('#slidemenu').stop().animate({
            left: selected ? menuneg : '0px'
        });

        $('#navbar-height-col').stop().animate({
            left: selected ? slideneg : '0px'
        });

        $(pagewrapper).stop().animate({
            left: selected ? '0px' : slidewidth
        });

        $(navigationwrapper).stop().animate({
            left: selected ? '0px' : slidewidth
        });


        $(this).toggleClass('slide-active', !selected);
        $('#slidemenu').toggleClass('slide-active');


        $('#page-content, .navbar, body, .navbar-header').toggleClass('slide-active');


    });


    var selected = '#slidemenu, #page-content, body, .navbar, .navbar-header';


    $(window).on("resize", function () {

        if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
            $(selected).removeClass('slide-active');
        }


    });

});



$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');

    });

   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');

    });
});


