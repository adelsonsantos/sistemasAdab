<?php

use yii\helpers\Html;
use app\models\TermoVigilanciaFiscalizacaoVeiculo;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */

$this->params['breadcrumbs'][] = ['label' => 'Fiscalização', 'url' => ['index']];

?>
<div class="termo-vigilancia-fiscalizacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsVeiculo' => (empty($modelsVeiculo)) ? [new TermoVigilanciaFiscalizacaoVeiculo] : $modelsVeiculo,
        'modelsEquipe' => (empty($modelsEquipe)) ? [new app\models\TermoVigilanciaFiscalizacaoEquipeFiscal] : $modelsEquipe
    ]) ?>

</div>
