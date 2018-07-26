<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProprietarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-proprietario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_tipo_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_cpf') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_cnpj') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_svo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
