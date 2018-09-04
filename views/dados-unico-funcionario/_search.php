<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcoesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dados-unico-funcionario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'funcionario_id') ?>

    <?= $form->field($model, 'pessoa_id') ?>

    <?= $form->field($model, 'funcionario_tipo_id') ?>

    <?= $form->field($model, 'funcao_id') ?>

    <?= $form->field($model, 'cargo_permanente') ?>

    <?php // echo $form->field($model, 'funcionario_matricula') ?>

    <?php // echo $form->field($model, 'funcionario_ramal') ?>

    <?php // echo $form->field($model, 'funcionario_email') ?>

    <?php // echo $form->field($model, 'funcionario_dt_admissao') ?>

    <?php // echo $form->field($model, 'funcionario_dt_demissao') ?>

    <?php // echo $form->field($model, 'funcionario_orgao_origem') ?>

    <?php // echo $form->field($model, 'funcionario_conta_fgts') ?>

    <?php // echo $form->field($model, 'contrato_id') ?>

    <?php // echo $form->field($model, 'funcionario_salario') ?>

    <?php // echo $form->field($model, 'cargo_temporario') ?>

    <?php // echo $form->field($model, 'funcionario_orgao_destino') ?>

    <?php // echo $form->field($model, 'est_organizacional_lotacao_id') ?>

    <?php // echo $form->field($model, 'funcionario_validacao_propria') ?>

    <?php // echo $form->field($model, 'funcionario_validacao_rh') ?>

    <?php // echo $form->field($model, 'funcionario_envio_email') ?>

    <?php // echo $form->field($model, 'funcionario_tipo_id_old') ?>

    <?php // echo $form->field($model, 'motorista') ?>

    <?php // echo $form->field($model, 'funcionario_onus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
