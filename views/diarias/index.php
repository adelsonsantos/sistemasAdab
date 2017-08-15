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
</style>

<?php

use app\models\DadosUnicoPessoa;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

    <div style="position: absolute">
        <?= Yii::$app->controller->renderPartial('menu');?>
    </div>
    <div style="text-align: center">
            <h1 class="font-topo">Diárias</h1>
            <p class="font-topo">
                <?= Yii::$app->user->can('diaria-index') ? Html::a('Solicitar Diária', ['create'], ['class' => 'btn btn-success']) : ''; ?>
            </p>
    </div>
<div class="grid">

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
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {my_button}',
                'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        return Html::a('', ['my-action', 'diaria_id'=>$model->diaria_id]
                        );
                    },
                ]
            ]
        ],
    ]);
    ?></div></div>