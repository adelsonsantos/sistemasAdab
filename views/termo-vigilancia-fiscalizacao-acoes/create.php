<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcoes */

$this->title = 'Create Termo Vigilancia Fiscalizacao Acoes';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Acoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-acoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
