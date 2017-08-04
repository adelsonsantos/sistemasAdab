<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-contato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'con_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'con_telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'con_ddd')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
