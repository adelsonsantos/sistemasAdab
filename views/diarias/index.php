<style>
    .table.table-striped tbody tr:hover
    {
        background: #acc7b8;
    }

    #diarias {
        margin-top: -80px;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #fff;
        background-color: #072b17;
    }

    .margintop20 {
        margin-top:20px;
    }

    .nav-pills>li>a {
        border-radius: 0px;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    a:hover {
        color: #000;
        text-decoration: none;
    }

    .nav-stacked>li+li {
        margin-top: 0px;
        margin-left: 0;
        border-bottom:1px solid #dadada;
        border-left:1px solid #dadada;
        border-right:1px solid #dadada;
    }

    .active2 {
        border-right:4px solid #072b17;
    }
    #menu_vertical {
        margin-bottom: 10px;
        margin-left: -14px;
    }
</style>

<?php

use app\models\DadosUnicoPessoa;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diárias';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="diarias-index" id="diarias">
    <?php use kartik\nav\NavX;
    echo NavX::widget([
    'options' => ['class' => 'nav nav-pills'],
    'items' => [
    ['label' => 'Action', 'url' => '#'],
    ['label' => 'Submenu', 'items' => [
    ['label' => 'Action', 'url' => '#'],
    ['label' => 'Another action', 'url' => '#'],
    ['label' => 'Something else here', 'url' => '#'],
    ]],
    ['label' => 'Something else here', 'url' => '#'],
    '<li class="divider"></li>',
    ['label' => 'Separated link', 'url' => '#'],
    ],
    'encodeLabels' => false
    ]);


    ?>
    <div class="jumbotron">
      <!--  <div class="col-md-3 column" id="menu_vertical">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Home</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 1</a></li>
                <li><a href="#" class="active2"><span class="glyphicon glyphicon-chevron-right"></span> Option 2</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 3</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 4</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 6</a></li>
            </ul>
        </div>-->

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Yii::$app->user->can('diaria-index') ? Html::a('Solicitar Diária', ['create'], ['class' => 'btn btn-success']) : ''; ?>
        </p>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Mostrando {begin} - {end} de {totalCount} Diárias",
       // 'options' => ['style'=>'text-align:center '],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'diaria_numero',
            [
                'attribute'=> 'diaria_solicitante',
                'value'    => 'diariaSolicitante.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_solicitante', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'attribute'=> 'diaria_beneficiario',
                'value'    => 'diariaBeneficiario.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_beneficiario', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            'diaria_dt_saida',
            'diaria_dt_chegada',
            'diaria_st',
            //'diaria_beneficiario',
            //'diaria_id',
            //'diaria_solicitante',
            //'diaria_hr_saida',
            //'diaria_hr_chegada',
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
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {my_button}',
                'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        return Html::a('<button class="glyphicon glyphicon-exclamation-sign"></button>', ['my-action', 'diaria_id'=>$model->diaria_id]
                        );
                    },
                ]
            ]
        ],
    ]);
    ?>

</div>
