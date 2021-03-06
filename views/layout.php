
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1"></meta>
    <title>Libras</title>
</head>



<body>


    <div class="container-fluid" style="padding-left: 0px">
        <div class="row">

            <div class="side-menu">

                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <div class="brand-wrapper">

                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Brand -->
                            <div class="brand-name-wrapper">
                                <a class="navbar-brand" href="#">
                                    Libras
                                </a>
                            </div>

                            <a href="?controller=usuario&action=notificacoes" class="btn btn-default" id="search-trigger" style="margin-right: 55px">
                                <span class="glyphicon glyphicon-bell"></span>
                                <span class="badge" id="num_notifications" style="display: none">...</span>
                            </a>

                            <!-- Search -->
                            <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>




                            <!-- Search body -->
                            <div id="search" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form action="?controller=usuario&action=buscarUsuario">
                                        <div class="input-group">

                                            <input type="hidden" name="controller" value="usuario">
                                            <input type="hidden" name="action" value="buscarUsuario">
                                            <input type="text" name="busca" class="form-control" placeholder="Encontre amigos...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Buscar</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Main Menu -->
                    <div class="side-menu-container">







                        <ul class="nav navbar-nav" style="padding-left: 5px">


                            <div >
                                <div class="imagem-perfil center-block">
                                    <img src="storage/imagens/users/<?php echo $usuario_logado['imagem'];?>" width="100" class="img-responsive center-block rounded"/>
                                </div>
                                <span>&nbsp<?php echo $usuario_logado['nome']?>  </span>

                            </div>
                            <?php $user = $_SESSION['login_object']; 

                            if($user['perfil'] == "comum"){ ?>
                            <div class="progress">
                                <div id="progress-bar_pontuacao" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($usuario_logado['pontuacao']*100) / $_SESSION['total_sinais_cadastrados'] ?>%">
                                <?php echo $usuario_logado['pontuacao']."/".$_SESSION['total_sinais_cadastrados']; ?>
                            </div>
                        </div>
                            <?php } ?>

                        




                        <li><a href="?controller=usuario&action=home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class=" active panel panel-default" id="dropdown">
                            <a data-toggle="collapse" href="#dropdown-lvl1">
                                <span class="glyphicon glyphicon-user"></span> Meu perfil <span class="caret"></span>
                            </a>

                            <!-- Dropdown level 1 -->
                            <div id="dropdown-lvl1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="?controller=badge&action=view"><span class="glyphicon glyphicon-bookmark"></span> Conquistas</a></li>

                                        <li><a href="?controller=usuario&action=edit"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>

                                        <li><a href="controllers/LoginController.php?action=logout"><span class="glyphicon glyphicon-off"></span> Sair</a></li>



                                    </ul>
                                </div>
                            </div>
                        </li>



                        <?php 
                            if($usuario_logado['perfil'] == "comum"){

                                
                        ?>
                        <li><a href="?controller=usuario&action=amigos"><span class="glyphicon glyphicon-user"></span> Amigos</a></li>

                            <li><a href="?controller=gravacao&action=meusVideos"><span class="glyphicon glyphicon-film"></span> Meus vídeos</a></li>

                        <li><a href="?controller=pages&action=gravar"><span class="glyphicon glyphicon-facetime-video"></span> Gravar</a></li>



<?php } ?>


                        
                        <li><a href="?controller=usuario&action=ranking"><span class="glyphicon glyphicon-stats"></span> Ranking</a></li>



                    



                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div>

        <!-- Main Content -->
        <div class="container-fluid">

            <div class="side-body">
                <?php require_once('routes.php'); ?>
            </div>
        </div>
    </div>



</div>


</body>
</html>
