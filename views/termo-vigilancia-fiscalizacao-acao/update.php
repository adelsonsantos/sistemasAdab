<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcao */

$this->title = 'Update Termo Vigilancia Fiscalizacao Acao: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Acaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vigilancia_fiscalizacao_acao_id, 'url' => ['view', 'id' => $model->vigilancia_fiscalizacao_acao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="termo-vigilancia-fiscalizacao-acao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
