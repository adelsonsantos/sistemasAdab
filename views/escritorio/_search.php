<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEscritorioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-escritorio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'esc_id') ?>

    <?= $form->field($model, 'esc_nome') ?>

    <?= $form->field($model, 'id_coordenadoria') ?>

    <?= $form->field($model, 'ger_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
