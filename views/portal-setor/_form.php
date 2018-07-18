<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSetor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-setor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'setor_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setor_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
