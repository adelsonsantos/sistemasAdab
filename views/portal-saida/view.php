<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSaida */

$this->title = $model->saida_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Saidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-saida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->saida_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->saida_id], [
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
            'saida_id',
            'saida_quantidade',
            'equipamento_id',
            'setor_id',
            'saida_status',
        ],
    ]) ?>

</div>
