<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" type="text/css" href="../../webroot/css/bootstrap.css">
<script src="../../webroot/js/jquery.min.js" ></script>
<script src="../../webroot/js/bootstrap.min.js" ></script>

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<center>


    <?php if (isset($_GET['login'])) {
        session_start(); ?>
        <div class="text-center" style="">
            <div style="background-color: #d7eafd; color: #ff4242 ">
                <h4><?php echo $_SESSION['erro'];?></h4>
            </div>
        </div>

    <?php } ?>
    <!-- Main Form -->


    <!-- end:Main Form -->


</center>


<div class="container">

    <form class="form-signin" method="post" action="../../controllers/LoginController.php">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="login" class="form-control" placeholder="E-mail ou nome de usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        <input type="hidden" name="login-web" />


        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <br/>
        <button type="button" class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#myModal">Cadastrar</button>
    </form>

</div> <!-- /container -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Criar conta</h4>
            </div>
            <div class="modal-body">

                <form id="form-cadastrar" method="post" action="../../controllers/" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nome">Nome:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
                        </div>
                    </div><div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Digite o email">
                        </div>
                    </div><div class="form-group">
                        <label class="control-label col-sm-2" for="usuario">Usuário:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite o usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="senha">Senha:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha">
                        </div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="senha_confirm" id="senha" placeholder="Confirme a senha">
                        </div>
                    </div>
                    <input type="hidden" name="create-user"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="btn-cadastrar">Cadastrar</button>

                    </div>
            </div>

        </div>
    </div>
    <style>

        @font-face {
            font-family: myFirstFont;
            src: url(../../webroot/font/varela.woff2);
        }
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>


    <script>
        $(document).ready(function () {


            $("#btn-cadastrar").click(function (e) {

                var url = "../../controllers/LoginController.php"; // the script where you handle the form input.

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form-cadastrar").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        alert(data);
                        if(data.indexOf("email_cadastrado") != -1){
                            alert("Email já cadastrado.")
                        }else if(data.indexOf("usuario_cadastrado") != -1){
                            alert("Este usuário já existe.")
                        }
                    }
                });

                e.preventDefault(); // avoid to execute the actual submit of the form.
            });
        });
    </script>
