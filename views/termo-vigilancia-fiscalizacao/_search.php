<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_id') ?>

    <?= $form->field($model, 'coordenadas_id') ?>

    <?= $form->field($model, 'gerencia_id') ?>

    <?= $form->field($model, 'municipio_id') ?>

    <?= $form->field($model, 'data_create') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_veiculo_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_status_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_vacina_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_observacao') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_produtor_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_proprietario_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_local_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
