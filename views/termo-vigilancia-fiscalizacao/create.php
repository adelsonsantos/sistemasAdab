<?php

use yii\helpers\Html;
use app\models\TermoVigilanciaFiscalizacaoVeiculo;
use app\models\TermoVigilanciaFiscalizacaoAtividade;
use app\models\TermoVigilanciaFiscalizacaoAcao;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */
/* @var $modelsVeiculo app\models\TermoVigilanciaFiscalizacaoVeiculo */
/* @var $modelsEquipe app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */
/* @var $modelsAtividade app\models\TermoVigilanciaFiscalizacaoAtividade */
/* @var $modelsAcao app\models\TermoVigilanciaFiscalizacaoAcao */

$this->params['breadcrumbs'][] = ['label' => 'Fiscalização', 'url' => ['index']];

?>
<div class="termo-vigilancia-fiscalizacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsVeiculo' => (empty($modelsVeiculo)) ? [new TermoVigilanciaFiscalizacaoVeiculo] : $modelsVeiculo,
        'modelsEquipe' => (empty($modelsEquipe)) ? [new app\models\TermoVigilanciaFiscalizacaoEquipeFiscal] : $modelsEquipe,
        'modelsAtividade' => (empty($modelsAtividade)) ? [new TermoVigilanciaFiscalizacaoAtividade] : $modelsAtividade,
        'modelsAcao' => (empty($modelsAcao)) ? [new TermoVigilanciaFiscalizacaoAcao] : $modelsAcao
    ]) ?>

</div>
