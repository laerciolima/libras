<h2>
    Adicionar Sinal</h2>




<form method="post" action="?controller=sinal&action=add" class="form-horizontal" role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            primaria

            <div class="form-group">
                <label class="control-label col-sm-2" for="pontodearticulacao_idpontodearticulacao">Ponto de articulação:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="pontodearticulacao_idpontodearticulacao" id="pontodearticulacao_idpontodearticulacao">
                        <?php foreach ($articulacoes as $articulacao ){ ?>
                        <option value="<?php echo $articulacao->getId();?>">
                            <?php echo $articulacao->getNome();?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="orientacao">Orientacao:</label>
                <div class="col-sm-4">
                    <select name="orientacao" id="orientacao" class="form-control">
                        <option>pra cima</option>
                        <option>pra baixo</option>
                        <option>pra dentro</option>
                        <option>pra fora</option>
                        <option>pra esquerda</option>
                        <option>pra direita</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="movimento1">Movimento:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="movimento1" id="movimento1">
                        <?php foreach ($movimentos as $movimento ){ ?>
                        <option value="<?php echo $movimento->getId();?>">
                            <?php echo $movimento->getNome();?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="configuracao1">Configuração de mão:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="configuracao1" id="configuracao1">
                        <?php foreach ($configuracoes as $conf ){ ?>
                        <option value="<?php echo $conf->getId();?>">
                            <?php echo $conf->getNome();?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            secundaria
        </div>

    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="expressaofacial_idexpressaofacial">Expressão Facial:</label>
        <div class="col-sm-4">
            <select name="expressaofacial_idexpressaofacial" id="expressaofacial_idexpressaofacial" class="form-control">
                <?php foreach ($expressoes as $expressao ){ ?>
                <option value="<?php echo $expressao->getId();?>">
                    <?php echo $expressao->getNome();?>
                </option>
                <?php } ?>
            </select>

        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="video">Video:</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="video" id="video" placeholder="Digite o video">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="foto">Foto:</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Digite o foto">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="modulo_id">Categoria:</label>
        <div class="col-sm-4">
            <select class="form-control" name="categoria_id" id="categoria_id">
                <?php foreach ($categorias as $categoria ){ ?>
                <option value="<?php echo $categoria->getId();?>">
                    <?php echo $categoria->getNome();?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="utilizacaodasmaos">UtilizacaoDasMaos:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="utilizacaodasmaos" id="utilizacaodasmaos" placeholder="Digite o utilizacaodasmaos">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="maoprincipal_id">MaoPrincipal_id:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="maoprincipal_id" id="maoprincipal_id" placeholder="Digite o maoprincipal_id">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="maosecundaria_id">MaoSecundaria_id:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="maosecundaria_id" id="maosecundaria_id" placeholder="Digite o maosecundaria_id">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
</form>