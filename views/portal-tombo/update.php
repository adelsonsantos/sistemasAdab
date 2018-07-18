<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalTombo */

$this->title = 'Update Portal Tombo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Portal Tombos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tombo_id, 'url' => ['view', 'id' => $model->tombo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-tombo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
