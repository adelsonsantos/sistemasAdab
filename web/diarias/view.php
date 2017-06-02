<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */

$this->title = $model->diaria_id;
$this->params['breadcrumbs'][] = ['label' => 'Diarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diarias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->diaria_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->diaria_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'diaria_id',
            'diaria_numero',
            'diaria_solicitante',
            'diaria_beneficiario',
            'diaria_dt_saida',
            'diaria_hr_saida',
            'diaria_dt_chegada',
            'diaria_hr_chegada',
            'diaria_valor_ref',
            'diaria_desconto',
            'diaria_qtde',
            'diaria_valor',
            'diaria_justificativa_feriado',
            'meio_transporte_id',
            'diaria_transporte_obs',
            'diaria_descricao',
            'diaria_unidade_custo',
            'projeto_cd',
            'acao_cd',
            'territorio_cd',
            'fonte_cd',
            'diaria_st',
            'diaria_cancelada',
            'diaria_devolvida',
            'diaria_dt_criacao',
            'diaria_hr_criacao',
            'diaria_justificativa_fds',
            'diaria_processo',
            'diaria_empenho',
            'diaria_dt_empenho',
            'diaria_excluida',
            'diaria_roteiro_complemento',
            'diaria_comprovada',
            'diaria_processo_fisico',
            'diaria_empenho_pessoa_id',
            'diaria_hr_empenho',
            'diaria_extrato_empenho',
            'convenio_id',
            'indenizacao',
            'ger_id',
            'diaria_local_solicitacao',
            'id_coordenadoria',
            'data_viagem_saida',
            'data_viagem_chegada',
            'super_sd',
            'diaria_agrupada',
            'imp_diaria_agrupa',
            'diaria_indvidual',
            'diaria_dt_alteracao',
            'etapa_id',
            'pedido_empenho',
            'qtde_roteiros',
        ],
    ]) ?>

</div>
