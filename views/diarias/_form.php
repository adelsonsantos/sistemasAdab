<style>
    .font-topo {
        font-size: 20px;
        font-weight: bold;
    }

    .grid {
        margin-left: 209px;
    }

    #w0-filters {
        background-color: rgba(220, 222, 221, 0);
    }

    .table thead tr {
        background-color: #dcdedd;
    }

    .tambem {
        text-align: right;
    }

</style>
<?php
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaRoteiro;
use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelMotivo app\models\DiariaMotivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Solicitar Nova Diária</h1>
        <p class="font-topo" style="text-align: center">

        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong></strong></p>
    </div>
</div>
<div class="grid">
    <?php

    $form = ActiveForm::begin(['id' => 'dynamic-form']);

    $htmlDiaria = Yii::$app->controller->renderPartial('form-diaria',
        [
            'model' => $model,
            'modelsRoteiro' => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
            'modelsRoteiroMultiplo' => (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo,
            'form' => $form
        ]);

    $projeto = Yii::$app->controller->renderPartial('form-projeto', ['model' => $model, 'form' => $form, 'modelMotivo' => $modelMotivo]);

    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'options' => ['style' => 'background-color: #dcdedd;'],
        'items' => [
            [
                'label' => 'Diária',
                'content' => $htmlDiaria,
                'active' => true,
                'options' => ['id' => 'diaria'],
            ],
            [
                'label' => 'Projeto',
                'content' => $projeto,
                'options' => ['id' => 'projeto'],
            ],
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>


    <script type="application/javascript">
        /*function getLastElementRotaOrigem() {
         var i = 0;
         var arrayRotasOrigem = [];
         while (i < 7) {
         var origem = document.getElementById("diariaroteiro-0-" + i + "-roteiro_origem");

         if(i === 0){
         if (typeof(origem) !== 'undefined' && origem !== null) {
         arrayRotasOrigem.push(origem.value);
         i++;
         }
         }
         console.log(arrayRotasOrigem);
         if (typeof(origem) !== 'undefined' && origem !== null) {
         if (arrayRotasOrigem.indexOf(origem.value) > -1) {
         alert("Rota já existe!!!");
         } else {
         arrayRotasOrigem.push(origem.value);
         console.log(arrayRotasOrigem);// exists.
         }
         }
         i++;
         }
         }
         var arrayRotasDestino = [];
         function getLastRotaDestino() {
         var i = 0;
         while (i < 7) {
         var destino = document.getElementById("diariaroteiro-0-"+i+"-roteiro_destino");
         if (typeof(destino) !== 'undefined' && destino !== null) {
         if (arrayRotasDestino.indexOf(destino.value) > -1) {
         //  alert("Rota já existe!!!  "+destino.value);
         } else {
         arrayRotasDestino.push(destino.value);
         console.log(getDestino());
         }
         }
         i++;
         }
         }
         getDestino();
         function getDestino() {
         return arrayRotasDestino;
         }*/
    </script>


