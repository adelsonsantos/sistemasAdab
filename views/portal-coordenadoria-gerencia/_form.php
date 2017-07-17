<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $modelGerencia app\models\PortalGerencia */
/* @var $modelCoordenadoria app\models\DiariaCoordenadoria */
/* @var $model app\models\PortalCoordenadoriaGerencia */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="jumbotron">
    <div class="portal-coordenadoria-gerencia-form" style="text-align: left;">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-sm-6">
                <?=$form->field($model, 'id_coordenadoria')->dropDownList(
                    ArrayHelper::map($modelCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome'), ['prompt'=>'Selecione a Coordenadoria'])->label('Coordenadoria');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($modelGerencia, 'ger_nome')->input('text')->label('Nome da Gerência'); ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
            <?= Html::a('<span class="glyphicon"></span> Cancelar', ['/portal-coordenadoria-gerencia/index']);?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>



