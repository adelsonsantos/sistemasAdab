<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */

$this->title = 'Update Termo Vigilancia Fiscalizacao Equipe Fiscal: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Equipe Fiscals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vigilancia_fiscalizacao_equipe_fiscal_id, 'url' => ['view', 'id' => $model->vigilancia_fiscalizacao_equipe_fiscal_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="termo-vigilancia-fiscalizacao-equipe-fiscal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
