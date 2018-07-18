<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEntrada */

$this->title = $model->entrada_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-entrada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->entrada_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->entrada_id], [
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
            'entrada_id',
            'entrada_quantidade',
            'equipamento_id',
            'setor_id',
            'entrada_status',
            'entrada_pessoa',
            'entrada_data',
        ],
    ]) ?>

</div>
