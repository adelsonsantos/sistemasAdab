<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalCampos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-animal-campos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_nascidos')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_mortos')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_existentes')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_vacinados')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_nascidas')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_mortos')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_existentes')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_quantidade')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_st')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
