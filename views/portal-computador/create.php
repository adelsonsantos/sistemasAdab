<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalComputador */

$this->title = 'Create PortalContatoTipo Computador';
$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Computadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-computador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
