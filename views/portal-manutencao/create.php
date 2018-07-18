<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalManutencao */

$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
?>
<div class="portal-manutencao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
