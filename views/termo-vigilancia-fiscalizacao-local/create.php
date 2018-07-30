<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoLocal */


$this->params['breadcrumbs'][] = ['label' => 'Local da Vigilância e Fiscalização', 'url' => ['index']];

?>
<div class="termo-vigilancia-fiscalizacao-local-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
