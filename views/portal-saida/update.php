<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSaida */

$this->title = 'Update Portal Saida: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Portal Saidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->saida_id, 'url' => ['view', 'id' => $model->saida_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-saida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
