<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalManutencao */

$this->title = 'Update Portal Manutencao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Portal Manutencaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->manutencao_id, 'url' => ['view', 'id' => $model->manutencao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-manutencao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
