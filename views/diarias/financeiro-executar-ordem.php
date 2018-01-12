<style>
    .font-topo{
        font-size: 20px;
        font-weight: bold;
    }

    .grid{
        margin-left: 209px;
    }

    #w0-filters{
        background-color: rgba(220, 222, 221, 0);
    }
    .table thead tr{
        background-color: #dcdedd;
    }
    .tambem {
        text-align: right;
    }

</style>
<?php

use app\models\DadosUnicoEstOrganizacional;
use app\models\DadosUnicoPessoa;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

/* @var $model app\models\Diarias */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>

<div style="height:75px;">
    <div>
        <?=Html::beginForm(['executando-ordem'],'post');?>
        <h1 class="font-topo" style="text-align: center"> Financeiro \ Executar Ordem <?=Html::submitButton('<span class="glyphicon glyphicon-open" style="color: green; font-size: 1.2em; margin-left: 3%"></span>', ['class' => 'btn btn-default',
                'title' => 'Executar Diárias',
                'data' => [
                    'confirm' => 'Tem certeza que deseja Executar Todas as Diárias Selecionadas ?',
                    'method'  => 'post',
                ]]);?>
        </h1>

        <p class="font-topo" style="text-align: center">
            <br>
            <?php $perfilUser = PublicAuthItem::find()->innerJoinWith('ment')->asArray()->where(['user_id' => Yii::$app->user->getId()])->all();
            $permissao = isset($perfilUser) ? $perfilUser[0]['description'] : ""; ?>
        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap; margin-top: -10px"><strong><?= "Perfil: " . $permissao; ?></strong></p>
    </div>
</div>
<div class="grid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Resultado não encontrado',
        'showOnEmpty' => true,
        'summary' => "Mostrando {begin} - {end} de {totalCount} Diárias",
        //'options' => ['class' => 'YourCustomTableClass'],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn',  'checkboxOptions' => function($model) {
                return ['value' => $model->diaria_id];
            }],

            'diaria_numero',
            [
                'attribute'=> 'diaria_beneficiario',
                'value'    => 'diariaBeneficiario.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_beneficiario', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'label' => 'Data Solicitação',
                'attribute' => 'diaria_dt_criacao',
                'format' => ['date', 'php:d/m/Y']
            ],
            [
                'label' => 'Partida Prevista',
                'attribute' => 'diaria_dt_saida'
            ],
            [
                'label' => 'Chegada Prevista',
                'attribute' => 'diaria_dt_chegada'
            ],

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{view} {financeiro_executar_diaria} {financeiro_executar_ordem_devolver}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="font-size: 1.2em; margin-left: 3%"></span>', ['view', 'id' =>$key->diaria_id ],['title' => 'Ver']);
                    },
                    'financeiro_executar_diaria' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-ok-sign" style="color: #1B5E20; font-size: 1.2em; margin-left: 3%"></span>', ['financeiro-executar-diaria', 'id' =>$key->diaria_id ],['title' => 'Executar Diária']);
                    },
                    'financeiro_executar_ordem_devolver' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-save" style="color: red; font-size: 1.2em; margin-left: 3%"></span>', ['financeiro-executar-ordem-devolver', 'id' =>$key->diaria_id ],['title' => 'Devolver']);
                    },
                ]
            ]
        ],
    ]); ?>
    <?= Html::endForm();?>
</div>