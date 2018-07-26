<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoVacina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-vacina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_revenda')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_revenda')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_outros_revenda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_nota_fiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_laboratorio_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_outros_laboratorio_id')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_partida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_partida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_outros_partida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_validade')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_validade')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_outros_validade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_data_vacinacao')->textInput() ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_outros_data_vacinacao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
