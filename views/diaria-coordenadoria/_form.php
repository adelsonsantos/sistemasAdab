<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="jumbotron">
    <div class="diaria-coordenadoria-form" style="text-align: left;">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
            <?= Html::a('<span class="glyphicon"></span> Cancelar', ['/diaria-coordenadoria/index']);?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
