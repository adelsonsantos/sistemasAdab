<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */

$this->title = 'Update Portal Contato Coordenadoria: ' . $model->coc_id;
$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Coordenadorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->coc_id, 'url' => ['view', 'id' => $model->coc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portal-contato-coordenadoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
