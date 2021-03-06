<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEquipamento2 */
/* @var $form yii\widgets\ActiveForm */
?>


<?php
require 'style.php';
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\PortalSaida */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?=$model->isNewRecord ? 'Cadastrar' : 'Alterar'?> Saída de Equipamento </h1>
    </div>
</div>
<div class="grid">

    <?php $form = ActiveForm::begin(); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon fa fa-keyboard-o"></div>
                    Equipamento
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'equipamento_id')->textInput()->label('Nome'); ?>
                    </div>

                    <div class="col-lg-2">
                        <?= $form->field($model, 'saida_quantidade')->textInput()->label('Quantidade'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'setor_id')->textInput()->label('Setor'); ?>
                    </div>

                    <div class="col-lg-2">
                        <?= $form->field($model, 'saida_status')->dropDownList(
                            [1 => 'Ativo', 2 => 'Inativo']) ?>
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

