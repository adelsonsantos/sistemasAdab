<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcao */

$this->params['breadcrumbs'][] = ['label' => 'Ação da Vigilancia e Fiscalizacao', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-acao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
