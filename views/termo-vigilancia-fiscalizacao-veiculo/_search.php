<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoVeiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-veiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_placa') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_km_incial') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_km_final') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_data_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
