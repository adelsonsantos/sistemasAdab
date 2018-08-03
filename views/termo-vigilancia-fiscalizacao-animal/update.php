<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimal */

$this->params['breadcrumbs'][] = ['label' => 'Animal da Vigilancia e Fiscalizacao', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-animal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
