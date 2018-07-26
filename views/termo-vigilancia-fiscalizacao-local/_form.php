<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoLocal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-local-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_local_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_local_st')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
