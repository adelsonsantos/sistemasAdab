<?php

use app\models\DiariaCoordenadoria;
use app\models\PortalGerencia;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */

$this->params['breadcrumbs'][] = ['label' => 'Portal Coordenadoria Gerencias', 'url' => ['index']];
?>
<div class="portal-coordenadoria-gerencia-view">
    <div class="jumbotron">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->cog_id], ['class' => 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->cog_id], ['style' => 'font-size: 13px',
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_coordenadoria',
                'label' => 'Coordenadoria',
                'value' => implode(ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->where("id_coordenadoria = {$model->id_coordenadoria}")->all(), 'nome', 'nome'), ['class'=>'form-control col-sm-1']),
            ],
            [
                'attribute' => 'ger_id',
                'label' => 'Gerência',
                'value' => implode(ArrayHelper::map(PortalGerencia::find()->asArray()->where("ger_id = {$model->ger_id}")->all(), 'ger_nome', 'ger_nome'), array('class'=>'form-control')),
            ]
        ],
    ]);
    echo Html::a( 'Voltar', Yii::$app->request->referrer);?>
    </div>
</div>
