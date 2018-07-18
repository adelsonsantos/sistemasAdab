<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalTomboSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Tombos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-tombo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portal Tombo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tombo_id',
            'tombo_imei',
            'tombo_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
