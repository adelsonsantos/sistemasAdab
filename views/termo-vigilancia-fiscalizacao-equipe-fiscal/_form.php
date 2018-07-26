<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-equipe-fiscal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pessoa_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
