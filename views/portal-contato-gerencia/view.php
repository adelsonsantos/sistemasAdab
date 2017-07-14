<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoGerencia */

$this->title = $model->cge_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-gerencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cge_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cge_id], [
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
            'cge_id',
            'con_id',
            'ger_id',
        ],
    ]) ?>

</div>
