<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalCoordenadoriaGerencia */
/* @var $contato app\models\PortalContato */

$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Coordenadoria Gerencias', 'url' => ['index']];

?>
<div class="portal-coordenadoria-gerencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'contato' => $contato
    ]) ?>

</div>
