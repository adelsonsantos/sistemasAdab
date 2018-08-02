<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalCampos */

$this->params['breadcrumbs'][] = ['label' => 'Campos do Animal no Termo de Vigilancia e Fiscalização', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-animal-campos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
