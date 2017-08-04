<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiariasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'diaria_id') ?>

    <?= $form->field($model, 'diaria_numero') ?>

    <?= $form->field($model, 'diaria_solicitante') ?>

    <?= $form->field($model, 'diaria_beneficiario') ?>

    <?= $form->field($model, 'diaria_dt_saida') ?>

    <?php // echo $form->field($model, 'diaria_hr_saida') ?>

    <?php // echo $form->field($model, 'diaria_dt_chegada') ?>

    <?php // echo $form->field($model, 'diaria_hr_chegada') ?>

    <?php // echo $form->field($model, 'diaria_valor_ref') ?>

    <?php // echo $form->field($model, 'diaria_desconto') ?>

    <?php // echo $form->field($model, 'diaria_qtde') ?>

    <?php // echo $form->field($model, 'diaria_valor') ?>

    <?php // echo $form->field($model, 'diaria_justificativa_feriado') ?>

    <?php // echo $form->field($model, 'meio_transporte_id') ?>

    <?php // echo $form->field($model, 'diaria_transporte_obs') ?>

    <?php // echo $form->field($model, 'diaria_descricao') ?>

    <?php // echo $form->field($model, 'diaria_unidade_custo') ?>

    <?php // echo $form->field($model, 'projeto_cd') ?>

    <?php // echo $form->field($model, 'acao_cd') ?>

    <?php // echo $form->field($model, 'territorio_cd') ?>

    <?php // echo $form->field($model, 'fonte_cd') ?>

    <?php // echo $form->field($model, 'diaria_st') ?>

    <?php // echo $form->field($model, 'diaria_cancelada') ?>

    <?php // echo $form->field($model, 'diaria_devolvida') ?>

    <?php // echo $form->field($model, 'diaria_dt_criacao') ?>

    <?php // echo $form->field($model, 'diaria_hr_criacao') ?>

    <?php // echo $form->field($model, 'diaria_justificativa_fds') ?>

    <?php // echo $form->field($model, 'diaria_processo') ?>

    <?php // echo $form->field($model, 'diaria_empenho') ?>

    <?php // echo $form->field($model, 'diaria_dt_empenho') ?>

    <?php // echo $form->field($model, 'diaria_excluida') ?>

    <?php // echo $form->field($model, 'diaria_roteiro_complemento') ?>

    <?php // echo $form->field($model, 'diaria_comprovada') ?>

    <?php // echo $form->field($model, 'diaria_processo_fisico') ?>

    <?php // echo $form->field($model, 'diaria_empenho_pessoa_id') ?>

    <?php // echo $form->field($model, 'diaria_hr_empenho') ?>

    <?php // echo $form->field($model, 'diaria_extrato_empenho') ?>

    <?php // echo $form->field($model, 'convenio_id') ?>

    <?php // echo $form->field($model, 'indenizacao') ?>

    <?php // echo $form->field($model, 'ger_id') ?>

    <?php // echo $form->field($model, 'diaria_local_solicitacao') ?>

    <?php // echo $form->field($model, 'id_coordenadoria') ?>

    <?php // echo $form->field($model, 'data_viagem_saida') ?>

    <?php // echo $form->field($model, 'data_viagem_chegada') ?>

    <?php // echo $form->field($model, 'super_sd') ?>

    <?php // echo $form->field($model, 'diaria_agrupada') ?>

    <?php // echo $form->field($model, 'imp_diaria_agrupa') ?>

    <?php // echo $form->field($model, 'diaria_indvidual') ?>

    <?php // echo $form->field($model, 'diaria_dt_alteracao') ?>

    <?php // echo $form->field($model, 'etapa_id') ?>

    <?php // echo $form->field($model, 'pedido_empenho') ?>

    <?php // echo $form->field($model, 'qtde_roteiros') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
