<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */

$this->params['breadcrumbs'][] = ['label' => 'Diaria Coordenadorias', 'url' => ['index']];
?>
<div class="diaria-coordenadoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id_coordenadoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id_coordenadoria], [
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
           // 'id_coordenadoria',
            'nome',
        ],
    ]) ?>

</div>
