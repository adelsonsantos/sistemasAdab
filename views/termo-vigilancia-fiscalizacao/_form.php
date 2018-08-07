<?php

use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\DiariaCoordenadoria;
use app\models\PortalEscritorio;
use app\models\PortalGerencia;
use yii\helpers\ArrayHelper;
use app\models\TermoVigilanciaFiscalizacao;
use app\models\TermoVigilanciaFiscalizacaoVeiculo;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */
/* @var $form yii\widgets\ActiveForm */
require 'style.php';


$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?>
            ação</h1>
    </div>
</div>
<div class="grid">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']);  ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon-plus"></div>
                    Vigilância e Fiscalização
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'coordenadas_id')->dropDownList(
                            ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome'),
                            [
                                'prompt' => 'Selecione a Coordenadoria',
                                'onchange' => '
            $.get( "' . Url::toRoute('/portal-cordenadoria-gerencia-view/gerencia') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($model, 'gerencia_id') . '" ).html( data );
            }
            );
            '
                            ]
                        )->label('Coordenadoria'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'gerencia_id')->dropDownList(
                            ArrayHelper::map(PortalGerencia::find()->asArray()->where(['id_coordenadoria' => $model->coordenadas_id])->orderBy('ger_nome')->all(), 'ger_id', 'ger_nome'),
                            [
                                'prompt' => 'Selecione a Gerência',
                                'onchange' => '
            $.get( "' . Url::toRoute('/portal-cordenadoria-gerencia-view/escritorio') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($model, 'esc_id') . '" ).html( data );
            }
            );
            '
                            ])->label('Gerência'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'municipio_id')->dropDownList(
                            ArrayHelper::map(PortalEscritorio::find()->asArray()->where(['ger_id' => $model->gerencia_id])->orderBy('esc_nome')->all(), 'esc_id', 'esc_nome'),
                            ['prompt' => 'Selecione o Municipio',]) ?>
                    </div>
                </div>


                <?= $this->render('_form-veiculo', [
                'form' => $form,
                    'model' => $model,
                    'modelsVeiculo' => (empty($modelsVeiculo)) ? [new TermoVigilanciaFiscalizacaoVeiculo] : $modelsVeiculo
                ]); ?>



////

                <div class="padding-v-md">
                    <div class="line line-dashed"></div>
                </div>
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 4, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsEquipe[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'pessoa_id',
                    ],
                ]); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-envelope"></i> Address Book
                        <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body container-items"><!-- widgetContainer -->
                        <?php foreach ($modelsEquipe as $index => $modelEquipe): ?>
                            <div class="item panel panel-default"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <span class="panel-title-address">Address: <?= ($index + 1) ?></span>
                                    <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (!$modelEquipe->isNewRecord) {
                                        echo Html::activeHiddenInput($modelEquipe, "[{$index}]id");
                                    }
                                    ?>
                                    <?= $form->field($modelEquipe, "[{$index}]pessoa_id")->textInput(['maxlength' => true]) ?>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $form->field($modelEquipe, "[{$index}]pessoa_id")->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($modelEquipe, "[{$index}]pessoa_id")->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div><!-- end:row -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php DynamicFormWidget::end(); ?>
/////




                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_id')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->field($model, 'vigilancia_fiscalizacao_status_id')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->field($model, 'vigilancia_fiscalizacao_vacina_id')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->field($model, 'vigilancia_fiscalizacao_observacao')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_id')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_id')->textInput() ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->field($model, 'vigilancia_fiscalizacao_local_id')->textInput() ?>
                    </div>
                </div>
    </div>

</div>

<table class="diaria" style="width: 100%; margin-top: 30px;">
    <tr class="bordaMenu" style="background-color: #d0d0d0">
        <th class="borda" style="text-align: center; width: 50%">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </th>
        <th class="borda" style="text-align: center; width: 50%">
            <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
        </th>
    </tr>
</table>

<?php ActiveForm::end(); ?>
</td>
</table>
</div>