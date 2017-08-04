<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-coordenadoria-gerencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cog_id') ?>

    <?= $form->field($model, 'id_coordenadoria') ?>

    <?= $form->field($model, 'ger_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
