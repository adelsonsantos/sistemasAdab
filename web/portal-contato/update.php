<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContato */

$this->title = 'Update PortalContatoTipo Contato: ' . $model->con_id;
$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Contatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->con_id, 'url' => ['view', 'id' => $model->con_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-contato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
