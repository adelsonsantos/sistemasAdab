<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSaidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-saida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'saida_id') ?>

    <?= $form->field($model, 'saida_quantidade') ?>

    <?= $form->field($model, 'equipamento_id') ?>

    <?= $form->field($model, 'setor_id') ?>

    <?= $form->field($model, 'saida_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
