<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
