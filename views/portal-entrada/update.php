<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEntrada */

$this->title = 'Update Portal Entrada: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Portal Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->entrada_id, 'url' => ['view', 'id' => $model->entrada_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-entrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
