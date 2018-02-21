<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalEscritorio */

$this->params['breadcrumbs'][] = ['label' => 'Portal Escritorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-escritorio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
