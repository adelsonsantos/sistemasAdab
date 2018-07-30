<?php

use app\models\PortalSetor;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEquipamento */
/* @var $modelEntrada app\models\PortalEntrada */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Entrada: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Entrada: " + (index + 1))
    });
});
';

$this->registerJs($js);
require 'style.php';

?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?>
            Equipamento </h1>
    </div>
</div>

<div class="grid">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">

        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon-blackboard"></div>
                    Equipamento
                </th>
            </tr>
            <td>
                <div class="col" id="entrada-equipamento" style="display: none">
                    <table class="diaria">
                        <tr class="bordaMenu" style="background-color: #d0d0d0">
                            <th class="borda">
                                <div class="col">
                                    Entrada: <i
                                            style="margin-left: 90%"><?= Html::button('', ['class' => 'btn btn-danger glyphicon glyphicon-minus', 'onClick' => 'desativar();']); ?></i>
                                </div>
                </div>
            </td>
        </table>
    </div>
    <div class="customer-form">
        <div class="row">
            <div class="col-lg-5">
                <?= $form->field($model, 'equipamento_nome')->textInput()->label('Nome'); ?>
            </div>

            <div class="col-lg-3">
                <?= $form->field($model, 'equipamento_quantidade_min')->textInput()->label('Quantidade Mínima'); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'equipamento_data')->textInput()->label('data'); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'equipamento_pessoa')->textInput()->label('pessoa'); ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'equipamento_status')->dropDownList([1 => 'Ativo', 2 => 'Inativo']) ?>
            </div>
        </div>

        <div class="padding-v-md">
            <div class="line line-dashed"></div>
        </div>
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 1, // the maximum times, an element can be cloned (default 999)
            'min' => 0, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelEntrada[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'entrada_quantidade',
                'setor_id',
                'entrada_status',
                'entrada_pessoa',
                'entrada_data',
            ],
        ]); ?>
        <div class="panel panel-default">
            <div class="panel-heading" style="background: #cac7c7">
                <i class="fa fa-envelope"></i>
                Entrada de Equipamento
                <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus glyphicon glyphicon-plus"></i>
                    Entrada
                </button>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($modelEntrada as $index => $entrada): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title-address">Entrada: <?= ($index + 1) ?></span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i
                                        class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (!$entrada->isNewRecord) {
                                echo Html::activeHiddenInput($entrada, "[{$index}]entrada_id");
                            }
                            ?>

                            <div class="row">
                                <div class="col-lg-4">
                                    <?= $form->field($entrada, "[{$index}]entrada_quantidade")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-lg-3">


                                    <?= $form->field($entrada, "[{$index}]setor_id")->dropDownList(ArrayHelper::map(PortalSetor::find()->where(['setor_id' => 16])->all(), 'setor_id', 'setor_nome')) ?>
                                </div>
                                <div class="col-lg-4">
                                    <?= $form->field($entrada, "[{$index}]entrada_pessoa")->dropDownList(ArrayHelper::map(\app\models\DadosUnicoPessoa::find()->where(['pessoa_id' =>  Yii::$app->user->getId()])->all(), 'pessoa_id', 'pessoa_nm')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>

        <div class="form-group">
            <?= Html::submitButton($entrada->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
