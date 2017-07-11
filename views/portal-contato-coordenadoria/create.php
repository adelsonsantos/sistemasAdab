<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortalContatoCoordenadoria */

$this->title = 'Create Portal Contato Coordenadoria';
$this->params['breadcrumbs'][] = ['label' => 'Portal Contato Coordenadorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-contato-coordenadoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
