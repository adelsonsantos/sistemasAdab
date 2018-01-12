<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RedaFichaInscricao */

$this->title = 'Update Reda Ficha Inscricao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Reda Ficha Inscricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDE_FICHA_INSCRICAO, 'url' => ['view', 'id' => $model->IDE_FICHA_INSCRICAO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reda-ficha-inscricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
