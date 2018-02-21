<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalGerencia */

$this->params['breadcrumbs'][] = ['label' => 'Portal Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-gerencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
