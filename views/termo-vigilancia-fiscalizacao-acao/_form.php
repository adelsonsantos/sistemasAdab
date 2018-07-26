<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-acao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_acao_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_acao_st')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_acao_cmp_complentar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
