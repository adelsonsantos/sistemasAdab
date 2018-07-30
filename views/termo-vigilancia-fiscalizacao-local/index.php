<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoLocalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Locals';
$this->params['breadcrumbs'][] = $this->title;
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

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Local da Vigilância e Fiscalização </h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Local <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/termo-vigilancia-fiscalizacao-local/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Contato']); ?>
            <br>
            <?= "";  ?>
        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong><?= ""; ?></strong></p>
    </div>
</div>
<div class="grid">
    <?php try {
        echo
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'vigilancia_fiscalizacao_local_id',
                'vigilancia_fiscalizacao_local_nome',
                'vigilancia_fiscalizacao_local_st',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    } catch (Exception $e) {
    } ?>
</div>
