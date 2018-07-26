<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimal */

$this->title = 'Create Termo Vigilancia Fiscalizacao Animal';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Animals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-animal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
