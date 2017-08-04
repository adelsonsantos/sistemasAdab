<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalContato */

$this->title = 'Create Portal Contato';
$this->params['breadcrumbs'][] = ['label' => 'Portal Contatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
