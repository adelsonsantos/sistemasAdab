<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */

$this->title = 'Update Termo Vigilancia Fiscalizacao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vigilancia_fiscalizacao_id, 'url' => ['view', 'id' => $model->vigilancia_fiscalizacao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="termo-vigilancia-fiscalizacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
