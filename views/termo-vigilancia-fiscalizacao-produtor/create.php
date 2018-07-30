<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProdutor */

$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Produtors', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-produtor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
