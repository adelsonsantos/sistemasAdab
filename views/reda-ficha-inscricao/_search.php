<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RedaFichaInscricaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reda-ficha-inscricao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDE_FICHA_INSCRICAO') ?>

    <?= $form->field($model, 'IDE_PROCESSO_SELETIVO') ?>

    <?= $form->field($model, 'NOM_CANDIDATO') ?>

    <?= $form->field($model, 'DTC_NASCIMENTO') ?>

    <?= $form->field($model, 'NUM_CPF') ?>

    <?php // echo $form->field($model, 'NUM_RG') ?>

    <?php // echo $form->field($model, 'NOM_ORGAO_EMISSOR') ?>

    <?php // echo $form->field($model, 'DES_ESTADO_CIVIL') ?>

    <?php // echo $form->field($model, 'STS_DEFICIENTE_FISICO') ?>

    <?php // echo $form->field($model, 'DES_DEFICIENCIA') ?>

    <?php // echo $form->field($model, 'STS_FILHOS') ?>

    <?php // echo $form->field($model, 'QTD_FILHOS') ?>

    <?php // echo $form->field($model, 'DES_ENDERECO') ?>

    <?php // echo $form->field($model, 'NOM_BAIRRO') ?>

    <?php // echo $form->field($model, 'NUM_CEP') ?>

    <?php // echo $form->field($model, 'NOM_CIDADE') ?>

    <?php // echo $form->field($model, 'NOM_ESTADO') ?>

    <?php // echo $form->field($model, 'NUM_TELEFONE01') ?>

    <?php // echo $form->field($model, 'NUM_TELEFONE02') ?>

    <?php // echo $form->field($model, 'DES_EMAIL') ?>

    <?php // echo $form->field($model, 'DTC_CADASTRO') ?>

    <?php // echo $form->field($model, 'STS_APROVADO') ?>

    <?php // echo $form->field($model, 'NUM_CNH') ?>

    <?php // echo $form->field($model, 'TIP_CATEGORIA') ?>

    <?php // echo $form->field($model, 'DTC_VALIDADE_CNH') ?>

    <?php // echo $form->field($model, 'COD_CARGO_CURSO_PROCESSO') ?>

    <?php // echo $form->field($model, 'DES_CARGO_CURSO_PROCESSO') ?>

    <?php // echo $form->field($model, 'DES_RACA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
