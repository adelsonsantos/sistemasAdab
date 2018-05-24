<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSaida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-saida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'saida_quantidade')->textInput() ?>

    <?= $form->field($model, 'equipamento_id')->textInput() ?>

    <?= $form->field($model, 'setor_id')->textInput() ?>

    <?= $form->field($model, 'saida_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
