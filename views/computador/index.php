<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComputadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Computadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-computador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portal Computador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'com_id',
            'com_mac',
            'id_coordenadoria',
            'ger_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
