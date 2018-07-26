<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_status_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_status_st')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
