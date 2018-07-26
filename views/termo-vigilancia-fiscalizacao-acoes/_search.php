<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcoesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-acoes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_acoes_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_acao_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_acao_cmp_complentar_qtd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
