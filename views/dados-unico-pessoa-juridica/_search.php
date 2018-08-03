<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoPessoaJuridicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dados-unico-pessoa-juridica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pessoa_id') ?>

    <?= $form->field($model, 'pessoa_juridica_cnpj') ?>

    <?= $form->field($model, 'pessoa_juridica_nm_fantasia') ?>

    <?= $form->field($model, 'pessoa_juridica_insc_mun') ?>

    <?= $form->field($model, 'pessoa_juridica_insc_est') ?>

    <?php // echo $form->field($model, 'pessoa_juridica_dt_abertura') ?>

    <?php // echo $form->field($model, 'pessoa_juridica_contato') ?>

    <?php // echo $form->field($model, 'pessoa_juridica_fornecedor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
