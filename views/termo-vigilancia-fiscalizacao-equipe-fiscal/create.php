<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */

$this->title = 'Create Termo Vigilancia Fiscalizacao Equipe Fiscal';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Equipe Fiscals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-equipe-fiscal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
