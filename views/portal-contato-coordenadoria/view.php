<?php

use app\models\DiariaCoordenadoria;
use app\models\PortalContato;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */

$this->params['breadcrumbs'][] = ['label' => 'Contato das Coordenadorias', 'url' => ['index']];
?>
<div class="portal-contato-coordenadoria-view">
    <div class="jumbotron">
    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->coc_id], ['class' => 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->coc_id], ['class' => 'btn btn-danger', 'style' => 'font-size: 13px',
            'data' => [
                'confirm' => 'Deseja realmente Deletar esse número da telefone?',
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
                'attribute' => 'coc_id',
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
   echo Html::a('<span class="glyphicon"></span> Voltar', ['/portal-contato-coordenadoria/index']);?>
    </div>
</div>
