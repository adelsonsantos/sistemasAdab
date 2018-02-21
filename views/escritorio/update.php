<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalEscritorio */

$this->params['breadcrumbs'][] = ['label' => 'Portal Escritorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->esc_id, 'url' => ['view', 'id' => $model->esc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-escritorio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
