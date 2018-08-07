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

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalEquipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Equipamentos</h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Equipamento <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/portal-equipamento/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Contato']); ?>
            <br>
            <?= "";  ?>
        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong><?= ""; ?></strong></p>
    </div>
</div>
<div class="grid">

    <?php try { echo
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Resultado não encontrado',
        'showOnEmpty' => true,
        'summary' => "Mostrando {begin} - {end} dos {totalCount} equipamentos",
        'columns' => [
            'equipamento_nome',
            'equipamento_quantidade_min',
            'equipamento_status',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' => $key->equipamento_id], ['title' => 'Ver']);
                    },
                    'update' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' => $key->equipamento_id], ['title' => 'Alterar']);
                    },
                ]
            ]
        ],
    ]);
    } catch (Exception $e) {
    } ?>
</div>
