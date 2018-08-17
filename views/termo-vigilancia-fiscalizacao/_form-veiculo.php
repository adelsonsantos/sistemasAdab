<?php
$js = '
jQuery(".dynamicform_fiscal").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_fiscal .panel-title-fiscal").each(function(index) {
        jQuery(this).html("Fiscal: " + (index + 1))
    });
});

jQuery(".dynamicform_fiscal").on("afterDelete", function(e) {
    jQuery(".dynamicform_fiscal .panel-title-fiscal").each(function(index) {
        jQuery(this).html("Fiscal: " + (index + 1))
    });
});
';
$this->registerJs($js);

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsEquipe app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $form yii\widgets\ActiveForm */
use app\models\DadosUnicoEstado;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_veiculo',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 3,
    'min' => 1,
    'insertButton' => '.add-veiculo',
    'deleteButton' => '.remove-fiscal',
    'model' => $modelsVeiculo[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'vigilancia_fiscalizacao_veiculo_placa',
        'vigilancia_fiscalizacao_veiculo_km_inicial',
        'vigilancia_fiscalizacao_veiculo_km_final',
        'vigilancia_fiscalizacao_veiculo_data_create',
    ],
]); ?>

<table class="table table-bordered">
    <thead style="background: #c3c3c3">
    <tr>
        <th>Veiculo</th>

    </tr>
    </thead >
    <tbody class="container-rooms">
    <?php foreach ($modelsVeiculo as $index => $modelVeiculo): ?>
        <tr class="room-item">
            <td class="vcenter">
                <?php
                if (! $modelVeiculo->isNewRecord) {
                    //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                }
                ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <?= $form->field($modelVeiculo, "[{$index}]vigilancia_fiscalizacao_veiculo_placa")->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($modelVeiculo, "[{$index}]vigilancia_fiscalizacao_veiculo_km_incial")->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-3">
                            <?= $form->field($modelVeiculo, "[{$index}]vigilancia_fiscalizacao_veiculo_km_final")->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($modelVeiculo, "[{$index}]vigilancia_fiscalizacao_veiculo_data_create")->textInput(['maxlength' => true]) ?>
                        </div>
                    </div><!-- .row -->
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>




