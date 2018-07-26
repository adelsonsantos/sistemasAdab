<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoAtividadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Termo Vigilancia Fiscalizacao Atividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-atividade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Termo Vigilancia Fiscalizacao Atividade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vigilancia_fiscalizacao_atividade_id',
            'vigilancia_fiscalizacao_atividade_nome',
            'vigilancia_fiscalizacao_atividade_st',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
