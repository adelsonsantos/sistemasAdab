<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */

$this->title = 'Update Diaria Coordenadoria: ' . $model->id_coordenadoria;
$this->params['breadcrumbs'][] = ['label' => 'Diaria Coordenadorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_coordenadoria, 'url' => ['view', 'id' => $model->id_coordenadoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diaria-coordenadoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
