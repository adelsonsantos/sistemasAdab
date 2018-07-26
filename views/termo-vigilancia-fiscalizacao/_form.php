<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coordenadas_id')->textInput() ?>

    <?= $form->field($model, 'gerencia_id')->textInput() ?>

    <?= $form->field($model, 'municipio_id')->textInput() ?>

    <?= $form->field($model, 'data_create')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_veiculo_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_status_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_vacina_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_observacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_local_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
