<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoFaixaEtaria */

$this->title = 'Create Termo Vigilancia Fiscalizacao Faixa Etaria';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Faixa Etarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-faixa-etaria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
