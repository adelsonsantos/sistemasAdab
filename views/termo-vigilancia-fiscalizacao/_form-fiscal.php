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
    'widgetContainer' => 'dynamicform_fiscal',
    'widgetBody' => '.container-fiscais',
    'widgetItem' => '.room-fiscal',
    'limit' => 3,
    'min' => 1,
    'insertButton' => '.add-fiscal',
    'deleteButton' => '.remove-fiscal',
    'model' => $modelsEquipe[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'pessoa_id'
    ],
]); ?>

<table class="table table-bordered">
    <thead style="background: #c3c3c3">
    <tr>
        <th>Fiscal</th>
        <th class="text-center">
            <button type="button" id="rota" class="add-fiscal btn btn-success btn-xs" <!--onclick="getThis(this);"--><span class="glyphicon glyphicon-plus"></span></button>
        </th>
    </tr>
    </thead >
    <tbody class="container-fiscais">
    <?php foreach ($modelsEquipe as $index => $modelEquipe): ?>
        <tr class="room-fiscal">
            <td class="vcenter">

                <?php
                if (! $modelEquipe->isNewRecord) {
                    //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                }
                ?>

                <div class="row">
                    <div class="col-lg-1" style="margin-bottom: -50px">
                        <span class="panel-title-fiscal" style="margin-top: 300px;">Fiscal: <?= ($index + 1) ?></span>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($modelEquipe, "[{$index}]pessoa_id")->dropDownList(
                            ArrayHelper::map(\app\models\DadosUnicoPessoa::find()->asArray()->where(['pessoa_st' => 0])->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'),[
                            'prompt' => 'Selecione o fiscal',
                        ])->label('')
                        ?>
                    </div>
                </div>

            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-fiscal btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>



