<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diarias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Diarias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'diaria_id',
            'diaria_numero',
            'diaria_solicitante',
            'diaria_beneficiario',
            'diaria_dt_saida',
            // 'diaria_hr_saida',
            // 'diaria_dt_chegada',
            // 'diaria_hr_chegada',
            // 'diaria_valor_ref',
            // 'diaria_desconto',
            // 'diaria_qtde',
            // 'diaria_valor',
            // 'diaria_justificativa_feriado',
            // 'meio_transporte_id',
            // 'diaria_transporte_obs',
            // 'diaria_descricao',
            // 'diaria_unidade_custo',
            // 'projeto_cd',
            // 'acao_cd',
            // 'territorio_cd',
            // 'fonte_cd',
            // 'diaria_st',
            // 'diaria_cancelada',
            // 'diaria_devolvida',
            // 'diaria_dt_criacao',
            // 'diaria_hr_criacao',
            // 'diaria_justificativa_fds',
            // 'diaria_processo',
            // 'diaria_empenho',
            // 'diaria_dt_empenho',
            // 'diaria_excluida',
            // 'diaria_roteiro_complemento',
            // 'diaria_comprovada',
            // 'diaria_processo_fisico',
            // 'diaria_empenho_pessoa_id',
            // 'diaria_hr_empenho',
            // 'diaria_extrato_empenho',
            // 'convenio_id',
            // 'indenizacao',
            // 'ger_id',
            // 'diaria_local_solicitacao',
            // 'id_coordenadoria',
            // 'data_viagem_saida',
            // 'data_viagem_chegada',
            // 'super_sd',
            // 'diaria_agrupada',
            // 'imp_diaria_agrupa',
            // 'diaria_indvidual',
            // 'diaria_dt_alteracao',
            // 'etapa_id',
            // 'pedido_empenho',
            // 'qtde_roteiros',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
