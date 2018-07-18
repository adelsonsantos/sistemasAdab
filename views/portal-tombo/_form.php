<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalTombo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-tombo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tombo_imei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tombo_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
