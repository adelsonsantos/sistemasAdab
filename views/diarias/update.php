<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelMotivo app\models\DiariaMotivo */
?>
<div class="diarias-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model'                 => $model,
        'modelsRoteiroMultiplo' => $modelsRoteiroMultiplo,
        'modelsRoteiro'         => $modelsRoteiro,
        'modelMotivo'           => $modelMotivo
    ]) ?>
</div>
