<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-populacao-animal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_faixa_etaria_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_nascidos')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_mortos')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_existentes')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_machos_vacinados')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_campos_femeas_mortos')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_femeas_existentes')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_quantidade')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_populacao_animal_st')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
