<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalContatoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portal Contatos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portal Contato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'con_id',
            'con_nome',
            'con_telefone',
            'con_ddd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>