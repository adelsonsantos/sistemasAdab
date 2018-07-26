<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProdutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-produtor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_tipo_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_cpf') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_cnpj') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_svo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
