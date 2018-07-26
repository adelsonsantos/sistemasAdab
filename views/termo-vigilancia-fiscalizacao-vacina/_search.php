<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoVacinaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="termo-vigilancia-fiscalizacao-vacina-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_vacina_id') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_revenda') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_brucelose_revenda') ?>

    <?= $form->field($model, 'vigilancia_fiscalizacao_outros_revenda') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_brucelose_nota_fiscal') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_brucelose_laboratorio_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_outros_laboratorio_id') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_partida') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_brucelose_partida') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_outros_partida') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_validade') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_brucelose_validade') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_outros_validade') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_brucelose_data_vacinacao') ?>

    <?php // echo $form->field($model, 'vigilancia_fiscalizacao_outros_data_vacinacao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
