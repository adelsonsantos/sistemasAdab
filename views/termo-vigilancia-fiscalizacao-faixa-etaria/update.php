<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoFaixaEtaria */

$this->title = 'Update Termo Vigilancia Fiscalizacao Faixa Etaria: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Faixa Etarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vigilancia_fiscalizacao_faixa_etaria_id, 'url' => ['view', 'id' => $model->vigilancia_fiscalizacao_faixa_etaria_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="termo-vigilancia-fiscalizacao-faixa-etaria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
