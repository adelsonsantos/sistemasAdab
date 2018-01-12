<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalContatoCoordenadoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Contato Coordenadorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-coordenadoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portal Contato Coordenadoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'coc_id',
            'con_id',
            'id_coordenadoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>