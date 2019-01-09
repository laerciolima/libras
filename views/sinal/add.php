<h2>
    Adicionar Sinal</h2>

<script>

    function hideShowHand(param){
        if(param == 1)
            $("#mao-secundaria").show();
        else
            $("#mao-secundaria").hide();
    }

</script>





<style>
    #my-icon-select-box-scroll {
        z-index: 1;
    }
</style>
<script>

    var iconSelect;
    var selectedText;

    window.onload = function () {

        selectedText = document.getElementById('selected-text');

        document.getElementById('my-icon-select').addEventListener('changed', function (e) {
            selectedText.value = iconSelect.getSelectedValue();
        });

        iconSelect = new IconSelect("my-icon-select");
        iconSelect2 = new IconSelect("my-icon-select2");

        var icons = [];

            <?php foreach($configuracoes as $conf){ ?>
            icons.push({ 'iconFilePath': 'storage/imagens/configuracao_de_mao/<?php echo $conf->getImagem();?>', 'iconValue': '<?php echo $conf->getId();?>' });
                        <?php } ?>



            iconSelect.refresh(icons);

            iconSelect2.refresh(icons);


    };

</script>


<form method="post" action="?controller=sinal&action=add" class="form-horizontal" role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
        </div>
    </div>

    <div class="form-group">
        <input type="radio" class="" onclick="hideShowHand(0)" name="maos" value=1>Utiliza somente uma mão
        <input type="radio" class="" name="maos" value=1>Utiliza duas mãos com parâmetros iguais
        <input type="radio" checked=true class="" name="maos" value=1>Utiliza duas mãos com parâmetros diferentes
    </div>


    <div class="row">
        <div class="col-xs-6" style="border: 1px solid black;">
            <h3>Mão primária</h3>

            <div class="form-group">
                <label class="control-label col-sm-4" for="pontodearticulacao_idpontodearticulacao">Ponto de articulação:</label>
                <div class="col-sm-8">
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
                <label class="control-label col-sm-4" for="orientacao">Orientacao:</label>
                <div class="col-sm-8">
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
                <label class="control-label col-sm-4" for="movimento1">Movimento:</label>
                <div class="col-sm-8">
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
                <label class="control-label col-sm-4" for="configuracao1">Configuração de mão:</label>
                <div class="col-sm-8">


                    <div id="my-icon-select2"></div>

                    <input type="hidden" id="selected-text" name="selected-text" style="width:65px;">
                </div>
            </div>
        </div>

        <div class="col-xs-6" id="mao-secundaria" style="border: 1px solid black;">
            <h3>Mão secundária</h3>

            <div class="form-group">
                <label class="control-label col-sm-4" for="pontodearticulacao_idpontodearticulacao">Ponto de articulação:</label>
                <div class="col-sm-8">
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
                <label class="control-label col-sm-4" for="orientacao">Orientacao:</label>
                <div class="col-sm-8">
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
                <label class="control-label col-sm-4" for="movimento1">Movimento:</label>
                <div class="col-sm-8">
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
                <label class="control-label col-sm-4" for="configuracao1">Configuração de mão:</label>
                <div class="col-sm-8">


                    <div id="my-icon-select"></div>

                    <input type="hidden" id="selected-text2" name="selected-text2" style="width:65px;">
                </div>
            </div>
        </div>



    </div>

    <br/>
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
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
</form>