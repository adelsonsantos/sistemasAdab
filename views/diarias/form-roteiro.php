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
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-room',
    'deleteButton' => '.remove-room',
    'model' => $modelsRoteiro[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'roteiro_id'
    ],
]); ?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Rota</th>
        <th class="text-center">
            <button type="button" class="add-room btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span>
            </button>
        </th>
    </tr>
    </thead>
    <tbody class="container-rooms">

    <?php foreach ($modelsRoteiro as $indexRoteiro => $modelRoteiro): ?>
        <tr class="room-item">
            <td class="vcenter">
                <?php
                // necessary for update action.
                if (!$modelRoteiro->isNewRecord) {
                    echo Html::activeHiddenInput($modelRoteiro, "[{$indexRoteiro}]diaria_id");
                }
                ?>

                <div class="row">
                    <div class="col-sm-1">
                        <?= $form->field($modelRoteiro, "[[{$indexRoteiro}]diaria_id")->dropDownList(
                            ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('estado_uf')->all(), 'estado_uf', 'estado_uf'), ["disabled" => "disabled", 'onkeyup' => 'totales($(this))'])->label('De:'); ?>
                    </div>
                    <div class="col-sm-4" style="margin-top: 4px">
                        <?= $form->field($modelRoteiro, "[{$indexRoteiro}]roteiro_origem")->dropDownList(
                            ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'), ['options' => [$modelRoteiro['roteiro_origem'] => ['selected' => true]]]); ?>
                    </div>
                    <div class="col-sm-1" style="margin-left: 3%">
                    </div>

                    <div class="col-sm-1">
                        <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_id")->dropDownList(
                            ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('estado_uf')->all(), 'estado_uf', 'estado_uf'), ["disabled" => "disabled"])->label('Para:'); ?>
                    </div>
                    <div class="col-sm-4" style="margin-top: 4px">
                        <?= $form->field($modelRoteiro, "[{$indexRoteiro}]roteiro_destino")->dropDownList(
                            ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'), ['onChange' => "pegarResultado(this)", 'options' => [$modelRoteiro['roteiro_destino'] => ['selected' => true]]]); ?>
                    </div>
                </div><!-- .row -->
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" style=" margin-top: 50%" class="remove-room btn btn-danger btn-xs"><span
                            class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>

