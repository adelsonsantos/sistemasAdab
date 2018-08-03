<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProprietario */

$this->params['breadcrumbs'][] = ['label' => 'Proprietário da Vigilância e Fiscalizacao', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-proprietario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
