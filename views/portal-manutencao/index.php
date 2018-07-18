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
/* @var $searchModel app\models\PortalManutencaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Manutenção</h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Manutenção <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/portal-manutencao/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Contato']); ?>
            <br>
            <?= "";  ?>
        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong><?= ""; ?></strong></p>
    </div>
</div>
<div class="grid">
    <?= empty($model) ? "<br>" : '';  ?>
    <?php try { echo
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Resultado não encontrado',
        'showOnEmpty' => true,
        'summary' => "Mostrando {begin} - {end} dos {totalCount} equipamentos",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'manutencao_id',
            'tombo_id',
            'manutencao_data_recebimento',
            'manutencao_pessoa_recebimento_inf',
            'manutencao_beneficiario',
            //'manutencao_data_devolucao',
            //'manutencao_func_devolucao_inf',
            //'manutencao_beneficiario_devolucao',
            //'manutencao_descricao',
            //'manutencao_resolucao',
            //'manutencao_status',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' => $key->cog_id], ['title' => 'Ver']);
                    },
                    'update' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' => $key->cog_id], ['title' => 'Alterar']);
                    },
                ]
            ]
        ],
    ]);
    } catch (Exception $e) {
    } ?>
</div>
