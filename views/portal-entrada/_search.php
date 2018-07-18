<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEntradaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-entrada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'entrada_id') ?>

    <?= $form->field($model, 'entrada_quantidade') ?>

    <?= $form->field($model, 'equipamento_id') ?>

    <?= $form->field($model, 'setor_id') ?>

    <?= $form->field($model, 'entrada_status') ?>

    <?php // echo $form->field($model, 'entrada_pessoa') ?>

    <?php // echo $form->field($model, 'entrada_data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
