<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-populacao-animal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_faixa_etaria_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_nascidos') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_mortos') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_existentes') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_vacinados') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_mortos') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_femeas_existentes') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_quantidade') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_st') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_animal_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
