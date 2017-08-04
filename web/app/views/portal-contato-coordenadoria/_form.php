<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-contato-coordenadoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'con_id')->textInput() ?>

    <?= $form->field($model, 'id_coordenadoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
