<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diarias */

$this->title = 'Create Diarias';
$this->params['breadcrumbs'][] = ['label' => 'Diarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diarias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
