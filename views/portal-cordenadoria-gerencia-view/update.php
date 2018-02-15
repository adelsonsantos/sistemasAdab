<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Contato Coordenadoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cog_id, 'url' => ['view', 'id' => $model->cog_id]];
$this->params['breadcrumbs'][] = 'Alterar';
?>
<div class="portal-coordenadoria-gerencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
