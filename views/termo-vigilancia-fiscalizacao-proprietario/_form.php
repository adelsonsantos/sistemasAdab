<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProprietario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-proprietario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_tipo_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_cpf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_cnpj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_svo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
