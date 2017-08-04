<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-contato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'con_id') ?>

    <?= $form->field($model, 'con_nome') ?>

    <?= $form->field($model, 'con_telefone') ?>

    <?= $form->field($model, 'con_ddd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
