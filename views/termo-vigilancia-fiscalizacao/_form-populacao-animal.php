<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsPopulacaoAnimal app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_populacao_animal").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_populacao_animal .panel-title-populacao-animal").each(function(index) {
        jQuery(this).html("Animal: " + (index + 1))
    });
        adicionaCamposOcultos();
});

jQuery(".dynamicform_populacao_animal").on("afterDelete", function(e) {
    jQuery(".dynamicform_populacao_animal .panel-title-populacao-animal").each(function(index) {
        jQuery(this).html("Animal: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="customer-form">

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_populacao_animal', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 10, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-animal', // css class
        'model' => $modelsPopulacaoAnimal[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'vigilancia_fiscalizacao_animal_id',
            'vigilancia_fiscalizacao_faixa_etaria_id',
            'vigilancia_fiscalizacao_populacao_animal_machos_nascidos',
            'vigilancia_fiscalizacao_populacao_animal_machos_mortos',
            'vigilancia_fiscalizacao_populacao_animal_machos_existentes',
            'vigilancia_fiscalizacao_populacao_animal_machos_vacinados',
            'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos',
            'vigilancia_fiscalizacao_populacao_animal_femeas_existentes',
            'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas',
            'vigilancia_fiscalizacao_populacao_animal_quantidade',
            'vigilancia_fiscalizacao_populacao_animal_st'
        ],
    ]); ?>
    <div class="panel panel-default">
        <table class="table table-bordered">
            <thead style="background: #c3c3c3">
            <tr>
                <th>População Animal</th>

            </tr>
            </thead>
        </table>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPopulacaoAnimal as $index => $modelPopulacaoAnimal): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-populacao-animal">Animal: <?= ($index + 1) ?></span>


                        <button type="button" class="pull-right remove-animal btn btn-danger btn-xs"><span
                                    class="glyphicon glyphicon-minus"></span></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$modelPopulacaoAnimal->isNewRecord) {
                            echo Html::activeHiddenInput($modelPopulacaoAnimal, "[{$index}]id");
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_animal_id")->dropDownList(
                                    ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoAnimal::find()->asArray()->where(['vigilancia_fiscalizacao_animal_st' => 1])->orderBy('vigilancia_fiscalizacao_animal_nome')->all(), 'vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_nome'),
                                    [
                                        'onchange' => '                               
                                     $.get( "' . Url::toRoute('/termo-vigilancia-fiscalizacao/get-input-faixa-etaria') . '", { id: $(this).val(), input: $(this).attr("id")} )
                                    .done(function( data ) {
                                         var result = JSON.parse(data);
                                          $.get( "' . Url::toRoute("/termo-vigilancia-fiscalizacao/faixa-etaria") . '", {
                                            id:    result.id                   
                                            }).done(function( data ) {
                                                document.getElementById(result.input_faixa).innerHTML = data;
                                          });
                                    });
                                                                                                                                           
                                     $.get( "' . Url::toRoute('/termo-vigilancia-fiscalizacao/animal-campos') . '", { id: $(this).val(), input: $(this).attr("id")} )
                                    .done(function( data ) {
                                     var response = JSON.parse(data);
                                         console.log(response);                                         
                                         validaElementoId(response.pupulacao_animal_machos_nascidos, response.div_machos_nascidos, response.div_machos_nascidos_1);
                                         validaElementoId(response.pupulacao_animal_femeas_nascidas, response.div_femeas_nascidas, response.div_femeas_nascidas_1);
                                         validaElementoId(response.pupulacao_animal_machos_mortos, response.div_machos_mortos, response.div_machos_mortos_1);
                                         validaElementoId(response.pupulacao_animal_femeas_mortas, response.div_femeas_mortas, response.div_femeas_mortas_1);
                                         validaElementoId(response.pupulacao_animal_machos_existentes, response.div_machos_existentes, response.div_machos_existentes_1);
                                         validaElementoId(response.pupulacao_animal_femeas_existentes, response.div_femeas_existentes, response.div_femeas_existentes_1);
                                         validaElementoId(response.pupulacao_animal_machos_vacinados, response.div_machos_vacinados, response.div_machos_vacinados_1);
                                         validaElementoId(response.pupulacao_animal_femeas_vacinadas, response.div_femeas_vacinadas, response.div_femeas_vacinadas_1);
                                         validaElementoId(response.pupulacao_animal_quantidade, response.div_quantidade, response.div_quantidade_1);                                                                                                              
                                    });
            '
                                    ])->label('Animal');
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_faixa_etaria_id")->dropDownList(
                                    ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoFaixaEtaria::find()->asArray()->where(['vigilancia_fiscalizacao_animal_id' => $modelPopulacaoAnimal->vigilancia_fiscalizacao_animal_id])->orderBy('vigilancia_fiscalizacao_animal_faixa_etaria_periodo')->all(), 'vigilancia_fiscalizacao_animal_faixa_etaria_id', 'vigilancia_fiscalizacao_animal_faixa_etaria_periodo'),
                                    [
                                    ])->label('Faixa Etária'); ?>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6" id="machos-nascidos<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_nascidos")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6" id="femeas-nascidas<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_femeas_nascidas")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6" id="machos-mortos<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_mortos")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6" id="femeas-mortas<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_animal_campos_femeas_mortos")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6" id="machos-existentes<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_existentes")->textInput([]) ?>
                            </div>
                            <div class="col-sm-6" id="femeas-existentes<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_femeas_existentes")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6" id="machos-vacinados<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_vacinados")->textInput([]) ?>
                            </div>
                            <div class="col-sm-6" id="femeas-vacinadas<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6" id="quantidade<?= $index ?>">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_quantidade")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <table class="table table-bordered">
            <thead style="background: #c3c3c3">
            <tr>

                <th class="text-center" style="width: 90px">
                    <button type="button" class=" pull-right add-item btn btn-success btn-xs"><i
                                class="fa fa-plus glyphicon glyphicon-plus"></i> Animal
                    </button>
                </th>
            </tr>
            </thead>
        </table>
    </div>


    <?php DynamicFormWidget::end(); ?>
</div>

<script>
    function validaElementoId(pupulacao_animal_machos_nascidos, div_machos_nascidos, div_machos_nascidos_1) {
        if (pupulacao_animal_machos_nascidos === true) {
            if (document.getElementById(div_machos_nascidos) == null) {
                if (document.getElementById(div_machos_nascidos_1) !== null) {
                    document.getElementById(div_machos_nascidos_1).style.display = "block"
                }
            } else {
                document.getElementById(div_machos_nascidos).style.display = "block"
            }
        } else {
            if (document.getElementById(div_machos_nascidos) == null) {
                if (document.getElementById(div_machos_nascidos_1) !== null) {
                    document.getElementById(div_machos_nascidos_1).style.display = "none"
                }
            } else {
                document.getElementById(div_machos_nascidos).style.display = "none"
            }
        }
    }

    function adicionaCamposOcultos() {
        if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-2-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-1-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-1--nascidos0").style.display = "none";
            document.getElementById("femeas-1--nascidas0").style.display = "none";
            document.getElementById("machos-1--mortos0").style.display = "none";
            document.getElementById("femeas-1--mortas0").style.display = "none";
            document.getElementById("machos-1--existentes0").style.display = "none";
            document.getElementById("femeas-1--existentes0").style.display = "none";
            document.getElementById("machos-1--vacinados0").style.display = "none";
            document.getElementById("femeas-1--vacinadas0").style.display = "none";
            document.getElementById("quantidade01").style.display = "none";
        }
        else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-3-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-2-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-2--nascidos0").style.display = "none";
            document.getElementById("femeas-2--nascidas0").style.display = "none";
            document.getElementById("machos-2--mortos0").style.display = "none";
            document.getElementById("femeas-2--mortas0").style.display = "none";
            document.getElementById("machos-2--existentes0").style.display = "none";
            document.getElementById("femeas-2--existentes0").style.display = "none";
            document.getElementById("machos-2--vacinados0").style.display = "none";
            document.getElementById("femeas-2--vacinadas0").style.display = "none";
            document.getElementById("quantidade02").style.display = "none";

        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-4-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-3-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-3--nascidos0").style.display = "none";
            document.getElementById("femeas-3--nascidas0").style.display = "none";
            document.getElementById("machos-3--mortos0").style.display = "none";
            document.getElementById("femeas-3--mortas0").style.display = "none";
            document.getElementById("machos-3--existentes0").style.display = "none";
            document.getElementById("femeas-3--existentes0").style.display = "none";
            document.getElementById("machos-3--vacinados0").style.display = "none";
            document.getElementById("femeas-3--vacinadas0").style.display = "none";
            document.getElementById("quantidade03").style.display = "none";
        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-5-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-4-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-4--nascidos0").style.display = "none";
            document.getElementById("femeas-4--nascidas0").style.display = "none";
            document.getElementById("machos-4--mortos0").style.display = "none";
            document.getElementById("femeas-4--mortas0").style.display = "none";
            document.getElementById("machos-4--existentes0").style.display = "none";
            document.getElementById("femeas-4--existentes0").style.display = "none";
            document.getElementById("machos-4--vacinados0").style.display = "none";
            document.getElementById("femeas-4--vacinadas0").style.display = "none";
            document.getElementById("quantidade04").style.display = "none";
        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-6-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-5-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-5--nascidos0").style.display = "none";
            document.getElementById("femeas-5--nascidas0").style.display = "none";
            document.getElementById("machos-5--mortos0").style.display = "none";
            document.getElementById("femeas-5--mortas0").style.display = "none";
            document.getElementById("machos-5--existentes0").style.display = "none";
            document.getElementById("femeas-5--existentes0").style.display = "none";
            document.getElementById("machos-5--vacinados0").style.display = "none";
            document.getElementById("femeas-5--vacinadas0").style.display = "none";
            document.getElementById("quantidade05").style.display = "none";
        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-7-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-6-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-6--nascidos0").style.display = "none";
            document.getElementById("femeas-6--nascidas0").style.display = "none";
            document.getElementById("machos-6--mortos0").style.display = "none";
            document.getElementById("femeas-6--mortas0").style.display = "none";
            document.getElementById("machos-6--existentes0").style.display = "none";
            document.getElementById("femeas-6--existentes0").style.display = "none";
            document.getElementById("machos-6--vacinados0").style.display = "none";
            document.getElementById("femeas-6--vacinadas0").style.display = "none";
            document.getElementById("quantidade06").style.display = "none";
        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-8-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-7-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-7--nascidos0").style.display = "none";
            document.getElementById("femeas-7--nascidas0").style.display = "none";
            document.getElementById("machos-7--mortos0").style.display = "none";
            document.getElementById("femeas-7--mortas0").style.display = "none";
            document.getElementById("machos-7--existentes0").style.display = "none";
            document.getElementById("femeas-7--existentes0").style.display = "none";
            document.getElementById("machos-7--vacinados0").style.display = "none";
            document.getElementById("femeas-7--vacinadas0").style.display = "none";
            document.getElementById("quantidade07").style.display = "none";
        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-9-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-8-vigilancia_fiscalizacao_animal_id").value != null) {
            document.getElementById("machos-8--nascidos0").style.display = "none";
            document.getElementById("femeas-8--nascidas0").style.display = "none";
            document.getElementById("machos-8--mortos0").style.display = "none";
            document.getElementById("femeas-8--mortas0").style.display = "none";
            document.getElementById("machos-8--existentes0").style.display = "none";
            document.getElementById("femeas-8--existentes0").style.display = "none";
            document.getElementById("machos-8--vacinados0").style.display = "none";
            document.getElementById("femeas-8--vacinadas0").style.display = "none";
            document.getElementById("quantidade08").style.display = "none";
        }else if (document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-10-vigilancia_fiscalizacao_animal_id") == null && document.getElementById("termovigilanciafiscalizacaopopulacaoanimal-9-vigilancia_fiscalizacao_animal_id").value != null) {
            console.log("nove");
            document.getElementById("machos-9--nascidos0").style.display = "none";
            document.getElementById("femeas-9--nascidas0").style.display = "none";
            document.getElementById("machos-9--mortos0").style.display = "none";
            document.getElementById("femeas-9--mortas0").style.display = "none";
            document.getElementById("machos-9--existentes0").style.display = "none";
            document.getElementById("femeas-9--existentes0").style.display = "none";
            document.getElementById("machos-9--vacinados0").style.display = "none";
            document.getElementById("femeas-9--vacinadas0").style.display = "none";
            document.getElementById("quantidade09").style.display = "none";
        }
    }


    document.getElementById("machos-nascidos0").style.display = 'none';
    document.getElementById("femeas-nascidas0").style.display = 'none';
    document.getElementById("machos-mortos0").style.display = 'none';
    document.getElementById("femeas-mortas0").style.display = 'none';
    document.getElementById("machos-existentes0").style.display = 'none';
    document.getElementById("femeas-existentes0").style.display = 'none';
    document.getElementById("machos-vacinados0").style.display = 'none';
    document.getElementById("femeas-vacinadas0").style.display = 'none';
    document.getElementById("quantidade0").style.display = 'none';
</script>
