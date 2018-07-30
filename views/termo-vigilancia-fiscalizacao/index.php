<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>
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



/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Vigilância e Fiscalização </h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Vigilância e Fiscalização <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/portal-manutencao/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Contato']); ?>
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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_id',
            'coordenadas_id',
            'gerencia_id',
            'municipio_id',
            'data_create',
            //'vigilancia_fiscalizacao_veiculo_id',
            //'vigilancia_fiscalizacao_status_id',
            //'vigilancia_fiscalizacao_vacina_id',
            //'vigilancia_fiscalizacao_observacao',
            //'vigilancia_fiscalizacao_produtor_id',
            //'vigilancia_fiscalizacao_proprietario_id',
            //'vigilancia_fiscalizacao_local_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
