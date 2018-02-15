<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */
/* @var $modelContato app\models\PortalContato */
/* @var $modelCoordenadoria app\models\DiariaCoordenadoria */

$this->title = 'Alterar Contato da Coordenadoria de: ' . $modelCoordenadoria->nome;
$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Contato Coordenadorias', 'url' => ['index']];
?>
<div class="portal-contato-coordenadoria-update">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_form', [
            'model' => $model,
            'modelContato' => $modelContato,
            'modelCoordenadoria' => $modelCoordenadoria,
        ]) ?>
</div>
