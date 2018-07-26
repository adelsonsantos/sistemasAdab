<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoLocal */

$this->title = 'Create Termo Vigilancia Fiscalizacao Local';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-local-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
