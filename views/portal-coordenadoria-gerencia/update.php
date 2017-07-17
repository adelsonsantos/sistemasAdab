<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */
/* @var $modelGerencia app\models\PortalGerencia */
/* @var $modelCoordenadoria app\models\DiariaCoordenadoria */

$this->title = 'Alterar Gerência:';
$this->params['breadcrumbs'][] = ['label' => 'Portal Coordenadoria Gerencias', 'url' => ['index']];
?>
<div class="portal-coordenadoria-gerencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelGerencia' => $modelGerencia,
        'modelCoordenadoria' => $modelCoordenadoria
    ]) ?>

</div>
