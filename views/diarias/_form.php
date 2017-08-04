<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diarias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diaria_numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_solicitante')->textInput() ?>

    <?= $form->field($model, 'diaria_beneficiario')->textInput() ?>

    <?= $form->field($model, 'diaria_dt_saida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_hr_saida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_dt_chegada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_hr_chegada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_valor_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_desconto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_qtde')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_justificativa_feriado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meio_transporte_id')->textInput() ?>

    <?= $form->field($model, 'diaria_transporte_obs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_unidade_custo')->textInput() ?>

    <?= $form->field($model, 'projeto_cd')->textInput() ?>

    <?= $form->field($model, 'acao_cd')->textInput() ?>

    <?= $form->field($model, 'territorio_cd')->textInput() ?>

    <?= $form->field($model, 'fonte_cd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_st')->textInput() ?>

    <?= $form->field($model, 'diaria_cancelada')->textInput() ?>

    <?= $form->field($model, 'diaria_devolvida')->textInput() ?>

    <?= $form->field($model, 'diaria_dt_criacao')->textInput() ?>

    <?= $form->field($model, 'diaria_hr_criacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_justificativa_fds')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_processo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_empenho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_dt_empenho')->textInput() ?>

    <?= $form->field($model, 'diaria_excluida')->textInput() ?>

    <?= $form->field($model, 'diaria_roteiro_complemento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_comprovada')->textInput() ?>

    <?= $form->field($model, 'diaria_processo_fisico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_empenho_pessoa_id')->textInput() ?>

    <?= $form->field($model, 'diaria_hr_empenho')->textInput() ?>

    <?= $form->field($model, 'diaria_extrato_empenho')->textInput() ?>

    <?= $form->field($model, 'convenio_id')->textInput() ?>

    <?= $form->field($model, 'indenizacao')->textInput() ?>

    <?= $form->field($model, 'ger_id')->textInput() ?>

    <?= $form->field($model, 'diaria_local_solicitacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_coordenadoria')->textInput() ?>

    <?= $form->field($model, 'data_viagem_saida')->textInput() ?>

    <?= $form->field($model, 'data_viagem_chegada')->textInput() ?>

    <?= $form->field($model, 'super_sd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diaria_agrupada')->textInput() ?>

    <?= $form->field($model, 'imp_diaria_agrupa')->textInput() ?>

    <?= $form->field($model, 'diaria_indvidual')->textInput() ?>

    <?= $form->field($model, 'diaria_dt_alteracao')->textInput() ?>

    <?= $form->field($model, 'etapa_id')->textInput() ?>

    <?= $form->field($model, 'pedido_empenho')->textInput() ?>

    <?= $form->field($model, 'qtde_roteiros')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
