<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoGerencia */

$this->title = 'Update Portal Contato Gerencia: ' . $model->cge_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cge_id, 'url' => ['view', 'id' => $model->cge_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-contato-gerencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
