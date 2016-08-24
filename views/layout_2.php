
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>Libras</title>
    </head>



    <body>


        <div class="container-fluid">
            <div class="row">
                <!-- uncomment code for absolute positioning tweek see top comment in css -->
                <!-- <div class="absolute-wrapper"> </div> -->
                <!-- Menu -->
                <div class="side-menu">

                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <div class="brand-wrapper">
                                <!-- Hamburger -->
                                <button type="button" class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <!-- Brand -->
                                <div class="brand-name-wrapper">
                                    <a class="navbar-brand" href="#">
                                        Brand
                                    </a>
                                </div>

                                <!-- Search -->
                                <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>

                                <!-- Search body -->
                                <div id="search" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form class="navbar-form" role="search">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                            <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Main Menu -->
                        <div class="side-menu-container">







                            <ul class="nav navbar-nav">


                                <div class="">
                                    <img src="webroot/img/user_profile.jpg" width="100" class="img-responsive img-circle center-block"/>
                                    <span>Mariano  </span>
                                    <span class="text-justify">LV 15</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                         aria-valuemin="0" aria-valuemax="100" style="width:65%">
                                        1250pts
                                    </div>

                                </div>




                                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Meu Perfil</a></li>
                                <li class="active"><a href="?controller=pages&action=avaliar"><span class="glyphicon glyphicon-list-alt"></span> Avaliar</a></li>
                                <li><a href="?controller=pages&action=amigos"><span class="glyphicon glyphicon-user"></span> Amigos</a></li>
                                <li><a href="?controller=ranking&action=index"><span class="glyphicon glyphicon-stats"></span> Ranking</a></li>

                                <!-- Dropdown-->
                                <li class="panel panel-default" id="dropdown">
                                    <a data-toggle="collapse" href="#dropdown-lvl1">
                                        <span class="glyphicon glyphicon-user"></span> Meu perfil <span class="caret"></span>
                                    </a>

                                    <!-- Dropdown level 1 -->
                                    <div id="dropdown-lvl1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="nav navbar-nav">
                                                <li><a href="#">Link</a></li>
                                                <li><a href="#">Link</a></li>
                                                <li><a href="#">Link</a></li>

                                                <!-- Dropdown level 2 -->
                                                <li class="panel panel-default" id="dropdown">
                                                    <a data-toggle="collapse" href="#dropdown-lvl2">
                                                        <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                                                    </a>
                                                    <div id="dropdown-lvl2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <ul class="nav navbar-nav">
                                                                <li><a href="#">Link</a></li>
                                                                <li><a href="#">Link</a></li>
                                                                <li><a href="#">Link</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                </div>

                <!-- Main Content -->
                <div class="container-fluid">

                    <div class="side-body">
                        <?php //require_once('routes.php'); ?>

                        <form class="form-horizontal" id="efetuaLogin" action="efetuaLogin" method="post">
                            <div class="form-group">
                                <label for="usuario" class="col-sm-5 control-label" >Usuário </label>
                                <div class="col-sm-3">
                                    <input type="text" maxlength="15" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="col-sm-5 control-label">Senha </label>
                                <div class="col-sm-3">
                                    <input type="password" maxlength="15" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                                </div>
                            </div>
                            <div class="col-sm-offset-7 col-sm-1">
                                <button id="botaoAcessar" class="btn  btn-geral">Acessar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>


    </body>
</html>