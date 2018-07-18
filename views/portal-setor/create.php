<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalSetor */

$this->title = 'Create Portal Setor';
$this->params['breadcrumbs'][] = ['label' => 'Portal Setors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-setor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
