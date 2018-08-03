<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoFaixaEtaria */

$this->params['breadcrumbs'][] = ['label' => 'Faixa Etárias', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-faixa-etaria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
