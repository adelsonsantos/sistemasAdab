<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProdutor */



$this->params['breadcrumbs'][] = ['label' => $model->vigilancia_fiscalizacao_produtor_id, 'url' => ['view', 'id' => $model->vigilancia_fiscalizacao_produtor_id]];
$this->params['breadcrumbs'][] = 'Alterar produtor';
?>
<div class="termo-vigilancia-fiscalizacao-produtor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
