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
        background-color: #82a3bd;
    }
    .tambem {
        text-align: right;
    }

</style>
<?php

use app\models\DadosUnicoPessoa;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

/* @var $model app\models\Diarias */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Sistema de Diárias';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Diárias Montar Proceso</h1>
        <p class="font-topo" style="text-align: center">
            <br>
            <?php $perfilUser = PublicAuthItem::find()->innerJoinWith('ment')->asArray()->where(['user_id' => Yii::$app->user->getId()])->all();
            $permissao = isset($perfilUser) ? $perfilUser[0]['description'] : "";
            ?>
        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong><?= "Perfil: " . $permissao; ?></strong></p>
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
            ['class' => 'yii\grid\SerialColumn'],
            'diaria_numero',
            [
                'attribute'=> 'diaria_beneficiario',
                'value'    => 'diariaBeneficiario.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_beneficiario', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            'diaria_dt_saida',
            'diaria_dt_chegada',

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{view} {solicitacao_imprimir} {capa_processo}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' =>$key->diaria_id ],['title' => 'Ver']);
                    },
                    'solicitacao_imprimir' => function ($model, $key) {
                        return Html::a('<span  class="glyphicon glyphicon-print" style="color: blue; font-size: 1.2em; margin-left: 6%"></span>', ['solicitacao-imprimir', 'id' =>$key->diaria_id ],['title' => 'Montar Processo','target'=>'_blank']);
                    },
                    'capa_processo' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-print" style="color: orange; font-size: 1.2em; margin-left: 6%"></span>', ['capa-processo', 'id' =>$key->diaria_id ],['title' => 'Capa do Processo', 'target'=>'_blank']);
                    },
                ]
            ]
        ],
    ]);
    ?>
</div>