<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalSaida */

$this->title = 'Create Portal Saida';
$this->params['breadcrumbs'][] = ['label' => 'Portal Saidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-saida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
