<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */

$this->title = 'Create PortalContatoTipo Contato Coordenadoria';
$this->params['breadcrumbs'][] = ['label' => 'PortalContatoTipo Contato Coordenadorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-coordenadoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
