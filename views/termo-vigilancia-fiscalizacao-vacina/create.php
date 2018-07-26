<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoVacina */

$this->title = 'Create Termo Vigilancia Fiscalizacao Vacina';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Vacinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-vacina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
