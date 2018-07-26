<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAtividade */

$this->title = 'Update Termo Vigilancia Fiscalizacao Atividade: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vigilancia_fiscalizacao_atividade_id, 'url' => ['view', 'id' => $model->vigilancia_fiscalizacao_atividade_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="termo-vigilancia-fiscalizacao-atividade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
