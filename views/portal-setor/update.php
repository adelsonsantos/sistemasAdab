<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSetor */

$this->title = 'Update Portal Setor: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Portal Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->setor_id, 'url' => ['view', 'id' => $model->setor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-setor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
