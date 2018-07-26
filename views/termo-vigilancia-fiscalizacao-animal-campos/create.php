<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAnimalCampos */

$this->title = 'Create Termo Vigilancia Fiscalizacao Animal Campos';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Animal Campos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-animal-campos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
