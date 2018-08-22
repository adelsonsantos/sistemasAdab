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
        jQuery(this).html("População Animal: " + (index + 1))
    });
});

jQuery(".dynamicform_populacao_animal").on("afterDelete", function(e) {
    jQuery(".dynamicform_populacao_animal .panel-title-populacao-animal").each(function(index) {
        jQuery(this).html("População Animal: " + (index + 1))
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
        'deleteButton' => '.remove-item', // css class
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
                <th class="text-center" style="width: 90px">
                    <button type="button" id="butao-acao-add" class="add-item btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
                </th>
            </tr>
            </thead >
        </table>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPopulacaoAnimal as $index => $modelPopulacaoAnimal): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-populacao-animal">Animal: <?= ($index + 1) ?></span>

                        <button type="button" class="pull-right remove-acao btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
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
                                        'prompt' => 'Selecione o Animal',
                                        'onchange' => '                               
             $.get( "' . Url::toRoute('/termo-vigilancia-fiscalizacao/get-input-faixa-etaria') . '", { id: $(this).val(), input: $(this).attr("id")} )
            .done(function( data ) {
                 var result = JSON.parse(data);
                  $.get( "'. Url::toRoute("/termo-vigilancia-fiscalizacao/faixa-etaria") .'", {
                    id:    result.id                   
                    }).done(function( data ) {
                        document.getElementById(result.input_faixa).innerHTML = data;
                  });
            });
            '
                                    ])->label('Animal');
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($modelPopulacaoAnimal,  "[{$index}]vigilancia_fiscalizacao_faixa_etaria_id")->dropDownList(
                                    ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoFaixaEtaria::find()->asArray()->where(['vigilancia_fiscalizacao_animal_id' => $modelPopulacaoAnimal->vigilancia_fiscalizacao_animal_id])->orderBy('vigilancia_fiscalizacao_animal_faixa_etaria_periodo')->all(), 'vigilancia_fiscalizacao_animal_faixa_etaria_id', 'vigilancia_fiscalizacao_animal_faixa_etaria_periodo'),
                                    [
                                        'prompt' => 'Selecione a Faixa Etária'
                                    ])->label('Faixa Etária'); ?>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_nascidos")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_femeas_nascidas")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_mortos")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_animal_campos_femeas_mortos")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_existentes")->textInput([]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_femeas_existentes")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_machos_vacinados")->textInput([]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelPopulacaoAnimal, "[{$index}]vigilancia_fiscalizacao_populacao_animal_quantidade")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- end:row -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>




</div>


