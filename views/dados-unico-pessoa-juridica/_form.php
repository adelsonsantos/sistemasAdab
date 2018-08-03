<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoPessoaJuridica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dados-unico-pessoa-juridica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pessoa_id')->textInput() ?>

    <?= $form->field($model, 'pessoa_juridica_cnpj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_juridica_nm_fantasia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_juridica_insc_mun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_juridica_insc_est')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_juridica_dt_abertura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_juridica_contato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pessoa_juridica_fornecedor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
