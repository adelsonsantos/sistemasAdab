<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComputadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-computador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'com_id') ?>

    <?= $form->field($model, 'com_mac') ?>

    <?= $form->field($model, 'id_coordenadoria') ?>

    <?= $form->field($model, 'ger_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
