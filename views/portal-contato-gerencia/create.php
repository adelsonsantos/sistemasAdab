<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoGerencia */

$this->title = 'Create Portal Contato Gerencia';
$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-gerencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
