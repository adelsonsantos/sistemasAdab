<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-animal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_nome') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_animal_st') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
