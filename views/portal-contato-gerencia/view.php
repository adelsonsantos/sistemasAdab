<?php

use app\models\PortalContato;
use app\models\PortalGerencia;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoGerencia */

$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Gerencias', 'url' => ['index']];
?>
<div class="portal-contato-gerencia-view">
    <div class="jumbotron">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->cge_id], ['class' => 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->cge_id], ['style' => 'font-size: 13px',
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja Deletar esse Contato?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'ger_id',
                'label' => 'Coordenadoria',
                'value' => implode(ArrayHelper::map(PortalGerencia::find()->asArray()->where("ger_id = {$model->ger_id}")->all(), 'ger_nome', 'ger_nome'), ['class'=>'form-control col-sm-1']),
            ],
            [
                'attribute' => 'cge_id',
                'label' => 'DDD',
                'value' => implode(ArrayHelper::map(PortalContato::find()->asArray()->where("con_id = {$model->con_id}")->all(), 'con_ddd', 'con_ddd'), ['class'=>'form-control']),
            ],
            [
                'attribute' => 'con_id',
                'label' => 'Telefone',
                'value' => implode(ArrayHelper::map(PortalContato::find()->asArray()->where("con_id = {$model->con_id}")->all(), 'con_telefone', 'con_telefone'), ['class'=>'form-control']),
            ],
        ],
    ]);
    echo Html::a( 'Voltar', Yii::$app->request->referrer);?>

    </div>
</div>
