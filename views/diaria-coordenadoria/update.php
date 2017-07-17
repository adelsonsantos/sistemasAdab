<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiariaCoordenadoria */

$this->title = 'Alterar Coordenadoria de '.$model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Diaria Coordenadorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Alterar';
?>
<div class="diaria-coordenadoria-update">
    <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
</div>
