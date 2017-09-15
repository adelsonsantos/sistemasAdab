<?php
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $form yii\widgets\ActiveForm */
use app\models\DadosUnicoMunicipio;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;





?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 7,
    'min' => 1,
    'insertButton' => '.add-rota',
    'deleteButton' => '.remove-rota',
    'model' => $modelsRoteiro[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'dados_roteiro_id',
        'roteiro_origem',
        'roteiro_destino',
        'controle_roteiro',
        'roteiro_id',
        'diaria_id'
    ],
]); ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Description</th>
            <th class="text-center">
                <button type="button" class="add-rota btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
        </thead>
        <tbody class="container-rooms">
        <?php foreach ($modelsRoteiro as $indexRota => $modelRota): ?>
            <tr class="room-item">
                <td class="vcenter">
                    <?php
                    if (! $modelRota->isNewRecord) {
                        echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-1" style="width: 60px; margin-top: 5px;"><strong>Origem:</strong></div>
                        <div class="col-lg-1" style="width: 100px">
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id")->label(false)->dropDownList([1 => 'BA'],['disabled' => true]); ?>
                        </div>
                        <div class="col-lg-4">

                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]roteiro_origem")->label(false)->dropDownList(
                                ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'), ['options' => [38490 => ['selected' => true]]]); ?>
                        </div>

                        <div class="col-lg-1" style="width: 60px; margin-top: 5px;"><strong>Destino:</strong></div>
                        <div class="col-lg-1" style="width: 100px" >
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id")->label(false)->dropDownList([1 => 'BA'],['disabled' => true]); ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]roteiro_destino")->label(false)->dropDownList(
                                ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'), ['options' => [$modelRoteiro['roteiro_origem'] => ['selected' => true]]]); ?>
                        </div>
                    </div>
                </td>
                <td class="text-center vcenter" style="width: 90px;">
                    <button type="button" class="remove-rota btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php DynamicFormWidget::end(); ?>