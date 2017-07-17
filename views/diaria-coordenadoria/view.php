<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */

$this->params['breadcrumbs'][] = ['label' => 'Diaria Coordenadorias', 'url' => ['index']];
$this->title = "Coordenadoria de ". $model->nome;
?>
<div class="diaria-coordenadoria-view">
    <div class="jumbotron">
    <h2 style="text-align: left"><?= Html::encode($this->title) ?></h2><hr>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id_coordenadoria], ['class' => 'btn btn-primary', 'style' => 'font-size: 13px']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id_coordenadoria], ['style' => 'font-size: 13px',
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja realmente Deletar essa Coordenadoria?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
        ],
    ]);

    echo Html::a( 'Voltar', Yii::$app->request->referrer);?>
    </div>

</div>
