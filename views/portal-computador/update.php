<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalComputador */

$this->title = 'Update PortalContatoTipo Computador: ' . $model->com_id;
$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Computadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_id, 'url' => ['view', 'id' => $model->com_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-computador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
