<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAcao */

$this->title = 'Create Termo Vigilancia Fiscalizacao Acao';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Acaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-acao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
