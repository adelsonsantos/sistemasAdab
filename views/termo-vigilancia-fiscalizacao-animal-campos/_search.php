<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalCamposSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-animal-campos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_nascidos')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_mortos')->checkbox() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_existentes')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_machos_vacinados')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_nascidas')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_mortos')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_existentes')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_quantidade')->checkbox() ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_st') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
