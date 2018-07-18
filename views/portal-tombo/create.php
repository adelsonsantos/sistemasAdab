<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalTombo */

$this->title = 'Create Portal Tombo';
$this->params['breadcrumbs'][] = ['label' => 'Portal Tombos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-tombo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
