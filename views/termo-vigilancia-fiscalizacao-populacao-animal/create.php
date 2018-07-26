<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal */

$this->title = 'Create Termo Vigilancia Fiscalizacao Populacao Animal';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Populacao Animals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-populacao-animal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
