<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalManutencaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-manutencao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'manutencao_id') ?>

    <?= $form->field($model, 'tombo_id') ?>

    <?= $form->field($model, 'manutencao_data_recebimento') ?>

    <?= $form->field($model, 'manutencao_pessoa_recebimento_inf') ?>

    <?= $form->field($model, 'manutencao_beneficiario') ?>

    <?php // echo $form->field($model, 'manutencao_data_devolucao') ?>

    <?php // echo $form->field($model, 'manutencao_func_devolucao_inf') ?>

    <?php // echo $form->field($model, 'manutencao_beneficiario_devolucao') ?>

    <?php // echo $form->field($model, 'manutencao_descricao') ?>

    <?php // echo $form->field($model, 'manutencao_resolucao') ?>

    <?php // echo $form->field($model, 'manutencao_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
