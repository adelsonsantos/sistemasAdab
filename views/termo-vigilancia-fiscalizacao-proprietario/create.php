<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoProprietario */

$this->title = 'Create Termo Vigilancia Fiscalizacao Proprietario';
$this->params['breadcrumbs'][] = ['label' => 'Termo Vigilancia Fiscalizacao Proprietarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="termo-vigilancia-fiscalizacao-proprietario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
