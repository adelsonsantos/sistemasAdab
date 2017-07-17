<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */
/* @var $modelCoordenadoria app\models\DiariaCoordenadoria */
/* @var $modelGerencia app\models\PortalGerencia */

$this->title = 'Criar Gerência';
$this->params['breadcrumbs'][] = ['label' => 'Portal Coordenadoria Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-coordenadoria-gerencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelCoordenadoria' => $modelCoordenadoria,
        'modelGerencia' => $modelGerencia,
        'model' => $model,
    ]) ?>

</div>
