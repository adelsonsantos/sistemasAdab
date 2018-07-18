<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSetor */

$this->title = $model->setor_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-setor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->setor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->setor_id], [
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
            'setor_id',
            'setor_nome',
            'setor_status',
        ],
    ]) ?>

</div>
