<style>
    .font-topo{
        font-size: 20px;
        font-weight: bold;
    }

    .grid{
        margin-left: 209px;
    }

    #w0-filters{
        background-color: rgba(220, 222, 221, 0);
    }
    .table thead tr{
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
/* @var $form yii\widgets\ActiveForm */
?>

<div style="position: absolute">
   <?= Yii::$app->controller->renderPartial('menu');?>
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
$htmlDiaria = Yii::$app->controller->renderPartial('form-diaria',
    [
        'model' => $model,
        'modelsRoteiro' => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
        'modelsRoteiroMultiplo' => (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo,
    ]);

$projeto = "Projeto";

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
            'label' => $projeto,
            'content' => 'Projeto',
            'options' => ['id' => 'projeto'],
        ],
    ],
]);
?>
