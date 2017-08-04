<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */

$this->title = 'Create Portal Coordenadoria Gerencia';
$this->params['breadcrumbs'][] = ['label' => 'Portal Coordenadoria Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-coordenadoria-gerencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
