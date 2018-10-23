<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoSegurancaUsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dados-unico-seguranca-usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pessoa_id') ?>

    <?= $form->field($model, 'usuario_login') ?>

    <?= $form->field($model, 'usuario_senha') ?>

    <?= $form->field($model, 'usuario_st') ?>

    <?= $form->field($model, 'usuario_dt_criacao') ?>

    <?php // echo $form->field($model, 'usuario_dt_alteracao') ?>

    <?php // echo $form->field($model, 'usuario_primeiro_logon') ?>

    <?php // echo $form->field($model, 'usuario_diaria') ?>

    <?php // echo $form->field($model, 'id_coordenadoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
