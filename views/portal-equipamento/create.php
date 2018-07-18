<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalEquipamento */
/* @var $modelEntrada app\models\PortalEntrada2 */

$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
?>
<div class="portal-equipamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelEntrada' => $modelEntrada
    ]) ?>

</div>
