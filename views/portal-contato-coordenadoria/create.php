<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */
/* @var $modelContato app\models\PortalContato */
/* @var $modelCoordenadoria app\models\DiariaCoordenadoria */

$this->title = 'Criar Contato da Coordenadoria';
$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Coordenadorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-coordenadoria-create">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_form', [
            'modelCoordenadoria' => $modelCoordenadoria,
            'modelContato' => $modelContato,
            'model' => $model,
        ]) ?>
</div>
