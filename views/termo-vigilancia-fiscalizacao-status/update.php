<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoStatus */


$this->params['breadcrumbs'][] = ['label' => 'Status do Vigilancia e Fiscalizacao', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
