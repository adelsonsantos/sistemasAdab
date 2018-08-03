<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacaoAtividade */

$this->params['breadcrumbs'][] = ['label' => 'Atividade da Vigilancia e Fiscalizacao', 'url' => ['index']];
?>
<div class="termo-vigilancia-fiscalizacao-atividade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
