<?php

use yii\bootstrap\Button;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */


$this->params['breadcrumbs'][] = ['label' => 'Diaria Coordenadorias', 'url' => ['index']];
?>
<div class="diaria-coordenadoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
