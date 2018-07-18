<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEquipamentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-equipamento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'equipamento_id') ?>

    <?= $form->field($model, 'equipamento_nome') ?>

    <?= $form->field($model, 'equipamento_quantidade_min') ?>

    <?= $form->field($model, 'equipamento_status') ?>

    <?= $form->field($model, 'equipamento_pessoa') ?>

    <?php // echo $form->field($model, 'equipamento_data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
