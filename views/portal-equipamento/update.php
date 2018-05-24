<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEquipamento */

$this->title = 'Update Portal Equipamento: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Portal Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipamento_id, 'url' => ['view', 'id' => $model->equipamento_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-equipamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
