<?php

/* @var $this yii\web\View */
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaRoteiro;

/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelMotivo app\models\DiariaMotivo */

?>
<div class="diarias-create">
    <?= $this->render('_form', [
        'model'                 => $model,
        'modelsRoteiro'         => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
        'modelsRoteiroMultiplo' => (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo,
        'modelMotivo'           => $modelMotivo
    ]) ?>
</div>
