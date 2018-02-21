<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalGerencia */


$this->params['breadcrumbs'][] = ['label' => 'Portal Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ger_id, 'url' => ['view', 'id' => $model->ger_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-gerencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
