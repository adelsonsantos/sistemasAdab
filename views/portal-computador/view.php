<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalComputador */

$this->title = $model->com_id;
$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Computadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-computador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->com_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->com_id], [
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
            'com_id',
            'com_mac',
            'id_coordenadoria',
            'ger_id',
        ],
    ]) ?>

</div>
